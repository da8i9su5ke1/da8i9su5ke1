<h1>組み込み関数</h1>
<br>
<h3>ロジック課題12
</h3><br>   


<?php
$arr = array();
$count= 0;
$read_line = 12;
$bocchan =  fopen("4_12_bocchan.txt", "r"); //bocchan.txtを読み込み。

echo "〔元の文章〕"."<br>"."<br>";
for($i=1;$i<=$read_line;$i++){
    $bf2 =  fgets($bocchan);
    $arr3[$i] = $bf2;
    echo"(". $i."行目)"."<br>".$arr3[$i]."<br>";
   
           
}echo "<br>"."<br>";


echo "〔変更後の文章〕"."<br>"."<br>";

fclose($bocchan);

$bocchan =  fopen("4_12_bocchan.txt", "r");

for($i=1;$i<=$read_line;$i++){    
    $bf = fgets($bocchan);  //$bocchan(bocchan.txt)から一行を格納。
    $arr[$i]=$bf;
    $arr2=  explode("。", $arr[$i]);
    echo"(".$i."行目)"."<br>";
    foreach ($arr2 as $value)
        {
        //echo bin2hex($value);//bin2hex
        if($value!=="\r\n"){//\r\nウィンドウズの改行コードが配列の最後に入っていたから、うまく処理できなかった。
            //                この場合、replaceで改行コードを入れて置き換えるか、右記のようにウィンドウズの改行コードを見つける必要がある。
        echo $value."。"."<br>";
        }
        else   {echo "";
        }
        
    
    }

            
}
fclose($bocchan);
?>
