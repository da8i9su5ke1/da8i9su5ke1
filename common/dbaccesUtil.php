<?php  require_once '../app/insert_result.php';

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う

//課題7：setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//　     によりSQL接続時だけでなくSQL実行時のエラーもExceptionで取得してくれる。
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','suzuki','124014');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}


//課題8:データベースアクセス系の処理をまとめたユーザー定義関数
function db_access($name, $birthday, $tell, $type, $comment){

    //課題6で使用する現在時刻をdateで取得ご変数へ代入
    $time = date('Y-m-d G:i:s'); 
    
    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //クエリとして用意
    $insert_query = connect2MySQL()->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',"$birthday");
    $insert_query->bindValue(':tell',"$tell");
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    //課題6:上記のdateで得た現在時刻を用意したクエリに値を代入
    $insert_query->bindValue(':newDate',$time);
    
    //SQLを実行
    
    //課題7：SQLに正しくデータが格納できたかチェックしている。
    //       クエリとして用意した変数$insert_queryの中身で
    //       関数connect2MySQL()を通過し、その中の
    //       setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //　　　　によりSQL実行時のエラーもExceptionで取得してくれる。
    try {
        $insert_query->execute();
    } catch (Exception $exc) {
         die('データの挿入に失敗しました:[SQLのエラー文]:'.$exc->getMessage());
      }

    //接続オブジェクトを初期化することでDB接続を切断
    $insert_db=null;
}