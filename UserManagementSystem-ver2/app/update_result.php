<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>更新結果画面</title>
    </head>
    <body>
        <?php
        $mode = error('mode');
        if (!$mode == "RESULT") {
            echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
        } else {
            //年、月、日をDBのbirthdayに格納しやすい形に変換する処理。
            $birthday = $_POST['year'] . '-' . sprintf('%02d', $_POST['month']) . '-' . sprintf('%02d', $_POST['day']);
            $id = $_POST['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $tell = $_POST['tell'];
            $comment = $_POST['comment'];

            session_start();

            //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
            $update_values = array(
                'name' => bind_p2s('name'),
                'year' => bind_p2s('year'),
                'month' => bind_p2s('month'),
                'day' => bind_p2s('day'),
                'type' => bind_p2s('type'),
                'tell' => bind_p2s('tell'),
                'comment' => bind_p2s('comment'));
            $birthday = $_SESSION['year'] . $_SESSION['month'] . $_SESSION['day'];

            //1つでも未入力項目があったら表示しない
            if (!in_array(null, $update_values, true)) {
                if (!checkdate($update_values['month'], $update_values['day'], $update_values['year'])) {
                    echo '<br>正しい日付を入力してください';
                } else {
                    $result = update_profile($id, $name, $birthday, $type, $tell, $comment);
                    if (isset($result)) {
                        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:' . $result;
                    }
                    ?>        
                    <h1>更新確認</h1><br>
                    名前:<?php echo $update_values['name']; ?><br>
                    生年月日:<?php echo $update_values['year'] . '年' . $update_values['month'] . '月' . $update_values['day'] . '日'; ?><br>
                    種別:<?php echo ex_typenum($update_values['type']); ?><br>
                    電話番号:<?php echo $update_values['tell']; ?><br>
                    自己紹介:<?php echo $update_values['comment']; ?><br><br>
                    以上の内容で更新しました。<br>

                    <?php
                }
            } else {
                ?>
                <h1>入力項目が不完全です</h1><br>
                再度入力を行ってください<br>
                <h3>不完全な項目</h3>
                <?php
                //連想配列内の未入力項目を検出して表示
                foreach ($update_values as $key => $value) {
                    if ($value == null) {
                        if ($key == 'name') {
                            echo '名前';
                        }
                        if ($key == 'year') {
                            echo '年';
                        }
                        if ($key == 'month') {
                            echo '月';
                        }
                        if ($key == 'day') {
                            echo '日';
                        }
                        if ($key == 'type') {
                            echo '種別';
                        }
                        if ($key == 'tell') {
                            echo '電話番号';
                        }
                        if ($key == 'comment') {
                            echo '自己紹介';
                        }
                        echo 'が未記入です<br>';
                    }
                }
                //checkdate関数で正しい日付かチェックしています。正しい日付でない場合はトップページか前画面に戻る選択肢を表示。
            if (!checkdate($update_values['month'], $update_values['day'], $update_values['year']) && !empty($birthday)) {

                echo '<br>正しい日付を入力してください';
            }
            }
            ?>
            <form action="<?php echo UPDATE ?>" method="POST">
                <input type="hidden" name="mode" value='RESULT_UPDATE' >
                <input type="hidden" name="id" value="<?php echo $id ?>" >
                <input type="submit" name="no" value="入力画面に戻る">
            </form>
    <?php
}
echo return_top();
?>
    </body>
</html>
