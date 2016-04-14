<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

cart();

$productID = !empty($_GET['code'])?$_GET['code']:"";
if (empty($productID)) {
    echo '商品がありません。検索ページへ戻り、お買い物をお楽しみください。<br><br>';
    die(return_top());
}
$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$productID&image_size=300&responsegroup=medium";
$xml = simplexml_load_file($url); //この関数は指定のXMLファイルをパースし、オブジェクトに代入する。認識として、ここでURLの中身をrequirしてる感じ？？
if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
    $hits = $xml->Result->Hit;
}
$rate = h($hits->Review->Rate);
$name = h($hits->Name);
$price = h($hits->Price);
$image = h($hits->ExImage->Url);
$small_image = h($hits->Image->Small);
$headline = h($hits->Headline);
$description = $hits->Description;
$product_url = $hits->Url;


?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>商品詳細画面</title>
        <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
    <body>
        <h1>商品詳細画面</h1><br>
<font size="5"><?php echo $name ; ?><br><br></font>
<font size="5" color="red">価額：<?php echo $price; ?>円<br></font>
<p><img src="<?php echo $image; ?>" /><br></p>

<h4>〔商品説明〕</h4>
<p><?php echo $description; ?><br></p>
<font color="red">レビュー評価：<?php echo $rate; ?><br></p>
<form action="<?php echo ADD ?>"method="POST">
    <input type="submit" value="カートに追加する"/>
    <input type="hidden"name="name"value="<?php echo $name; ?>"/>
    <input type="hidden"name="price"value="<?php echo $price;?>"/>
    <input type="hidden"name="id"value="<?php echo $productID; ?>"/>
    <input type="hidden"name="image"value="<?php echo $small_image ?>"/>
    <input type="hidden"name="url"value="<?php echo $product_url ?>"/>
    <input type="hidden"name="mode"value="add"/>
    
</form>
</html>





