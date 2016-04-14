<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=kagoyume_db;charset=utf8', 'suzuki', '124014');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:' . $e->getMessage());
    }
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $password, $mail, $address) {
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,password,mail,address,newDate)"
            . "VALUES(:name,:password,:mail,:address,:newDate)";

    //現在時をdatetime型で取得
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name', $name);
    $insert_query->bindValue(':password', $password);
    $insert_query->bindValue(':mail', $mail);
    $insert_query->bindValue(':address', $address);
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



function serch_user($name = null, $password = null){
    
    $serch_db = connect2MySQL();
    $serch_sql = "SELECT * FROM user_t WHERE name=:name AND password=:password";
    $serch_query = $serch_db->prepare($serch_sql);
    if (isset($name)) {
        $serch_query->bindValue(':name', $name);
    }
    if (isset($password)) {
        $serch_query->bindValue(':password', $password);
    } 
    try {
        $serch_query->execute();
    } catch (PDOException $e) {
  
        $serch_query = null;
         $e->getMessage();
       
         return null;
    }

    //該当するレコードを連想配列として返却
    return $serch_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */


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
    
}

//PDOを用いてアップデート処理を行う関数。
function update_profile($ID, $name = null, $password = null, $mail = null, $address = null) {

    $update_db = connect2MySQL();

    $update_sql = "UPDATE user_t SET name=:name, password=:password,mail=:mail,"
            . "address=:address,newDate=:newDate WHERE userID=:id";

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
    if (isset( $password)) {
        $update_query->bindValue(':password',  $password);
    }
    if (isset($mail)) {
        $update_query->bindValue(':mail', $mail);
    }
    if (isset($address)) {
        $update_query->bindValue(':address', $address);
    }
   
    if (isset($ID)) {
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
    $_SESSION['newdate'] =  $date;
         
}
function insert_buy_t($id, $total, $type){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO buy_t(userID,total,type,buyDate)"
			. "VALUES(:userID,:total,:type,:buyDate)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':userID',$id);
			$insert_query->bindValue(':total',$total);
			$insert_query->bindValue(':type',$type);
			$insert_query->bindValue(':buyDate',$date);
			//SQLを実行
			try{
				$insert_query->execute();
			} catch (PDOException $e) {
				//接続オブジェクトを初期化することでDB接続を切断
				$insert_db=null;
				return $e->getMessage();
			}
			$insert_db=null;
			return null;
}

function user_total($id){
   
    $search_db = connect2MySQL();
	$search_sql = "select total from user_t where userID=:userID";
	//クエリとして用意
	$seatch_query = $search_db->prepare($search_sql);
	$seatch_query->bindValue(':userID',$id);
	//SQLを実行
	try{
		$seatch_query->execute();
	} catch (PDOException $e) {
		$seatch_query=null;
		return $e->getMessage();
	}
	//全レコードを連想配列として返却
	return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}

function update_total($total,$userID){
	$update_db = connect2MySQL();
	$update_sql = "UPDATE user_t SET total=:total where userID=:userID";
	//クエリとして用意
	$update_query = $update_db->prepare($update_sql);
	$update_query->bindValue(':total',$total);
	$update_query->bindValue(':userID',$userID);	
	//SQLを実行
	try{
		$update_query->execute();
	} catch (PDOException $e) {
		$update_query=null;
		return $e->getMessage();
	}
}