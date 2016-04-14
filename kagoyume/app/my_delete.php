<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

//検索画面に戻る際にsessionに値があった場合、初期値として返す処理。
session_start();
?>

<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>削除確認画面</title>
    </head>
    <body>
        <?php
        
        $mode = isset($_POST['mode'])?$_POST['mode']:null;
        $name = $_SESSION['name'];
        $mail = $_SESSION['mail'];
        $address = $_SESSION['address'];
        $total = isset($_SESSION["total"])?$_SESSION["total"]:0;
        if (!$mode == "DELETE") {
            echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
        } else {
           
            if (empty($result)) {
                ?>
                <h1>削除確認</h1>
                <h3>このユーザーをマジで削除しますか？</h3>
                ユーザー名：<?php echo $name ; ?><br>
                Eメール：<?php echo $mail; ?><br>
                住所：<?php echo $address; ?><br>
                購入金額合計：<?php echo $total; ?>円<br>

                <br>
                <form action="<?php echo MY_DELET_RESULT ?>" method="POST">
                    <input type="submit" name="YES" value="はい"style="width:100px">
                    <input type="hidden" name="mode" value="RESULT_DELETE">
                </form>
                <form action="<?php echo TOP_URI; ?>" method="POST">
                    <input type="submit" name="NO" value="いいえ"style="width:100px">
                </form><br>    
              
                <?php
            } else {
                echo 'データの取得に失敗しました。次記のエラーにより処理を中断します：';
                //back_error()はユーザーがブラウザのbackボタンを押し再び削除の動作をした際、
                //存在しないデータのエラーが発生しないための関数。
                echo back_error($id);
            }
        }
        echo return_top();
        ?>
    </body>
</html>


