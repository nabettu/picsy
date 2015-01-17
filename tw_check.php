<?php

//echo "dont read it.<br>";
require_once('config.php');
require_once('tmhOAuth.php');

  // MySQLへ接続する
  $link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");

	//IDが一致するDB
	$sql = "select * from `picsy` WHERE `id` = 7";//.$user_id;

	$result = mysql_query($sql, $link) or die("cannot send query<br />");
	
	while ($row = mysql_fetch_assoc($result)) {
		$picsy_id = $row['id'];
		$tw_access_token = $row['tw_access_token'];
		$tw_access_token_secret = $row['tw_access_token_secret'];
		$func = $row['func'];
		$tw_user_id=$row['tw_user_id'];		
		//機能が増えたらここを追加
	}

   var_dump($tw_access_token);
   var_dump($tw_access_token_secret);
   var_dump($tw_user_id);

$tw = new tmhOAuth( 
	array(
		'consumer_key'    => TW_CONSUMER_KEY,
		'consumer_secret' => TW_CONSUMER_SECRET,
		'token'      => $tw_access_token,
		'secret'     => $tw_access_token_secret,
		'curl_ssl_verifypeer' => false ,
	) 
);				

$status = $twitter->request(
    "GET", // リクエストメソッド
    $twitter->url("1/statuses/tw_user_id"), // エンドポイントを指定
    array( "count" => 2 ) // パラメータ
);

var_dump($status);


/*
		$message = $comme." ".$insta_link." ";
		$params = array(
//			'media[]' => $tw_img,
			'media[]' => "@{$tw_img}",
			'status' => $message
		);
		$image = file_get_contents( $tw_img );
		$imagesize = getimagesize( $tw_img );
		
	   ob_start();
		echo "<br>";
		echo '<img src="'.$tw_img.'" />';
		echo "<br>";
		print "ツイート完了:" .htmlspecialchars($message);

$image = file_get_contents( $tw_img );
$imagesize = getimagesize( $tw_img );
		$req = $tw->request('POST', $tw->url('1.1/statuses/update_with_media'), 
			array(
			'status' => $message,
			'media[]' => $image . ";type=" . $imagesize['mime'] . ";filename=" . basename( $tw_img ),
			), true, true);

   $ret = ob_get_contents();
   ob_end_clean();//


$now = date('Y-m-d H:i:s');
$fp = fopen("insta.txt", "a");
fwrite($fp, " 書き込みが行われました ".$now);
fclose($fp);


	$sql = "insert into `LAA0287235-zuqsqh`.`picsy_log`
                (`picsy_id`,`tweet_time`, `insta_url`) 
                values 
                ('".$picsy_id."',now(),'".$insta_link."')";
	$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);
*/	
	mysql_close($link) or die("MySQL切断に失敗しました。");


