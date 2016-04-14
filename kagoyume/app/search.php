
<?php 
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
session_start();
login();
$hits = array();
$query = !empty($_GET["query"]) ? $_GET["query"] : "";//$queryは検索の中身
$sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score";//表示順番の中身
$ID = !empty($_GET["category_id"])?$_GET["category_id"]:"";//GETの値がないときのエラー回避。GETの初期値をNULLに設定
$category_id = ctype_digit($ID) && array_key_exists($ID, $categories) ? $ID : 1;
//直リンクした際に不正アクセスの旨を伝え、検索ページへ誘導する関数。

if ($query != "") {
    $query4url = rawurlencode($query);//rawurlencodeはURLを張り付けるときに指定した文字列を » RFC 3986 にもとづいてエンコードする関数。
    $sort4url = rawurlencode($sort);
    
    $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
    $xml = simplexml_load_file($url);//この関数は指定のXMLファイルをパースし、オブジェクトに代入する。認識として、ここでURLの中身をrequirしてる感じ？？
    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $hits = $xml->Result->Hit;
    }
 ?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>検索結果画面</title>
        <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
    <body>
        <h1><a href="./top.php">検索結果画面</a></h1>
        <form action="<?php echo SEARCH ?>" class="Search"method="GET">
            表示順序:
            <select name="sort">
            <?php foreach ($sortOrder as $key => $value) { ?>
            <option value="<?php echo h($key); ?>"  <?php if($sort == $key) echo "selected=\"selected\""; ?>><?php echo h($value);?></option>
            <?php } ?>
            </select>
            キーワード検索：
            <select name="category_id">
            <?php foreach ($categories as $id => $name) { ?>
            <option value="<?php echo h($id); ?>" <?php if($category_id == $id) echo "selected=\"selected\""; ?>><?php echo h($name);?></option>
            <?php } ?>
            </select>
            <input type="text" name="query" value=""/>
            <input type="submit" value="Yahooショッピングで検索"/>
            
        </form>
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->

<p>検索キーワード：<?php echo $query; ?><br></p>
<p>検索結果数：<?php echo $xml["totalResultsAvailable"]; ?>件(上位20件表示)</p>

    </body>
</html>
<?php
foreach ($hits as $hit) { ?>
        <div class="Item">
            <h2><a href="<?php echo ITEM; ?>?code=<?php echo  h($hit->Code) ?>"><?php echo h($hit->Name); ?></a></h2>
            <p><a  href="<?php echo ITEM; ?>?code=<?php echo  h($hit->Code) ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a><font  size="5" color="red">価額：<?php echo h($hit->Price); ?>円</font><br></p>
        </div>
        <?php } 
        
}else{
    echo '検索ワードが入力されていません。検索ページへ戻り、お買い物をお楽しみください！！';
    echo '<br><br>';
    echo return_top();
}       

        ?>
