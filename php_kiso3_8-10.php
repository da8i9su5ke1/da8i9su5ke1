<h1>PHP基礎3　課題8～10</h1>
<p><br></p>


<h3>課題3-8
    <p><br></p>
<?php
require "util.php";
profile();
atai(30);


?></h3><hr>

<h3>課題3-9
<p><br></p>
<?php
$profile3=array("ID;"=>1,"氏名；"=>"佐藤","生年月日；"=>"1989年5月2日","住所；"=>"埼玉県");
$profile4=array("ID;"=>2,"氏名；"=>"高橋","生年月日；"=>"1989年5月3日","住所；"=>"静岡県");        
$profile5=array("ID;"=>3,"氏名；"=>"鈴木","生年月日；"=>"1989年5月1日","住所；"=>"東京都");           

$matome=array($profile3,$profile4,$profile5);
//echo $matome[0]["ID;"];
foreach ($matome as $value){
  
    foreach ($value as $key=>$value2) {
        if($key=="ID;"){
        continue;}
        elseif($key=="住所；"){
    continue;
        }
    echo $key. $value2."<br>";
    }   
}
    ?></h3><hr>

    
<h3>課題3-10
    <p><br></p>
<?php

$profile3=array("ID;"=>1,"氏名；"=>"佐藤","生年月日；"=>"1989年5月2日","住所；"=>"埼玉県");
$profile4=array("ID;"=>2,"氏名；"=>"高橋","生年月日；"=>"1989年5月3日","住所；"=>"静岡県");        
$profile5=array("ID;"=>3,"氏名；"=>"鈴木","生年月日；"=>"1989年5月1日","住所；"=>"東京都");           

$matome=array($profile3,$profile4,$profile5);
//echo $matome[0]["ID;"];

//  for($s=0;$s=1;$s++){break;
 $a=0;
 $c=2;
  foreach ($matome as $value) {

 if($a>$c){
          break;}
    foreach ($value as $key=>$value2) {
        if($key=="ID;"){
        continue;}
        elseif($key=="住所；"){
    continue;
    } 
    echo $key. $value2."<br>";
   $a++;
 }  }
?>
