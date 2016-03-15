<h1>組み込み関数</h1>
<br>
<h2>応用課題10</h2>
<br><h3>
<p>※使用関数； str_split();</p>
    
    <?php
$stamp  = mktime() ;
$now = date("Y年m月d日G時i分s秒");
$fp=  fopen("rog_file.txt","w");
fwrite($fp, "開始；$now\n");
fclose($fp);
$info = "abcdefghijklmnopqrstuvwxyz";
$arr =  str_split($info,2);

foreach ($arr as$key => $value){
echo $key."番目；".$value."<br>";}

$stamp2 = mktime() ;
$now2 = date("Y年m月d日G時i分s秒");
$fp2 =  fopen("rog_file.txt","a");
fwrite($fp2, "終了；$now2 ");
fclose($fp2);

//$fp3 = fopen("rog_file.txt"," r");
//$file_txt = fgets($fp3);
//echo $file_txt;
$fp3 = fopen("rog_file.txt","r");
while(!feof($fp3)){
$file_txt = fgets($fp3);
echo "<br>".$file_txt;}
fclose($fp3);

?>
</h3>
        
<!--while (!feof($fp)) {
  // ファイルから一行読み込む
  $line = fgets($fp);
  // 読み込んだ行を出力する
  print $line;
  // <br>の出力
  print "<br>\n";-->


