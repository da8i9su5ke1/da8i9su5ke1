<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
//検索画面に戻る際にsessionに値があった場合、初期値として返す処理。
session_start();
 

        
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
             
        <?php

            $mode = error('mode');
            $name = error('name');
            $year = error('year');
            $type = error('type');
            $result = null;
            
            //詳細画面から戻って来た時初期値を設定するためhiddnの値の有無で判別しました。
            if(empty($name) && empty($year) && empty($type)&&!$mode=="REINPUT"){
                 $result = serch_all_profiles();
                 
                 //GETが空の時、NULLをsessionに代入。詳細画面から戻ってきたときに
                 //検索動作がserch_all_profilesであったことを記憶し、初期値を設置する。
                    bind_p2s('name');
                    bind_p2s('year');
                    bind_p2s('type');
            }else{ 
                
                //return_value()は検索時に入力した内容をsessionに格納することで詳細画面から戻ってきたときに
                //初期値を設定するために作った関数。
                $result = serch_profiles( return_value('name'), return_value('year'),return_value('type'));
             }   
                foreach($result as $value){         
                    $value['userID'];//全部のuserIDが帰ってきてる
                  
            ?>
                <tr>
                    <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                    <td><?php echo $value['birthday']; ?></td>
                    <td><?php echo ex_typenum($value['type']); ?></td>
                    <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate'])); ?></td>
                </tr>
                
            <?php
                
                }
           
         
        
        ?>
        <form action="<?php echo SEARCH ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="検索画面に戻る">
        </form>
       <?php   echo "<br>".return_top();  ?>  
       
        </table>
</body>
</html>
