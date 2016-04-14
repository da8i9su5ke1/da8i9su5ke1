<?php

//購入完了ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();
if (!isset($_POST['mode']) && !$_POST['mode'] == "complete") {
    echo return_top();
    die('アクセスルートが不正です。検索ページへ戻り、お買い物をお楽しみください。<br>');
}
if (isset($_POST['type']) && isset($_POST['total']) && isset($_SESSION['userID'])) {
    $result = insert_buy_t($_SESSION['userID'], $_POST['total'], $_POST['type']);
    //合計購入金額を求める。
    $total_result = user_total($_SESSION['userID']);
    $total_result[0]['total'] += $_POST['total'];
    //データベースの合計金額を上書き。
    update_total($total_result[0]['total'], $_SESSION['userID']);
}
if (!isset($result)) {

    echo '購入が完了致しました。<br>';

    
     //クッキーの情報を削除して、カートの中身を空にする。
    for ($i = 0; $i <= $_SESSION['count']; $i++) {
        setcookie("product_name$i", "", time() - 3600);
        setcookie("product_id$i", "", time() - 3600);
        setcookie("product_price$i", "", time() - 3600);
        setcookie("product_image$i", "", time() - 3600);
    }
} else {
    echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:' . $result;
}
echo return_top();

