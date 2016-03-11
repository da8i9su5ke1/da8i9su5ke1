
    
<!--//
//$x=$_GET["x"];
//$arr=array(2,3,5,7);
//while($x%2==0)
//$x=$x/2;
//echo $x."<br>"
//    if($x!==1) {
//      echo "その他";   -->
<h1>応用課題2-10</h1>
    <p><br></p>
    <h3>
<?php
$x=$_GET["x"];
$arr=array(2,3,5,7);
$a=0;
echo"元の値：";
echo $x."<br>"."<br>";
echo "１桁の素因数；";
while($x%2==0||$x%3==0||$x%5==0||$x%7==0){
    switch ($x){
case $x%$arr[$a]==0:$x=$x/$arr[$a];
echo$arr[$a].",";break;
default :$a=$a+1;break;
    
}}
if($a==null){echo "無し";}
echo "<br>"."<br>"."結果：";
echo $x."<br>";

  if($x!==1) 
  echo"<br>". "その他";
  ?>

</h3>