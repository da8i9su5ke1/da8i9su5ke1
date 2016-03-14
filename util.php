<?php

function profile($x=false){
$a= "氏名：鈴木　大介"."<br>";
$b="生年月日；1989年5月1日"."<br>";
$c="自己紹介；趣味はお酒と旅行です。"."<br>"."<br>";
if($x===true){
    echo "この処理は正しく実行できました。"."<br>";
}else {echo "正しく実行できませんでした。"."<br>";}
echo $a.$b.$c;

}

function atai($a){
$arr=array("奇数","偶数");  

if($a%2==0){
echo $a."は".$arr[1]."です。";
}
else{
echo $a."は".$arr[0]."です。";


}}

?>