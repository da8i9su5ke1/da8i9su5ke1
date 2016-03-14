<html>
    <h1>PHP基礎3　課題1～7</h1>
    <p><br></p>
</html>

<h3>課題3-1
 
   <p><br></p>
         
<?php

function profile($x=false){
$a= "氏名：鈴木　大介"."<br>";
$b="生年月日；1989年5月1日"."<br>";
$c="自己紹介；趣味はお酒と旅行です。"."<br>"."<br>";
if($x===true){
    echo "この処理は正しく実行できました。"."<br>";
}else {echo "正しく実行できませんでした。"."<br>";}
echo $a.$b.$c;


//if ($x==="ture"){
//    $f="この処理は正しく実行できました。";
//echo $f;}
//else {$g="正しく実行できませんでした。";
}


for ($i=0;$i<10;$i++){
profile();}
?>
    
    
</h3><hr>
<h3>課題3-2
<p><br></p>
<?php

function atai($a){
$arr=array("奇数","偶数");  

if($a%2==0){
echo $a."は".$arr[1]."です。";
}
else{
echo $a."は".$arr[0]."です。";


}}
atai(33);
?></h3><p><br></p><hr>

<h3>課題3-3
    <p><br></p>
<?php

function mult ($a,$b=5,$type=false){
if($type==="ture")  {
$x=$a*$b ;
echo $x;}

else{$y=($x=$a*$b)*($x=$a*$b);
echo $y;

}
    
}  
mult(2,5,"ture")."<br>";
?><hr></h3>
    
<h3>課題3-4
    <p><br></p>
    
<?php
echo profile(true);
?>

</h3><hr>

<h3>課題3-5
    <p><br></p>
    
    <?php
    
function profile2($a=null,$b=null,$c=null,$d=null){
$x= "ID；".$a;
$y="氏名；".$b;
$z= "生年月日；".$c;
$v="住所；".$d;

$h=$x."<br>".$y."<br>".$z."<br>".$v;
return $h;

    
}
$h=profile2(24,"鈴木","1989年5月1日","東京");
echo $h;    
        ?>
</h3><hr>

<h3>課題3-6
    <p><br></p>
<?php

//$profile3="ID；1"."氏名；佐藤"."生年月日；1989年5月2日"."住所；東京都";
//$profile4="ID；2"."氏名；高橋"."生年月日；1989年5月3日"."住所；神奈川県";        
//$profile5="ID；3"."氏名；鈴木"."生年月日；1989年5月1日"."住所；千葉県";       
//$profile6="ID；4"."氏名；松本"."生年月日；1989年5月4日"."住所；埼玉県";

function kensaku($a){
    $profile3="ID；1"."<br>"."氏名；佐藤"."<br>"."生年月日；1989年5月2日"."<br>"."住所；東京都";
    $profile4="ID；2"."<br>"."氏名；高橋"."<br>"."生年月日；1989年5月3日"."<br>"."住所；神奈川県";        
    $profile5="ID；3"."<br>"."氏名；鈴木"."<br>"."生年月日；1989年5月1日"."<br>"."住所；千葉県";       
    $profile6="ID；4"."<br>"."氏名；松本"."<br>"."生年月日；1989年5月4日"."<br>"."住所；埼玉県";    

    //$taisyou=$profile3.$profile4.$profile5.$profile6;

    if(strstr("佐藤",$a)){
    return $profile3;}
    elseif (strstr("高橋", $a)) {
    return $profile4;}
    elseif (strstr("鈴木", $a)){
    return $profile5;    
    }
    elseif(strstr("松本", $a)){
    return $profile6;  
     }
    
}

echo kensaku("鈴");
   
?></h3><hr>

<h3>課題3-7
    <p><br></p>
<?php


$global_number=3;

function check_scope(){
static $local_number=1;
global $global_number;
echo $local_number."回目"."\040";
echo $global_number."<br>";
$local_number+=1;
$global_number*=2;
}
for($i=0;$i<20;$i++){
check_scope();}

?>

    
    
    







    