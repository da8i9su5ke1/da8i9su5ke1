<html>
    <head>
        <title>データ操作</title>
    </head>    
    <h3>データ操作<br><br>基礎課題1</h3>
    <body>
        <form action="date_sousa_kiso.php"method="post">
            名前：<input type="text"name="name"><br><br>
            性別：男→<input type="radio"name="seibetu_otoko"> 女→<input type="radio" name="seibetu_onnna"><br><br>
            趣味：<textarea type="mulText"name="syumi"></textarea><br><br>
            <input type="submit"name="sousinn">
        </form>
        <form action="date_sousa_kiso.php"methodo="post">
            <input type="submit"name="kuria"value="クリア">
        </form>

</html>
<hr>
<h3>基礎課題2<br><br>
    <?php
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $seibetu = isset($_POST["seibetu_otoko"]) ? $_POST["seibetu_otoko"] : "";
    $seibetu2 = isset($_POST["seibetu_onnna"]) ? $_POST["seibetu_onnna"] : "";
    $syumi = isset($_POST["syumi"]) ? $_POST["syumi"] : "";

if (empty($name)){
    echo "";
}
    else{
        echo "名前：" . "$name" . "<br>";
    }
    
if (empty($seibetu)) {
    $seibetu = "";
}
    else {
        echo "性別；" . '男' . "<br>";
    }
if (empty($seibetu2)) {
    $seibetu2 = "";
}
    else {
        echo "性別；" . "女" . "<br>";
    }
if(empty($syumi)){
    echo "";
}
    else{
        echo "趣味；" . "$syumi" . "<br>";
    }
    
    ?>
</h3><hr>

<h3>基礎課題3<br><br>
    
    <form action="date_sousa_kiso.php"method="post">
        <input type="submit"name="sousinn"value="再ログイン">
    </form>
    
<?php
$access_time = date('Y年m月d日G時i分s秒');
    setcookie('LastLoginDate', $access_time);
    
//$lastDate = $_COOKIE['LastLoginDate'];//setcookieで格納され、条件分岐する前にここで変数に格納してもこの時点では
    //　　　　　　　　　　　　　　　　　　　　何もないので格納できないからダメ。

    if(!empty($_COOKIE['LastLoginDate'])){
        $lastDate = $_COOKIE['LastLoginDate'];
        echo "前回ログイン日時； ". $lastDate;
    }
    
?> </h3><br><hr>   
<h3>基礎課題4<br><br>
    
    <form action="date_sousa_kiso.php"method="post">
        <input type="submit"name="sousinn"value="再ログイン">
    </form>

<?php

$access_time2 = date('Y年m月d日G時i分s秒');
session_start();
if(empty($_SESSION['time'])){
    $_SESSION['time']=$access_time2;
}else{
    echo "前回ログイン日時；".$_SESSION['time'];
     $_SESSION['time']=$access_time2;
}
?></h3><br><hr>
    <h3>基礎課題5<br><br>
    
    <HTML>
    <head>
    </head>
    <body>
        <form enctype="multipart/form-data" action="date_sousa_kiso.php" method="post">
            ファイル選択：<input name="userfile" type="file" />
            <input type="submit"name="userfile"value="アップロード">
        </form>
    </body>
</HTML>

<h3><hr>基礎課題6<br>
<?php
    // サーバー側に保存する名前
    $file_name = 'upload.txt';
    // アップロードされたファイルを移動する
     if(!empty($_FILES['userfile'])){//エラーが出た個所userfile
     move_uploaded_file($_FILES['userfile']['tmp_name'], $file_name);
     
     }
     
   $fp = fopen($file_name, 'r');
    // 読み取り操作 - １行読み取り
   $file_txt = fgets($fp);
   // ファイルを閉じる
    fclose($fp);

    echo "<br>".$file_txt."<br>";
 
 
?>
    </h3>