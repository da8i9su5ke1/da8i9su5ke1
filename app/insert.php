<?php require_once '../common/defineUtil.php'; ?>
<?php  session_start();

//追加処理：sessionが空の時エラーが出ないようにエラー演算子処理。
      @$re_name = $_SESSION['name'] ;
      @$re_type = $_SESSION['type'] ;
      @$re_tell = $_SESSION['tell'];
      @$re_comment= $_SESSION['comment'];
      @$re_month = $_SESSION['month'];//修正箇所
      @$re_day = $_SESSION['day'];//修正箇所
      @$re_year = $_SESSION['year'];//修正箇所
      
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name"value="<?php echo $re_name ?>">
    <br><br>
    
    生年月日:　
    <select name="year">
        <option value="" >----</option><!--課題2：未入力時に通過しないよう、valueの値をダブルクォーテーションに
                                       してinsert_confirrmで条件分岐にかけるための処理。-->
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo "$i";?>"<?php if($i == $re_year){echo 'selected';} ?> ><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option><!--課題2：未入力時に処理を通過しないよう初期値を空に設定。 -->
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo "$i";?>"<?php if($i == $re_month){echo 'selected';} ?> ><?php echo $i;?></option>
        <?php } ?><!--不要なセミコロンを消去-->
    </select>月
    <select name="day">
        <option value="">--</option><!--初期値を空に設定。 -->
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo "$i";?>"<?php if($i == $re_day){echo 'selected';} ?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value=1 
           <?php if (isset($re_type) && $re_type==1){echo "checked";} ?>>エンジニア<br>
    <input type="radio" name="type" value=2
           <?php if (isset($re_type) && $re_type==2){echo "checked";} ?>>営業<br>
    <input type="radio" name="type" value=3
        　　<?php if (isset($re_type) && $re_type==3){echo "checked";} ?>>その他<br>
    <br>
    
    電話番号:
    <input type="text" name="tell"value=<?php echo $re_tell ?>>
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"  ><?= $re_comment ?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    <input type="hidden" name="insert_confirm" value="insert_confirm">
    </form>
</body>
</html>
     