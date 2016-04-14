
<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();

$mode = isset($_POST['logout'])?$_POST['logout']:null;
if($mode=='LOGOUT'){
  
    session_destroy();
    
    echo 'ログアウトしました。5秒後にトップページへ戻ります。<br>';
    echo '<meta http-equiv=refresh content=5;URL='.TOP_URL.'>';
    
}else{



$name = isset($_POST['name'])?$_POST['name']:null;
$password = isset($_POST['password'])?$_POST['password']:null;
$access_count = isset($_POST['access'])?$_POST['access']:null;


$result = serch_user($name, $password);
if(empty($result)){
  
?>
        <html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        ログイン画面
    </title>
    <link rel="stylesheet" type="text/css" href="../util/prototype.css" />
</head>
<body>

    <form action="<?php echo LOGIN; ?>" method="POST">
  <h1>ログイン画面</h1>
  <h3><?php if($access_count==1){ echo "ユーザー名またはパスワードが正しくありません。再度ログインしてください。";} ?></h3>
  <div class="inset">
  <p>
    <label for="name">名前</label>
    <input type="text" name="name" >
  </p>
  <p>
    <label for="password">パスワード</label>
    <input type="password" name="password" >
  </p>
  
  </div>
  
  <p class="p-container">
      <input type="hidden" name="rogin" value="RIGIN">
      <input type="hidden" name="access" value=1>
    <input type="submit" name="go" value="ログイン">
  </p>
  
  <a href="<?php echo REGISTRATION; ?>"><font  size=3 >新規登録</font></a> 
  
</form>
 
</body>
</html>
<?php }else{ ?>
<font  size=8 ><?php echo "ログインに成功しました。"; ?></font></a> 
<?php 
$_SESSION['login']=isset($_POST['login'])?$_POST['login']:null;
foreach ($result as $value){
 
}   
  $_SESSION['value'] = $value;
  $_SESSION['id'] = $value["userID"];
  $_SESSION['name'] = $value["name"];
  $_SESSION['mail'] = $value["mail"];
  $_SESSION['address'] = $value["address"];
  $_SESSION['password'] = $value["password"];
  $_SESSION['total'] = isset($value["total"])?$value["total"]:0;
  $_SESSION['newdate'] = $value["newDATE"];
//if( $access_count!==1){ // HTTP_REFERERの値がなければ以下の文を出力
//$_SESSION['before_page'] = $_SERVER['PHP_SELF'];

} } echo return_top(); ?>
  
        

  

