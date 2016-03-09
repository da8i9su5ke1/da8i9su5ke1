<html>
    
<title>php基礎課題</title>

<h1>課題1</h1>

<h3>
<?php
print"Hello world.";

echo"<br/><br/><br/><br/>";

?>
</h3>

<hr>

<h1>課題2</h1>
   
<h3>
<?php

echo "groove"."-"."gear";


echo"<br><br><br>";
?>
<hr>
</h3>

<h1>課題3<h1>

        <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<h1>自己紹介<h1/>
<p style="font-weight: normal; font-size: 20px;">

<?php

echo '名前：　鈴木　大介';
echo '<br/>';
echo '血液型：O型';
echo '<br/>';
echo '身長：171㎝';
echo '<br/>';
echo '出身地：東京都';
echo '<br/><br/>';
echo '趣味：お酒が好きです。';
?>
</p>
<hr>
        
<h1>課題4</h1>

<h3>
<?php
echo"変数：";

$vari=5;
echo$vari;
echo"<br/><br/>";

echo"定数：";
const cons=31;
echo cons;
echo"<br><br>";
echo"基礎課題5で表示します。";

$add=$vari+cons;

$sub=$vari-cons;

$mul=$vari*cons;

$div=$vari/cons;

$sur=$vari%cons;

?>
<hr>    
</h3>

<h1>課題5</h1>
<h3>
    

<?php

echo '足し算：';

echo$add;
echo"<br><br>";
echo"引き算：";
echo$sub;
echo"<br><br>";

echo"掛け算：";

echo$mul;

echo"<br><br>";

echo"割り算：";

echo$div;

echo"<br><br>";

echo"剰余";
echo$sur;

?>
</h3>
<hr>
<h1>課題6</h1>
<h3>
<?php
$exe="1";

if($exe==1){
echo"1です！";
}elseif($exe==2){
 echo"プログラミングキャンプ！";
}elseif($exe=="a"){
 echo"文字です！";
}else{
 echo"その他です！";
}



?>
    </h3>
</html>
