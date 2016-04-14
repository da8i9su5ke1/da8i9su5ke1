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
        <title>更新結果画面</title>
    </head>
    <body>
        <?php
        $mode = isset($_POST['mode'])?$_POST['mode']:null;
        if (!$mode == "RESULT") {
            echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
        } else {
    
            $id = $_POST['id'];
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $address = $_POST['address'];
            $password = $_POST['password'];

              
            //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
            $values = array(
                'name' => bind_p2s('name'),
                'password' => bind_p2s('password'),
                'mail' => bind_p2s('mail'),
                'address' => bind_p2s('address'),
                'userID' => bind_p2s('userID'),
               );
          

            //1つでも未入力項目があったら表示しない
            if (!in_array("", $values, true)) {
               
                    $result = update_profile($id, $name, $password, $mail, $address);
                    if (isset($result)) {
                        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:' . $result;
                    }
                    ?>        
                    <h1>更新確認</h1><br>
                    ユーザー名:<?php echo $values['name']; ?><br>
                    パスワード:<?php echo $values['password']; ?><br>                  
                    Eメール:<?php echo $values['mail']; ?><br>
                    住所:<?php echo $values['address']; ?><br><br>
                    以上の内容で更新しました。<br>

                    <?php
                
            } else {
                ?>
                <h1>入力項目が不完全です</h1><br>
                再度入力を行ってください<br>
                <h3>不完全な項目</h3>
                <?php
                //連想配列内の未入力項目を検出して表示
                foreach ($values as $key => $value) {
                    if ($value == null) {
                        if ($key == 'name') {
                            echo 'ユーザー名';
                        }
                        if ($key == 'password') {
                            echo 'パスワード';
                        }
                        if ($key == 'mail') {
                            echo 'Eメール';
                        }
                        if ($key == 'address') {
                            echo '住所';
                        }
                        
                        echo 'が未記入です<br>';
                    }
                }
                
            }
            ?>
            <form action="<?php echo MYDATE_UPDATE ?>" method="POST">
                <input type="hidden" name="mode" value='RESULT_UPDATE' >
                
                <input type="submit" name="no" value="入力画面に戻る">
            </form>
            <?php
        }
        echo return_top();
        ?>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

