<h3>
<?php

$syouhin=$_GET['syouhin'];
echo"<br><br>";
echo"商品種類：";

if($syouhin==1){
    echo"雑貨";
}elseif($syouhin==2){
    echo"生鮮食品";
}else{
    echo"その他";
}
echo"<br><br><br>";
$sougaku=$_GET['sougaku'];

echo"総額：";
echo"$sougaku"."円";
echo"<br><br>";

echo"単価：";
$ko=$_GET['ko'];
echo$sougaku/$ko;
echo"<br><br>";
echo"ポイント：";
if($sougaku>=3000&&$sougaku<5000){
    echo$sougaku*0.04;
}elseif($sougaku>=5000){
echo$sougaku*0.05;}
else{0;}
echo"P";




?>

</h3>