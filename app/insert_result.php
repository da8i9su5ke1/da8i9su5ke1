<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>
<!--追記箇所：上記のdbaccesUtil.phpのリクワイヤを追記ー-->
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    
    ////課題5：insert_confirm.php上でhiddonでvalueの値を投げ、
    //$_POST['check']で受け取り空か否かで直リンクの有無を判別している。 
    if(empty($_POST['check'])){
       
    //課題5：直リンクした場合の対処処理用ユーザー定義関数。
        illegal_access();
        
    }else{
    
    session_start();
    
    $name      =  $_SESSION['name'];
    $birthday  =  $_SESSION['birthday'];
    $type      =  $_SESSION['type'];
    $tell      =  $_SESSION['tell'];
    $comment   =  $_SESSION['comment'];

    //db接続を確立
    $insert_db = connect2MySQL();
    
    
    //課題8:データベースアクセス系の処理をまとめたユーザー定義関数
    db_access($name, $birthday, $tell, $type, $comment);
    ?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    
    種別:
    <?php //修正箇所：typeのSQLの型がintのため,数値のみ正しく受け取るので
//          form時のvalueを数値化し、ここで判別式により文字に直し
//          結果画面で表示させている。   
        if($type == 1){
            echo 'エンジニア'; 
        }elseif($type == 2){
            echo '営業';
        }elseif($type == 3){
            echo 'その他';
        }
    ?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>

　　<?php echo return_top(); ?> <!--修正箇所  トップページへ戻る操作を追加。-->
    <?php } ?>
    
</body>

</html>
