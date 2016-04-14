<?php

/** @mainpage
 *  商品検索フォームを表示
 */

/**
 * @file
 * @brief 商品検索フォームを表示
 * 
 * 商品検索フォームを表示し、
 * フォームから入力された値を条件に、検索APIを利用して、検索した結果をhtmlに埋め込んで表示します。
 * 検索結果に対して、カテゴリーによる絞り込みと、並び順の変更ができます。
 *
 * PHP version 5
 */
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");//共通ファイル読み込み(使用する前に、appidを指定してください。)
session_start();

login(); cart();

?> 
<html>
    <h3>金銭取引の発生しない、夢の架空ショッピングサイトです！！
    好きなものを好きなだけ、お金を気にせずお買い物をお楽しみください。</h3>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>商品検索画面</title>
        <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
    
    <body>
        <h1><a href="./top.php">ショッピングデモサイト〔かごゆめ〕 - 商品を検索する</a></h1>
        <form action="<?php echo SEARCH ?>" class="Search"method="GET">
            表示順序:
            <select name="sort">
            <?php foreach ($sortOrder as $key => $value) { ?>
            <option value="<?php echo h($key); ?>" ><?php echo h($value);?></option>
            <?php } ?>
            </select>
            キーワード検索：
            <select name="category_id">
            <?php foreach ($categories as $id => $name) { ?>
            <option value="<?php echo h($id); ?>" ><?php echo h($name);?></option>
            <?php } ?>
            </select>
            <input type="text" name="query" value=""/>
            <input type="submit" value="Yahooショッピングで検索"/>
            
        </form>
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
    </body>
</html>

