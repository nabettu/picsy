<?php 
require_once('config.php');
require_once('/home/users/1/thick.jp-tatsuaki/web/app/picsy/twitteroauth/twitteroauth.php');
session_start();
 
// getToken.php でセットした oauth_token と一致するかチェック
if ($_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
    unset($_SESSION);
    echo '<a href="getToken.php">token is not match</a>';
    exit;
}
 
// access token 取得
$tw = new TwitterOAuth(TW_CONSUMER_KEY,TW_CONSUMER_SECRET,
    $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $tw->getAccessToken($_REQUEST['oauth_verifier']);
 
// Twitter の user_id + screen_name(表示名)
$tw_user_id     = $access_token['user_id'];
$screen_name = $access_token['screen_name'];
$oauth_token     = $access_token['oauth_token'];
$oauth_token_secret = $access_token['oauth_token_secret']; 
 
/*
var_dump($user_id);echo "<br>";
var_dump($screen_name);echo "<br>";
var_dump($oauth_token);echo "<br>";
var_dump($oauth_token_secret);echo "<br>";
	echo "<br>";	echo "<br>";
/*///
	  // MySQLへ接続する
  $link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");
  
  
	//echo "<br>";
	$sql = "select * from `LAA0287235-zuqsqh`.`picsy` where `tw_user_id` = ".$tw_user_id." limit 1";
    //var_dump($sql);
	$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);
    //var_dump($result);
	
	
	while ($row = mysql_fetch_assoc($result)) {
		$db_tw_user_id = $row['tw_user_id'];
		$insta_user_name = $row['insta_user_name'];
		$picsy_id = $row['id'];
		$func = $row['func'];
	}//*/
	
	//echo "<br>";
	//var_dump($user);
 	//echo "<br>";
// 初回ユーザかチェックするロジック
  if ($db_tw_user_id==NULL) {

        $sql = "insert into `LAA0287235-zuqsqh`.`picsy`
                (`tw_user_id`,`tw_screen_name`, `tw_access_token`, `tw_access_token_secret`, `created`, `last_run`) 
                values 
                ('".$tw_user_id."','".$screen_name."','".$oauth_token."','".$oauth_token_secret."',now(), now())";
		//var_dump($sql);
		$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);
		
		//var_dump($user);
		//echo "<br>";
    } else {
	//すでにTwitterはDBに登録済である場合の処理
	//echo "already entried your twitter account";
	//echo "<br>";
	
	//登録がTwitterだけかどうか確認する
	//Instaが登録されていなければ登録処理を続ける
		if ($insta_user_name!=NULL) {
		//Instaが登録されているので設定画面へ飛ぶ
		//echo "instagram user entried!";
        $_SESSION['me'] = $insta_user_name;
        $_SESSION['id'] = $picsy_id;
        $_SESSION['func'] = $func;

		header('Location: '.SETTING_URL);
		exit;
		}
	
	}
 
	$sql = "select * from `LAA0287235-zuqsqh`.`picsy` where `tw_user_id` = ".$tw_user_id." limit 1";
	$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);
	while ($row = mysql_fetch_assoc($result)) {
		$user_name = $row['tw_screen_name'];
		$picsy_id = $row['id'];
	}
/*
echo "<br>";
echo "You took login!!! Twitter ID = ";
echo $tw_user_id;
echo "<br>";echo "<br>";
//*/
/*
echo $_SESSION['expires'] ;
echo "<br>";
echo time();
//*///
	// ログイン処理
    if (!empty($user_name)) {
        // セッションハイジャック対策
		if ($_SESSION['expires'] < time() -8 ) {
			session_regenerate_id(true);
			$_SESSION['expires'] = time();
		}
		unset($_SESSION['me']);
        $_SESSION['id'] = $picsy_id;

	} else {
		header('Location: '.TW_GET_TOKEN);
	}
	
      // MySQLへの接続を閉じる
	mysql_close($link) or die("MySQL切断に失敗しました。");
    // ホームに飛ばす
    header('Location: '.INSTA_REDIRECT_URL);
	//*/

?>