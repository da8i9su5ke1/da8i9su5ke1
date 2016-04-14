<?php require_once("../util/defineUtil.php"); ?>
<?php require_once("../util/scriptUtil.php"); ?>
<?php require_once("../util/dbaccessUtil.php"); ?>

<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
    <body>
    <?php
    //post getの中身が空であるエラー文を回避するための関数。
    $mode = isset($_POST['mode'])?$_POST['mode']:null;
    
    if(!$mode=="RESULT"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
        
    }else{
        
        session_start();
        $name = $_SESSION['name'];
        $password = $_SESSION['password'];
        $mail = $_SESSION['mail'];
        $address = $_SESSION['address'];

    //データのDB挿入処理。エラーの場合のみエラー文がセットされる。成功すればnull
        $result = insert_profiles($name, $password, $mail, $address);
        
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>登録結果画面</h1><br>
        ユーザー名:<?php echo $name;?><br>
        パスワード:<?php echo $password;?><br>
        Eメール:<?php echo $mail;?><br>
        住所:<?php echo $address;?><br><br>
        以上の内容で登録しました。<br><br>
        
        
        <?php
        }else{
            echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
        }
    }
    echo return_top(); 
    ?>
    </body>
</html>
