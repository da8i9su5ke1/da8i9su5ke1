<h1>DB操作</h1><br><br>

<h3>課題1 : Challenge_dbへのエラーハンドリングを含んだ接続の確立を行ってください
<?php
 
 try{
$pdo_object=
        new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','suzuki','124014');
}catch(PDOException $Exception){
 	die('接続に失敗しました:'.$Exception->getMessage());
 }

?>
</h3><br><hr>

<h3>課題2:前回の課題1で作成したテーブルに自由なメンバー情報を格納する処理を構築してください
<br><br>
<?php

$sql="INSERT INTO profiles(profilesID,name,tell,age,birthday) values(5,'鈴木　大介','024-1235-5488',26,'1989-05-01')";
$query2=$pdo_object->prepare($sql);
//$query2->execute();
?>
</h3><br><hr>

<h3>課題3:前回の課題1で作成したテーブルからSELECT*により全件取得し、画面に取得した全情報を表示してください
<br><br><?php

$qul2="select * from profiles";

$query=$pdo_object->prepare($qul2);

$query->execute();

$result = $query->fetchall(PDO::FETCH_ASSOC);
        
//var_dump($result);
foreach ($result as $value) {
    foreach ($value as $key=>$value2){
       echo $key."：".$value2."<br>"; 
    }
}
?>

</h3><br><hr>
<h3>課題4:前回の課題1で作成したテーブルからprofileID=1の情報を取得し、画面に取得した情報を表示してください<br><br>
<?php
$sql3="select profilesID,name,tell,age,birthday from profiles where profilesID=1";
$query3=$pdo_object->prepare($sql3);
$query3->execute();
$result2=$query3->fetchall(PDO::FETCH_ASSOC);
//var_dump($result2);
foreach ($result2 as $value) {
    foreach ($value as $key=>$value2){
       echo $key."：".$value2."<br>"; 
    }
}
?>

</h3><br><hr>
<h3>課題5：nameに「茂」を含む情報を取得し、画面に取得した情報を表示してください&
    <br><br>
<?php
$sql4= "select profilesID,name,age,birthday from profiles where name like '%茂%'";
$query4=$pdo_object->prepare($sql4);
$query4->execute();
$result3=$query4->fetchall(PDO::FETCH_ASSOC);
//var_dump($result3);
foreach ($result3 as $value1) {
    foreach ($value1 as $key3=>$value3){
       echo $key3."：".$value3."<br>"; 
    }   
}       
?></h3><br><hr>

<h3>課題6:課題2でINSERTしたレコードを指定して削除してください。SELECT*で結果を表示してください
<?php
$sql5 = 'DELETE FROM profiles where name = "鈴木　大介"';
$stmt = $pdo_object -> prepare($sql5);
$stmt -> bindValue('鈴木　大介', $value, PDO::PARAM_INT);
$stmt -> execute();
?>
</h3><br><hr>
<h3>課題7:profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に更新してください
<?php
$sql6 = 'update profiles set name="松岡　修造",age=48,birthday="1967-11-06" where profilesID=1';
$stmt2 = $pdo_object ->prepare($sql6);
$stmt2 -> bindValue('松岡　修造'&&'1967-11-06'&&'48', $value, PDO::PARAM_INT);
$stmt2 -> execute();

?>
</h3><br><hr>
<h3>課題8:検索用のフォームを用意し、名前の部分一致で検索＆表示する処理を構築してください。
    同じページにリダイレクトするPOST処理と、POSTに値が入っているかの条件分岐を活用すれば、
    一つの.phpで完了できますので、チャレンジしてみてください
    <br><br>
    
    <form action="DB_sousa_kadai.php"method="post">
        <table border="0">
            <tr>
                <td><input type="text"name="name"></td>
            <tb><input type="submit"name="name"value="検索"></tb>
            </tr>
        </table>   
    </form>
<?php
//var_dump($_POST["name"]);
$kensaku = isset($_POST["name"])? $_POST["name"]:null;

if ($kensaku==""){
 echo '値がありません。';
    
}else{
   
    $sql7 = "select profilesID,name,age,birthday from profiles where name like '%$kensaku%'";
    $query7 = $pdo_object->prepare($sql7);
    $query7->execute();
    $result4 = $query7->fetchall(PDO::FETCH_ASSOC);
        echo "〔検索結果〕<br>";
            foreach ($result4 as $value7) {
                foreach ($value7 as $key4=>$value4){
                    echo $key4.'：'.$value4.'<br>'; 
                   
                }   
            }
 }
?> 
</h3><br><hr>

<h3>課題9:フォームからデータを挿入できる処理を構築してください。<br><br>
<br><br>
    
    <form action="DB_sousa_kadai.php"method="post">
        <table border="1">
  
            <tr><th>ID：</th>
            <td><input type="text"name="profilesID3"></td></tr>
            <tr><th>氏名：</th>
            <td><input type="text"name="name2"></td></tr>
            <tr><th>tell：</th>
            <td><input type="text"name="tell2"></td></tr>
            <tr><th>年齢：</th>
            <td><input type="text"name="age2"></td></tr>
            <tr><th>誕生日：</th>
            <td><input type="text"name="birthday2"></td></tr>
            <tr><td><input type="submit"name="im"value="データ送信"></td></tr>
            
        </table>   
    </form>
<?php
$profilesID2 = isset($_POST["profilesID3"])?$_POST["profilesID3"]:null;
$name2       = isset($_POST["name2"])?$_POST["name2"]:null;
$tell2       = isset($_POST["tell2"])?$_POST["tell2"]:null;
$age2        = isset($_POST["age2"])?$_POST["age2"]:null;
$birthday2   = isset($_POST["birthday2"])?$_POST["birthday2"]:null;

if(($profilesID2=="")&&($name2==""||$age2==""||$tell2==""||$birthday2=="")){
    echo "未入力です。";
}else{
    $sql9 = "INSERT INTO profiles(profilesID,name,tell,age,birthday) values('$profilesID2','$name2','$tell2','$age2','$birthday2')";
    $query9=$pdo_object->prepare($sql9);
    $query9->execute();  
    
 }
?>    
</h3><br><hr>
<h3>課題10:profileIDで指定したレコードを削除できるフォームを作成してください<br><br>
     <form action="DB_sousa_kadai.php"method="post">
        <table border="1">
            <tr><th>ID：</th>
            <td><input type="text"name="profilesID2"></td></tr>
            <tr><td><input type="submit"name="kkk"value="データ削除"></td></tr>
        </table>    
     </form>        
<?php
$profilesID2 = isset($_POST["profilesID2"])?$_POST["profilesID2"]:null;
if($profilesID2!==""){
    $ID = "delete from profiles where profilesID=$profilesID2";
    $stmt = $pdo_object -> prepare($ID);

$stmt -> execute();
}
?>    
</h3><br><hr>
<h3>課題11:profileIDで指定したレコードの、profileID以外の要素をすべて上書きできるフォームを作成してください
    <form action="DB_sousa_kadai.php"method="post">
        <table border="1">
            <tr><th>上書き指定ID：</th>
                <td><input type="text"name="profilesID"></td></tr>
            
        </table>
            <table border="1">
                <tr><th>氏名：</th>
                <td><input type="text"name="name"></td></tr>
                <tr><th>tell：</th>
                <td><input type="text"name="tell"></td></tr>
                <tr><th>年齢：</th>
                <td><input type="text"name="age"></td></tr>
                <tr><th>誕生日：</th>
                <td><input type="text"name="birthday"></td></tr>
                <tr><td><input type="submit"name="king"value="上書き送信"></td></tr>
            </table>   
    </form>
<?php
$name            = isset($_POST["name"])?$_POST["name"]:null;
$tell            = isset($_POST["tell"])?$_POST["tell"]:null;
$age             = isset($_POST["age"])?$_POST["age"]:null;
$birthday        = isset($_POST["birthday"])?$_POST["birthday"]:null;
$profilesID      = isset($_POST["profilesID"])?$_POST["profilesID"]:null;

if(($profilesID==""||$profilesID==null)&&($name==""||$tell==""||$age==""||$birthday=="")){
    echo "IDを指定してください。";
}else{
    $sql11 = "update profiles set name= '$name',age= $age ,birthday='$birthday',tell='$tell' where profilesID=$profilesID";
    $stmt3 = $pdo_object ->prepare($sql11);
    $stmt3 -> bindValue($name&&$birthday&&$age&&$tell, $value, PDO::PARAM_INT);
    $stmt3 -> execute();
 }
?>    
</h3><br><hr>
<h3>課題12:検索用のフォームを用意し、名前、年齢、誕生日を使った複合検索ができるようにしてください。
<form action="DB_sousa_kadai.php"method="post">
    <table border="1">
                <tr><th>氏名：</th>
                <td><input type="text"name="name13"></td></tr>
                <tr><th>年齢：</th>
                <td><input type="text"name="age13"></td></tr>
                <tr><th>誕生日：</th>
                <td><input type="text"name="birthday13"></td></tr>
                <tr><td><input type="submit"name="klh"value="複合検索"></td></tr>
    </table>           
</form>
<?php
$name13 = isset($_POST["name13"])?$_POST["name13"]:null;
$age13 = isset($_POST["age13"])?$_POST["age13"]:null;
$birthday13 = isset($_POST["birthday13"])?$_POST["birthday13"]:null;

if (($name13==""||$name13==null)&&($age13==""||$age13==null)&&($birthday13==""||$birthday13==null)){
 echo '値がありません。';
    
}  else {
    $sql13 = "select profilesID,name,age,birthday from profiles where name like '%$name13%' and age like '%$age13%' and birthday like '%$birthday13%'";
    $query13 = $pdo_object->prepare($sql13);
    $query13->execute();
    $result13 = $query13->fetchall(PDO::FETCH_ASSOC);  
   
        echo "〔検索結果〕<br>";
            foreach ($result13 as $value7) {
                foreach ($value7 as $key4=>$value4){
                    echo $key4.'：'.$value4.'<br>'; 
                }   
            }   
  }
?>
</h3>
<!--//}elseif ($age13!==""||null) {
//    $sql14 = "select profilesID,name,age,birthday from profiles where name like '%$age13%'";
//    $query14 = $pdo_object->prepare($sql14);
//    $query14->execute();
//    $result14 = $query14->fetchall(PDO::FETCH_ASSOC);
//      echo "〔検索結果〕<br>";
//            foreach ($result14 as $value8) {
//                foreach ($value8 as $key5=>$value5){
//                    echo $key5.'：'.$value5.'<br>'; 
//                }   
//            }
//}elseif ($birthday13!==""||NULL) {
//    $sql15 = "select profilesID,name,age,birthday from profiles where name like '%$birthday13%'";
//    $query15 = $pdo_object->prepare($sql13);
//    $query15->execute();
//    $result15 = $query15->fetchall(PDO::FETCH_ASSOC);
//    echo "〔検索結果〕<br>";
//            foreach ($result15 as $value9) {
//                foreach ($value9 as $key6=>$value6){
//                    echo $key6.'：'.$value6.'<br>'; 
//                }   
//            }
//}    -->

<!--while ($name13!==""||null||$age13!==""||null||$birthday13!==""||null) {
    switch($name13||$age13||$birthday13){
    case $name13:
    $sql13 = "select profilesID,name,age,birthday from profiles where name like '%$name13%' ";
    $query13 = $pdo_object->prepare($sql13);
    $query13->execute();
    $result13 = $query13->fetchall(PDO::FETCH_ASSOC);  
        echo "〔検索結果〕<br>";
            foreach ($result13 as $value7) {
                foreach ($value7 as $key4=>$value4){
                    echo $key4.'：'.$value4.'<br>'; 
                }   
            }
    case $age13:
        $sql14 = "select profilesID,name,age,birthday from profiles where name like '%$age13%'";
    $query14 = $pdo_object->prepare($sql14);
    $query14->execute();
    $result14 = $query14->fetchall(PDO::FETCH_ASSOC);
      echo "〔検索結果〕<br>";
            foreach ($result14 as $value8) {
                foreach ($value8 as $key5=>$value5){
                    echo $key5.'：'.$value5.'<br>'; 
                }   
            }
    case $birthday13:
       $sql15 = "select profilesID,name,age,birthday from profiles where name like '%$birthday13%'";
    $query15 = $pdo_object->prepare($sql13);
    $query15->execute();
    $result15 = $query15->fetchall(PDO::FETCH_ASSOC);
    echo "〔検索結果〕<br>";
            foreach ($result15 as $value9) {
                foreach ($value9 as $key6=>$value6){
                    echo $key6.'：'.$value6.'<br>'; 
                }   
            } aaaaa
    }break;
}-->

  