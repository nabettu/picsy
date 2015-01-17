
<?php
require_once('config.php');
//session_start();

  // POSTを取得
  $func = $_POST['func'] ;
  $id = $_POST['id'] ;

//$data = 0;
  // ファイルデータを読み込む  これいるのか？
 // $data = $func
  // 出力
//  echo "FUNC=".$func;

  // MySQLへ接続する
  $link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");

  // データベースを選択する
  $sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");

//DNの値を変える　Picsy_idが一致のデータの

  $sql = "update `picsy` SET `func`= ".$func." where `id` = ".$id."";
  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
//echo $result;

//Queryが成功だったらif、今のDBの値をもってくる
/*
  // 取得クエリを送信する
	$sql = "select * from `LAA0287235-zuqsqh`.`picsy` where `id` = ".$id." limit 1";
	$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
	while ($row = mysql_fetch_assoc($result)) {
//結果をSessionにつっこむ
		$_SESSION['func'] = $row['func'];
		echo $row['func'];
	}
*/
	//echo $result;
	
  //結果保持用メモリを開放する
  //mysql_free_result($result);

  // MySQLへの接続を閉じる
  mysql_close($link) or die("MySQL切断に失敗しました。");

?>
