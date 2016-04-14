<?php require_once("../util/defineUtil.php"); ?>
<?php require_once("../util/scriptUtil.php"); ?>
<?php 
session_start();

login(); 


?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規会員登録</title>
    </head>
    <body>
        <h1>新規会員登録画面</h1><br>
        <?php session_start(); //再入力時用 ?>
        <form action="<?php echo REGISTRATION_COMFIRM; ?>" method="POST">
            <table bodder="5">
                <tr>
                    <td>ユーザー名:</td>
                    <td><input type="text" name="name" value="<?php echo form_value('name'); ?>"><br></td></tr>
                <tr> 
                    <td>パスワード:<font size="1"color="red">※</font></td>
                    <td><input type="text" name="password" value="<?php echo form_value('password'); ?>"><br></td></tr>           
                <tr> 
                    <td>メールアドレス:</td>
                    <td><input type="text" name="mail" value="<?php echo form_value('mail'); ?>"><br></td></tr>  
                <tr> 
                    <td>住所:</td>
                    <td><input type="text" name="address" value="<?php echo form_value('address'); ?>"><br></td></tr>
               
            </table>
             <font size="1"color="red">※ パスワードは4～10文字の半角英数字で入力して下さい。<br><br></font>
            <input type="hidden" name="mode"  value="CONFIRM">
            <input type="submit" name="btnSubmit" value="確認画面へ">

        </form>

        <?php echo return_top(); ?>
    </body>
</html>


