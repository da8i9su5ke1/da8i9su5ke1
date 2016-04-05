<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'suzuki', '124014');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:' . $e->getMessage());
    }
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $birthday, $type, $tell, $comment) {
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name', $name);
    $insert_query->bindValue(':birthday', $birthday);
    $insert_query->bindValue(':tell', $tell);
    $insert_query->bindValue(':type', $type);
    $insert_query->bindValue(':comment', $comment);
    $insert_query->bindValue(':newDate', $date);

    //SQLを実行
    try {
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db = null;
        return $e->getMessage();
    }

    $insert_db = null;
    return null;
}

//基本的なID入力欄を作って適合した場合に処理を行えるようにしなければ
//誰のデータでも上書き、削除ができてしまう。
function serch_all_profiles() {
    //db接続を確立
    $search_db = connect2MySQL();

    $search_sql = "SELECT * FROM user_t";

    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);

    //SQLを実行
    try {
        $seatch_query->execute();
    } catch (PDOException $e) {
        $seatch_query = null;
        return $e->getMessage();
    }

    //全レコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */
function serch_profiles($name = null, $year = null, $type = null) {
    //db接続を確立
    $serch_db = connect2MySQL();

    $serch_sql = "SELECT * FROM user_t";
    $flag = false;

    if (isset($name)) {
        $serch_sql .= " WHERE name like :name";
        $flag = true;
    }
    if (isset($year) && $flag == false) {//$flag == falseに修正。＝だと代入になるので。
        $serch_sql .= " WHERE birthday like :year";
        $flag = true;
    } else if (isset($year)) {
        $serch_sql .= " AND birthday like :year";
    }
    if (isset($type) && $flag == false) {
        $serch_sql .= " WHERE type = :type";
    } else if (isset($type)) {
        $serch_sql .= " AND type = :type";
    }

    //クエリとして用意
    $serch_query = $serch_db->prepare($serch_sql);
    //引数に値がないときでも実行されるので、引数があるときだけ実行されるように
    //する。これで、名前、生年のみの検索が可能。
    if (isset($name)) {
        $serch_query->bindValue(':name', '%' . $name . '%');
    }
    if (isset($year)) {
        $serch_query->bindValue(':year', '%' . $year . '%');
    }
    if (isset($type)) {
        $serch_query->bindValue(':type', $type);
    }
    //SQLを実行
    try {
        $serch_query->execute();
    } catch (PDOException $e) {
        $serch_query = null;
        return $e->getMessage();
    }

    //該当するレコードを連想配列として返却
    return $serch_query->fetchAll(PDO::FETCH_ASSOC);
}

function profile_detail($id) {
    //db接続を確立
    $detail_db = connect2MySQL();

    $detail_sql = "SELECT * FROM user_t WHERE userID=:id";

    //クエリとして用意
    $detail_query = $detail_db->prepare($detail_sql);

    $detail_query->bindValue(':id', $id);

    //SQLを実行
    try {
        $detail_query->execute();
    } catch (PDOException $e) {
        $detail_query = null;
        return $e->getMessage();
    }

    //レコードを連想配列として返却

    return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

function delete_profile($id) {
    //db接続を確立
    $delete_db = connect2MySQL();

    $delete_sql = "DELETE FROM user_t WHERE userID=:id";

    //クエリとして用意
    $delete_query = $delete_db->prepare($delete_sql);

    $delete_query->bindValue(':id', $id);

    //SQLを実行
    try {
        $delete_query->execute();
    } catch (PDOException $e) {
        $delete_query = null;
        return $e->getMessage();
    }
    return null;
}

//PDOを用いてアップデート処理を行う関数。
function update_profile($ID, $name = null, $birthday = null, $type = null, $tell = null, $comment = null) {

    $update_db = connect2MySQL();

    $update_sql = "UPDATE user_t SET name=:name, birthday=:birthday,type=:type,"
            . "tell=:tell,comment=:comment,newDate=:newDate WHERE userID=:id";

    //更新時刻をnewDateへ代入する処理。
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $update_query = $update_db->prepare($update_sql);
    //引数に値がないときでも実行されるので、引数があるときだけ実行されるように
    //する。これで、名前、生年のみの検索が可能。
    if (isset($name)) {
        $update_query->bindValue(':name', $name);
    }
    if (isset($birthday)) {
        $update_query->bindValue(':birthday', $birthday);
    }
    if (isset($type)) {
        $update_query->bindValue(':type', $type);
    }
    if (isset($tell)) {
        $update_query->bindValue(':tell', $tell);
    }
    if (isset($comment)) {
        $update_query->bindValue(':comment', $comment);
    }
    if (isset($comment)) {
        $update_query->bindValue(':id', $ID);
    }

    $update_query->bindValue(':newDate', $date);

    //SQLを実行
    try {
        $update_query->execute();
    } catch (PDOException $e) {
        $update_query = null;
        return $e->getMessage();
    }
}
