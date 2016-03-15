<h1>PHP組み込み関数　基礎課題</h1>
<p><br></p>
<h3>基礎課題1
    <p><br></p>
<?php
$stamp=mktime(0,0,0,1,1,2015);
echo $stamp;
?>
    <hr></h3>
<h3>基礎課題2
    <p><br></p>
<?php
echo "現在時刻； ";

$stamp=mktime();
$genzai=date('Y年m月d日G時i分s秒');
echo $genzai;
?>
</h3><hr>

<h3>基礎課題3<br>
<?php
$stamp2=mktime(10,0,0,4,11,2016);

$time=date("Y年m月d日G時i分s秒",$stamp2);
echo $time;
?></h3><hr>

<h3>基礎課題4<br>
    <p><br></p>
<?php
echo "総秒；";
$a=mktime(23,59,59,31,12,2015);
$b=mktime(0,0,0,1,1,2015);
$c=$a-$b;
echo $c;
?></h3><hr>

    <h3>基礎課題5<br>
        <p><br></p>
<?php

$x = strlen("鈴木大介");
$y = mb_strlen("鈴木大介");
echo "名前；鈴木大介<br>",
        "バイト数；$x<br>".
        "文字数；$y<br>";
?></h3><hr>

<h3>基礎課題6
    <p><br></p>
<?php
$ado="da8i9su5ke1@gmail.com"."<br>";
//echo "アドレス；$ado";
$valu=strstr($ado,"@");
echo "@以降の文字列； ";
echo $valu;
        ?></h3><hr>
        <h3>基礎課題7
            <p><br></p>
<?php
$moji="きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます";
$d=  str_replace("U", "う", $moji);
$n=  str_replace("I", "い", $d);
echo $n;
?>
</h3><hr>
<h3>基礎課題8
    <p><br></p>
    <?php
echo "sample.txtに自己紹介を上書き保存いたしました。";    
$fp = fopen('sample.txt', 'w');
fwrite($fp, '私の名前は鈴木大介です。よろしくお願いします。');
fclose($fp);
    ?>
</h3><hr>
<h3>基礎課題9
    <p><br></p>
<?php
$fp=fopen('sample.txt','r');
$fp2=  fgets($fp);
echo $fp2;
?></h3>

        
    