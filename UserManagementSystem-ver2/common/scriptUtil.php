<?php

require_once '../common/defineUtil.php';

/**
 * 使用した場所にトップページへのリンクを挿入する
 * @return トップページへのリンクのaタグ
 */
//修正箇所：TOP_URIの内容のURLが違ってので修正、また、ROOT_URLでなくTOP_URIへ修正
function return_top() {
    return "<a href='" . TOP_URI . "'>トップへ戻る</a>";
}

/**
 * 種別番号から実際の種別名を返却する
 * @param type $type 種別と対応した数字
 * @return string 種別名
 */
function ex_typenum($type) {
    switch ($type) {
        case 1;
            return "エンジニア";
        case 2;
            return "営業";
        case 3;
            return "その他";
    }
}

/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
//GETの値もPOSTの値も両方、受け取れるように、$_REQUESTに変更。
//関数の使用可能範囲を拡大しました。
function form_value($name) {
    if (isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'REINPUT') {
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

    if (!empty($_REQUEST[$name])) {
        $_SESSION[$name] = $_REQUEST[$name];
        return $_REQUEST[$name];
    } else {
        $_SESSION[$name] = null;
        return null;
    }
}

//直リンクしたとき、$_POSTまたは$_GETが空であるというエラー文を回避するための関数。
//値が入っていいればその値を返し、無ければNULLを返す。
function error($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
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


//前画面に戻る際、前画面の情報をsessionで記憶し、戻った際にしっかりと初期値を与える関数。
function return_value($name) {

    if (!empty($_REQUEST[$name])) {
        $_SESSION[$name] = $_REQUEST[$name];
        return $_SESSION[$name];
    } else {

        return $_SESSION[$name];
    }
}

function date_value($year,$month,$day){
   return !$update_values[$month]==null&&!$update_values[$day]==null&&$update_values[$year]==null;
}