<?php

//購読希望
if (isset($_GET['hub_challenge'])){
	$challenge = $_GET['hub_challenge'];
	echo $challenge;
} else {
//echo "dont read it.<br>";
require_once('config.php');
require_once('tmhOAuth.php');


    $log_fl = "./acc_log.csv";
// 日時
    $log_ln[0] = date ( "Y-m-d H:i:s" );
// ページのURL
    $log_ln[1] = str_replace ( ",", "，", $_SERVER["REQUEST_URI"] );
// リファラー
    $log_ln[2] = str_replace ( ",", "，", $_SERVER["HTTP_REFERER"] );
// IPアドレス
    $log_ln[3] = str_replace ( ",", "，", $_SERVER["REMOTE_ADDR"] );
// ホスト名
    $log_ln[4] = str_replace ( ",", "，", @gethostbyaddr ( $_SERVER["REMOTE_ADDR"] ) );
// ブラウザ
    $log_ln[5] = str_replace ( ",", "，", $_SERVER["HTTP_USER_AGENT"] );

    if ( $csv = @fopen ( $log_fl, "a" ) )
    {
        $ln = implode ( ",", $log_ln )."\n";
        fwrite ( $csv, $ln );
        fclose ( $csv );
    }


  // MySQLへ接続する
  $link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");


$fp = fopen("insta.txt","w");
fwrite($fp,"StartTime:".date("Y-m-d H:i:s"));
fclose($fp);///*

//echo "<br>";
$handle    = fopen('php://input','r');
$json_string = fgets($handle);
//$json_string = file_get_contents('php://input');
//echo $json_string;
$obj = json_decode($json_string);

//$d=$obj->data->code;
//var_dump($obj);
   $temp=$obj[0]->data;
   $user_id=$obj[0]->object_id; //insta_User_ID
//$d=$obj->0->data->media_id;
	$d=$temp->media_id; //メディアID!

   ob_start();
   var_dump($obj);
   $ret = ob_get_contents();
   ob_end_clean();
   
   $fp = fopen("insta.txt","a");
	fwrite($fp,"obj= ".$ret);
    fwrite($fp,"$obj count:".count($obj));
	fclose($fp);///*
 

//User_IDと一致する情報をDBから持って来る

	//IDが一致するDB
	$sql = "select * from `picsy` WHERE `insta_id` = ".$user_id;
//	$result = mysql_query($sql, $link) or die("cannot send query<br> SQL:".$sql);
	$result = mysql_query($sql, $link) or die("cannot send query<br />");
	
	while ($row = mysql_fetch_assoc($result)) {
		$picsy_id = $row['id'];
		$tw_access_token = $row['tw_access_token'];
		$tw_access_token_secret = $row['tw_access_token_secret'];
		$insta_access_token = $row['insta_access_token'];
		$func = $row['func'];
		
		//機能が増えたらここを追加
	}

//機能をOFFにしてたらこの時点で終了！
if ($func == 1) {exit;};

 /*    ob_start();
   var_dump($tw_access_token);
   var_dump($tw_access_token_secret);
   var_dump($insta_access_token);
   var_dump($func);
   $ret = ob_get_contents();
   ob_end_clean();
   
   $fp = fopen("insta.txt","a");
	fwrite($fp,"DB data = ".$ret);
	fclose($fp);
	//*/
	

$query = array('access_token' => $insta_access_token);
$url = 'https://api.instagram.com/v1/media/'.$d.'?'.http_build_query($query);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    //Data are stored in $data
    $result = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
	
	//画像の取得
	$img = file_get_contents($data[data][images][standard_resolution][url]);
	$tw_img ='./media/'.$user_id.'.jpg';
	file_put_contents($tw_img,$img);
	
	//insta　のリンクの取得
	$insta_link = $data[data][link];

	//コメントの取得
	$comme =$data[data]["caption"]["text"];
//	$comme = $temp->caption->text;
	
	//#picsyタグの取得 　　　今後追加予定
	
	/*
   ob_start();
   echo "Link= ";
   var_dump($insta_link);
   echo "comment= ";
   var_dump($comme);
   echo "insta query= ";
   var_dump($data);
   $ret = ob_get_contents();
   ob_end_clean();//
   
//$d= $_GET['test'];
$fp = fopen("insta.txt","a");
fwrite($fp,$ret);
fclose($fp);
//*/


//InstaのURLがlogの最新だったらexitする

	//DBの一番新しいログ取得
	$sql = "select * from `picsy_log` ORDER BY `tweet_time` DESC limit 1";
	$result = mysql_query($sql, $link) or die("cannot send query<br />");
	while ($row = mysql_fetch_assoc($result)) {
		$log_url = $row['insta_url'];
	}
	if ($log_url == $insta_link) {exit;};



$tw = new tmhOAuth( 
	array(
		'consumer_key'    => TW_CONSUMER_KEY,
		'consumer_secret' => TW_CONSUMER_SECRET,
		'token'      => $tw_access_token,
		'secret'     => $tw_access_token_secret,
		'curl_ssl_verifypeer' => false ,
	) 
);				

/*
   ob_start();
   var_dump($tw);
   $ret = ob_get_contents();
   ob_end_clean();//
   
//$d= $_GET['test'];
$fp = fopen("insta.txt","a");
fwrite($fp,"tmhOAuth= ".$ret);
fclose($fp);//*/

//var_dump($tw);

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
   ob_end_clean();//*/


//２回投稿対策
require_once('twitteroauth/twitteroauth.php');

$TwitterOAuth = new TwitterOAuth(
	TW_CONSUMER_KEY,
	TW_CONSUMER_SECRET,
	$tw_access_token,
	$tw_access_token_secret
	);

// 1.1向け。2013/06/12以降の版であれば不要
$TwitterOAuth->host = 'https://api.twitter.com/1.1/';

//最新ツイートを２件持ってくる
$content = $TwitterOAuth->get('statuses/user_timeline',array('count'=>'2'));

$latestTweetUrl = $content[0]->entities->urls[0]->expanded_url;//最新
$latest2TweetUrl = $content[1]->entities->urls[0]->expanded_url;

//PHPの桁数の限界を超えているのでdoubleで受け取って小数点以下を消す
$castedId= sprintf("%.0f", $content[0]->id);

//２件が同じinstaのURLじゃないなら終了
if($latestTweetUrl!=$latest2TweetUrl)exit;

$status = $TwitterOAuth->post('statuses/destroy/'.$castedId);

var_dump($status);

//２回投稿対策ここまで

$now = date('Y-m-d H:i:s');
$fp = fopen("insta.txt", "a");
fwrite($fp, " 書き込みが行われました ".$now);
fclose($fp);


	$sql = "insert into `picsy_log`
                (`picsy_id`,`tweet_time`, `insta_url`) 
                values 
                ('".$picsy_id."',now(),'".$insta_link."')";
	$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);
	
	mysql_close($link) or die("MySQL切断に失敗しました。");

}

