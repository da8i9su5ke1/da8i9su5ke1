<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

//検索画面に戻る際にsessionに値があった場合、初期値として返す処理。
session_start();
?>

<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    $id = isset($_SESSION['id'])?$_SESSION['id']:null;
    $mode =isset($_POST['mode'])?$_POST['mode']:null;
    
    if(!$mode=="RESULT_DELETE"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    $result = delete_profile($id);
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
        
    ?>
    <h1>削除確認</h1>
    <h3>削除しました。</h3>
    <?php
    session_destroy();
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    }
    echo "<br>";
    echo return_top(); 
    
    ?>
   </body> 
</body>
</html>