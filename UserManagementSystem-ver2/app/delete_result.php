<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    $id = error('id');
    $mode = error('mode');
    
    if(!isset($id)&&!$mode=="RESULT_DELETE"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    $result = delete_profile($id);
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
        
    ?>
    <h1>削除確認</h1>
    削除しました。<br>
    <?php
    }else{
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    }
    echo "<br>";
    echo return_top(); 
    echo "<br><a href='".SEARCH."'>削除を続ける</a><br><br>";
    ?>
   </body> 
</body>
</html>
