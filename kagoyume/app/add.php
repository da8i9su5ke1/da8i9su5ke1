<?php

require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
session_start();

login(); cart();

$mode = !empty($_POST['mode']) ? $_POST['mode'] : "";
if (empty($mode) && $mode !== 'add') {
    echo '不正アクセスです。検索ページへ戻り、お買い物をお楽しみください。<br>';
    die(return_top());
}

if(!isset($_SESSION['id'])){
    echo 'ログインしてから、お買い物をお楽しみください。';
}else{
    
$name = $_POST['name']; 
$price = $_POST['price'];
$image = $_POST['image'];
$productID = $_POST['id'];

$count=isset($_SESSION['count'])?$_SESSION['count']:0;
if ($count<=0) {
    $count = 1;
    
    setcookie("product_name$count", $name);
    setcookie("product_price$count", $price);
    setcookie("product_image$count", $image);
    setcookie("product_id$count", $productID);
} else {
    $count++ ;
    
    setcookie("product_name$count", $name); 
    setcookie("product_price$count", $price);
    setcookie("product_image$count", $image);
    setcookie("product_id$count", $productID);
    
}
$_SESSION['count'] = $count;

?>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>カートに追加ページ</title>
    </head>
    <body>
        <h1>カートに追加しました。</h1>
<?php }

echo return_top();
?>        
      <br><br><a href="<?php echo $_SERVER['PHP_SELF'];?>">前のページへ戻る</a> 