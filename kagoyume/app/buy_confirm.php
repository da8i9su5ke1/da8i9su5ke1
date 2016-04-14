<?php
//商品購入確認ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
session_start();



if (!isset($_POST['mode']) && !$_POST['mode'] == "buy") {
    echo return_top();
    die('アクセスルートが不正です。検索ページへ戻り、お買い物をお楽しみください。<br>');
}


 $total = 0;

?>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>購入確認画面</title>
    </head>
    <body>

        <?php
        for ($i = 0; $i <= $_SESSION['count']; $i++) {

            if (isset($_COOKIE["product_name$i"])) {
                
                ?>
                <p><?php echo $_COOKIE["product_name$i"]; ?></p>
                <p><?php echo $_COOKIE["product_price$i"]; ?>円</p>
                <?php
               
                $total += $_COOKIE["product_price$i"];
            }
        }
        ?>
        <form action="<?php echo BUY_COMPLETE ?>" method="POST">
            発送方法:<br>
            通常配送<input type="radio" name="type" value=1 <?php echo "checked"; ?>><br>
            お急ぎ便<input type="radio" name="type" value=2 ><br>


            <font color="red">合計 <?php echo $total; ?>円</font><br>
            <br>
            <input type="submit" name="btnSubmit" value="この金額で購入する">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">
            <input type="hidden" name="mode" value="complete">
        </form>
        <form action="<?php echo CART ?>" >
            <input type="submit" name="btnSubmit" value="カートへ戻る">
        </form>

<?php
echo   return_top();
?>
    </body>
</html>

