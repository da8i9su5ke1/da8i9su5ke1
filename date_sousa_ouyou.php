<html>
    <title>データ操作応用課題
    </title>
    <body>
<h3>　　　応用課題7     <br><br>  
<?php
$name = isset($_POST["name"])?$_POST["name"]:null;
$seibetu = isset($_POST["seibetu"])?$_POST["seibetu"]:null; 
$syumi = isset($_POST["syumi"])?$_POST["syumi"]:null; 

    session_start();
    if (empty($_POST["name"])) {
        echo "氏名が未入力です。<br>";
    }else{
        $_SESSION["name"] = $_POST["name"];
        $name = $_SESSION["name"];
        
     }
     if (empty($_POST["seibetu"])) {
        echo "性別が未入力です。<br>";
    }else{
         $_SESSION["seibetu"] = $_POST["seibetu"];
        $seibetu = $_SESSION["seibetu"];
     }
     if (empty($_POST["syumi"])) {
        echo "趣味が未入力です。<br>";
    }else{
         $_SESSION["syumi"] = $_POST["syumi"];
        $syumi = $_SESSION["syumi"];
     }


?>
        <form action="date_sousa_ouyou.php"method="post">
<table border="1">
    <div align=left>
    <tr>
        <td align="left"><b>氏名：</b></td>
        <td><input  type="text"name="name"value="
        <?php if(isset($name)){ echo $name;}?>"></td>
    </tr>
    <tr>
        <td align="right"><b>性別：</b></td>
        <td>
        <input type="radio"name="seibetu"value="男"
        <?php if (isset($seibetu) && $seibetu=="男"){echo "checked";} ?>>男<br>
        <input type="radio"name="seibetu"value="女" 
        <?php if (isset($seibetu) && $seibetu=="女"){echo "checked";} ?>>女<br>
        </td>
    </tr>
        <td align="left"><b>趣味：</b></td>
        <td><textarea  type="multext"name="syumi"rows="5"cols="22">
        <?=@$syumi ?></textarea></td>
    </tr>
    <td></td>
    <td><input type="submit"name="sousin"value="送信">
        <input type="reset" value="リセット">
    </td>
    </div>       
</table>
</h3><hr>

<h3>　応用課題8　　<br><br>
<form action="date_sousa_ouyou.php"method="post">
<table border="0">
    
<div align=center>テキストを中央寄せ [align=center]</div>  
<!--metaタグ、カウント１０でページをリロードするためのタグ-->    
<meta http-equiv="refresh" content="10">
<!--<a>タグ内で、href="指定のURL"を指定し、<a>ブラウザ表示語を入力</a>
することで、よくあるブルーの文字を押すと指定にURLにリンクする。タグ-->
<a href="指定のURLを入れる">新規登録</a><br>
    
<!--ボーダーを入れるタグ-->
<hr width=80% size=10 align=left noshade>
    

<isindex prompt="検索キーワード" action="kensaku.cgi">
</h3>

 
         
