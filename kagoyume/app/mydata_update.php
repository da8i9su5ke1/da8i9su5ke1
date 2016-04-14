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
        <title>変更入力画面</title>
    </head>
    <body>
        <h1>データ更新画面</h1>
        <form action="<?php echo MYDATE_UPDATE_RESULT ?>" method="POST">
            <?php
            $mode = isset($_POST['mode'])?$_POST['mode']:null;
            if (!$mode == "UPDATE") {
                echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
            } else {
                
            $name = $_SESSION['name'];
            $password = $_SESSION['password'];
            $mail = $_SESSION['mail'];
            $address = $_SESSION['address'];
            
                
                ?>
             <table bodder="5">
                <tr>
                    <td>ユーザー名:</td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"><br></td></tr>
                <tr> 
                    <td>パスワード:<font size="1"color="red">※</font></td>
                    <td><input type="text" name="password" value="<?php echo $password; ?>"><br></td></tr>           
                <tr> 
                    <td>メールアドレス:</td>
                    <td><input type="text" name="mail" value="<?php echo $mail; ?>"><br></td></tr>  
                <tr> 
                    <td>住所:</td>
                    <td><input type="text" name="address" value="<?php echo $address; ?>"><br></td></tr>
               
            </table>
                <font size="1"color="red">※ パスワードは4～10文字の半角英数字で入力して下さい。<br><br></font>

                <input type="hidden" name="mode"  value="RESULT">
                <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </form>
            <form action="<?php echo MYDATE ?>" method="POST">
                <input type="hidden" name="mode" value='RESULT_UPDATE' >
                <input type="submit" name="no" value="詳細画面に戻る">
            </form>
<?php } ?>    
<?php echo return_top(); ?>  
    </body>

</html>
