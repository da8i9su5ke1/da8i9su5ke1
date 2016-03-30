<?php
  require_once '../common/defineUtil.php';

//課題1：トップページに戻るためのユーザー定義関数。
  function return_top(){
      return "<a href=".TOP_URI.">トップへ戻る</a>";
  }
  
  //課題5：直リンクした場合、htmlのmetaタグを使用し、3秒後にトップページへ
  //移動する処理を実行。
  function illegal_access(){
      echo "不正アクセスです。<br>3秒後にトップページに移動します。";
      echo '<meta http-equiv="refresh" content="3;url=/app/index.php">';
  }