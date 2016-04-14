<?php
require_once '../util/defineUtil.php';

/**
 * 使用した場所にトップページへのリンクを挿入する
 * @return トップページへのリンクのaタグ
 */
//修正箇所：TOP_URIの内容のURLが違ってので修正、また、ROOT_URLでなくTOP_URIへ修正
function return_top() {
    return "<a href='" . TOP_URL . "'>検索ページへ戻る</a>";
}
//ログイン、ログアウトの状況別ボタン表示。
function login() {
    if (!isset($_SESSION['id'])) {
        ?>
        <form action="<?php echo LOGIN ?>" method="POST">
            <div align="right">
                <input type="hidden" name="login" value="LOGIN" >ようこそゲストさん！<br>
                <input type="submit" name="no" value="ログイン">
            </div>
        </form>           
    <?php } else {
        echo my_data();
        ?>
        <form action="<?php echo LOGIN ?>" method="POST">
            <div align="right">
                <input type="hidden" name="logout" value="LOGOUT" >ようこそ<?php echo $_SESSION['name']; ?>さん！<br>
                <input type="submit" name="no" value="ログアウト">
            </div>
        </form>    
    <?php } ?>
    <!--//    return "<a href='" . LOGIN . "'>ログインページ</a>";-->

<?php
}



function my_data() {
    return "<a href='" . MYDATE . "'>myページ</a>";
}

/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
//GETの値もPOSTの値も両方、受け取れるように、$_REQUESTに変更。
//関数の使用可能範囲を拡大しました。
function form_value($name) {
    if (isset($_POST['mode']) && $_POST['mode'] == 'REGISTRATION') {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */
function bind_p2s($name) {

    if (!empty($_POST[$name])) {
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    } else {

        return null;
    }
}

//直リンクしたとき、$_POSTまたは$_GETが空であるというエラー文を回避するための関数。
//値が入っていいればその値を返し、無ければNULLを返す。
function error($name) {
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

//ユーザーが削除処理を実行したのちブラウザのbackボタンで戻り、処理を再度実行しようとした際、
//すでにIDが存在しない旨を伝え、トップからやり直す処理を表示する関数。
function back_error($name) {
    if (!empty($name)) {
        return $name;
    } else {
        return 'このIDは存在いたしません。<br>';
    }
}

function pass_check() {
    if (!empty($_SESSION['password']) && !preg_match("/^[a-zA-Z0-9]{4,10}+$/", $_SESSION['password'])) {
        return "＊パスワードが正しい形式ではありません。";
    }
}

//前画面に戻る際、前画面の情報をsessionで記憶し、戻った際にしっかりと初期値を与える関数。
function return_value($name) {

    if (!empty($_REQUEST[$name])) {
        $_SESSION[$name] = $_REQUEST[$name];
        return $_SESSION[$name];
    } else {

        return $_SESSION[$name];
    }
}

//取得したアプリケーションIDを設定
$appid = "dj0zaiZpPTIxaGFOcjlrajBBbyZzPWNvbnN1bWVyc2VjcmV0Jng9OGQ-";

/**
 * @brief カテゴリーID一覧
 *
 * 商品カテゴリの一覧です。
 * キーにカテゴリID、値にカテゴリ名が入っています。
 * @var array
 */
$categories = array(
    "1" => "すべてのカテゴリから",
    "13457" => "ファッション",
    "2498" => "食品",
    "2500" => "ダイエット、健康",
    "2501" => "コスメ、香水",
    "2502" => "パソコン、周辺機器",
    "2504" => "AV機器、カメラ",
    "2505" => "家電",
    "2506" => "家具、インテリア",
    "2507" => "花、ガーデニング",
    "2508" => "キッチン、生活雑貨、日用品",
    "2503" => "DIY、工具、文具",
    "2509" => "ペット用品、生き物",
    "2510" => "楽器、趣味、学習",
    "2511" => "ゲーム、おもちゃ",
    "2497" => "ベビー、キッズ、マタニティ",
    "2512" => "スポーツ",
    "2513" => "レジャー、アウトドア",
    "2514" => "自転車、車、バイク用品",
    "2516" => "CD、音楽ソフト",
    "2517" => "DVD、映像ソフト",
    "10002" => "本、雑誌、コミック"
);
/**
 * @brief ソート方法一覧
 *
 * 検索結果のソート方法の一覧です。
 * キーに検索用パラメータ、値にソート方法が入っています。
 * @access private
 * @var array
 * 
 */
$sortOrder = array(
    "-score" => "おすすめ順",
    "+price" => "商品価格が安い順",
    "-price" => "商品価格が高い順",
    "+name" => "ストア名昇順",
    "-name" => "ストア名降順",
    "-sold" => "売れ筋順"
);

/**
 * @brief 特殊文字を HTML エンティティに変換する
 *
 * @param string $str 変換したい文字列
 * 
 * @return string html用に変換した文字列
 * 
 */
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

//直リンクした場合に不正アクセスの旨を伝え、検索ページからやり直しさせる関数。
function illegal_access($value, $name) {
    $mode = !empty($_POST[$value]) ? $_POST[$value] : "";
    if (!isset($mode) && $mode !== $name) {
        return '不正アクセスです。検索ページへ戻り、お買い物をお楽しみください。<br>'
                . die(return_top());
    }
}

function cart(){
    if(isset($_SESSION['id'])){
        echo  "<a href='" . CART . "'>カート</a>";
    }
}