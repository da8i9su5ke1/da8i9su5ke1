<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
<body>
<?php 
if(empty($_POST['insert_confirm'])){
    
    illegal_access();
    
}else{
               
    ?>       
    <?php 
    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day']) && !empty($_POST['type']) 
            && !empty($_POST['tell']) && !empty($_POST['comment'])){
        
        $post_name     = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type     = $_POST['type'];
        $post_tell     = $_POST['tell'];
        $post_comment  = $_POST['comment'];

        //セッション情報に格納
      
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
        
      //課題2：生年月日が未入力でも通過しないようにsessionに値を保持する処理。
        $_SESSION['month'] = $_POST['month'];//修正箇所
        $_SESSION['day'] = $_POST['day'];//修正箇所
        $_SESSION['year'] = $_POST['year'];//修正箇所
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php if($post_type == 1){
                    echo 'エンジニア'; 
                 }elseif($post_type == 2){
                     echo '営業';
                 }elseif($post_type == 3){
                     echo 'その他';
                 }?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">

      <!--課題5：直リンクしていないかチェックするためのhiddonで値を投げる処理 -->          
          <input type="hidden" name="check" value="check">
        
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        
    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        
    <?php
    //課題3：未入力箇所を明記するための条件分岐、$_POSTの値が空の場合
    //      空の箇所の未入力を表示する。
    //課題4：elseはPOSTに値が入っている場合はsessionをして、
    //　　　　再入力時に値をフォームに保持させるための処理。
    if (empty($_POST['name'])){
        echo "氏名が未入力です。".'<br>';
    }else{ $_SESSION['name'] = $_POST['name'];
        
     }
    if (empty($_POST['year'])||empty($_POST['month'])||empty($_POST['day'])){
        echo "生年月日が未入力です。".'<br>';
    }else{
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['day'] = $_POST['day'];
     }               
    if (empty($_POST['type'])){
        echo "種別が未入力です。".'<br>';
    }else{ $_SESSION['type'] = $_POST['type'];
        
     }
    if (empty($_POST['tell'])){
        echo "電話番号が未入力です。".'<br>';
    }else{ $_SESSION['tell'] = $_POST['tell'];
        
     }
    if (empty($_POST['comment'])){
        echo "コメントが未入力です。".'<br>';
    }else{ $_SESSION['comment'] = $_POST['comment'];
        
     }
    ?> 
        <h3>再度入力を行ってください</h3><br>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
        
    <?php echo return_top(); 
 }  //課題5：トップページへ戻るための関数。
    ?>        
</body>
</html>
