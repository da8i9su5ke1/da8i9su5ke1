<h1>カートの中身！！</h1><hr>
<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
session_start();

$i = isset($_POST['delete']) ? $_POST['delete'] : null;
$mode = isset($_POST['mode']) ? $_POST['mode'] : null;
$total = 0;
if ($mode == 'delete' ) {
    setcookie("product_price$i", '', time() - 1800);
    setcookie("product_image$i", '', time() - 1800);
    setcookie("product_name$i", '', time() - 1800);
    setcookie("product_id$i", '', time() - 1800);
    $_SESSION['count']-=1;
    $mode = null;
    $total -= $_COOKIE["product_price$i"];
}

if (empty($_SESSION['count'])) {
    echo 'カートに商品が入っていません。検索ページへ戻りお買い物をお楽しみください。<br><br>';
    echo return_top();
} else {

    $sum = $_SESSION['count'];

    for ($i = 1; $i <= $sum; $i++) {
        ?>
        <html>
            <head>
                <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
                <title>カート詳細画面</title>

            </head>
            <body>
                <form action="<?php echo CART ?>" method="POST">
                  
                    <font size="4"line-height=1.5em><a href="<?php echo ITEM.'?code='.$_COOKIE["product_id$i"] ?>"><?php echo $_COOKIE["product_name$i"]; ?></a><br><br></font>
                    <div align="center"><font size="6" color="red">価額：<?php echo $_COOKIE["product_price$i"]; ?>円<br></font></div>
                    <div align="left"><a href="<?php echo ITEM.'?code='.$_COOKIE["product_id$i"]?>"><img src="<?php echo $_COOKIE["product_image$i"]; ?>" /><br></div>
                    <input type="submit" value="削除"/>
                    <input type="hidden"name="delete"value="<?php echo $i; ?>"/>
                    <input type="hidden"name="mode"value="delete"/>
                    <?php $total+=$_COOKIE["product_price$i"] ?>
                </form>
                
                <hr>
                </body>
               
            <?php }
        }  ?><h3>合計金額 <?php echo $total; ?></h3>
         <form action="<?php echo BUY_CONFIRM ?>" method="POST">
                    <input type="submit" value="購入"/>
                    <input type="hidden"name="mode"value="buy"/>
                </form>