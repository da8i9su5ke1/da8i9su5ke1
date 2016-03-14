<h1>基礎課題２</h1>


<h3>課題2-1
    <p><br></p>
<?php
$exe=3;
$message=" ";
switch($exe){
    case 1:$message="ONE";
    break;
    case 2:$message="TWO";
    break;
   default:
   
        $message="想定外";
        
        break;
}

echo $message;
echo "<br>";
?>
    <hr></h3>

<h3>基礎課題2-2
    
<p><br><p>
    <?php
    
    $message1 = "";
    $exe1 = "A";
    
    switch ($exe1){
        case "A":
            $message1 = "英語";
            
            break;
        case "あ":
            $message1 = "日本語";
            break;
        default:
            $message1 = NULL;
    }
            
    echo "$message1";
            
       
    
    ?>
<hr></h3>

<h3>基礎課題2-3
    <p><br></p>
       

<?php

$a=8;
for( $i = 0; $i < 20; $i++){
  echo $a."<br />"; 
$a=$a*8;
}
//for( $i = 0, $a = 8; $i < 20; $i++, $a = $a*8 ){
//  echo $a."<br />\n"; //改行しながら値を出力
//この方法もあった//}

?>
<hr></h3>

<h3>基礎課題2-4
<p><br></p>
<?php
$z = "A";
for($i = 0; $i < 30; $i++){
    $z = $z."A";
}
echo $z;
?>

</h3><br><hr>

<h3>基礎課題2-5
    <p><br></p>
<?php
//$f=0;
//for($i=0;$i<=100;$i++)
//{$f+=$i;
//
////    $sum=0;
////        for($i=1;$i<=100;$i++){
////                $sum+=$i;
//        }
//        
//        echo $f;
        $f=0;
        for($i=0;$i<=100;$i++)
        {
        $f=$f+$i;
        //計算式を一から表示させるためにはどうしたらいいのか？方法はあるのか？
        //例えば、0+1+2+3+4+、、、、、＝4950とか
        }echo $f;
        
?>

</h3><hr>

<h3>基礎課題2-6
    <p><br></p>
    <?php
    

    $key = 1000;
    while ($key >=100){
//    $key /= 2;
//    echo $key."<br>";   
//    echo $key. "<br>"; 
      echo $key . "÷" . 2 . "=" . $key /2 ."<br>";
      $key/=2;
      
    }
    ?>

    <hr></h3>
    
    <h3>基礎課題2-7
        <p><br></p>
        
    <?php
    
//    $arr=array(10, 100, 'soeda', 'hayashi', -20, 118, 'END');
//    
//    $a=0;
//    
//    while($a!=7) {
//        
//    
//    echo $arr[$a]. "<br>"; //ループ表示の順番も注意して入力すること。
//    //　　　　　　　　　　　　上の行とこの行を入れ間違うとエラーになる。
//    
//    $a += 1;}
    
    
    $arr=array(10, 100, 'soeda', 'hayashi', -20, 118, 'END');
    $a=0;
    for($a=0;$a<7;$a++){
        echo $arr[$a]."<br>";
    }//上のコメント欄のソースでも同じことができる。
    ?>

    </h3><hr>
        
    
    <h3>基礎課題2-8
        
        <p><br></p>
        
<?php

$arr=array(10, 100, 'soeda', 'hayashi', -20, 118, 'END');

$arr[2]='soeda';
$arr[2]=33;

echo $arr[2];

?>

</h3><hr>

<h3>基礎課題2-9
    <p><br></p>
<?php

$arr=array(
    1=>"AAA",
    "hello"=>"world",
    "soeda"=>33,
    20=>20);
 
echo $arr["hello"];

?>
              



        