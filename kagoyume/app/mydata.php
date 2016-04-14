<?php 
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

//検索画面に戻る際にsessionに値があった場合、初期値として返す処理。
session_start();

$id = isset($_SESSION["id"])?$_SESSION["id"]:null;

if(!isset($id)&&$_SESSION['login']=='LOGIN'){
    echo 'ログインされていません。<br>';
    echo login();
}else{
            $name = $_SESSION['name'];
            $password = $_SESSION['password'];
            $mail = $_SESSION['mail'];
            $address = $_SESSION['address'];
            $total = isset($_SESSION['total'])?$_SESSION['total']:0;
            $new_date =  $_SESSION['newdate'];
                   
    
        
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録データ画面</title>
</head>
    <body>
        <h1>登録データ詳細</h1>
        <table border=1>
        
            <tr> 
                <p><th>名前：<?php echo $name; ?></th></p>
                <th>Eメール：<?php echo $mail; ?></th>
                <th>住所：<?php echo $address; ?></th>
                <th>購入金額合計：<?php echo $total; ?>円</th>
                <th>登録日時：<?php echo $new_date; ?></th>
            </tr>
        <form action="<?php echo MYDATE_UPDATE ?>" method="POST">
            <input type="hidden" name="mode" value="UPDATE" >
            <input type="submit" name="yes" value="登録情報を更新する">
        </form> 
        <form action="<?php echo MY_DELET ?>" method="POST">
            <input type="hidden" name="mode" value="DELETE" >
            <input type="submit" name="no" value="登録情報を削除する">
        </form>           
<?php }  ?>

