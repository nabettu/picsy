<?php 
require_once('config.php');
require_once('/home/users/1/thick.jp-tatsuaki/web/app/picsy/twitteroauth/twitteroauth.php');
require_once('/home/users/1/thick.jp-tatsuaki/web/app/picsy/tmhOAuth.php');
session_start();

//echo "<br>";
// request token取得
$tw = new TwitterOAuth(TW_CONSUMER_KEY, TW_CONSUMER_SECRET);
 
$token = $tw->getRequestToken(TW_CALLBACK_URL);
if(! isset($token['oauth_token'])){
    echo "error: getRequestToken\n";
    exit;
}
	
//	var_dump($token);

//混在対策(20140406)
unset($_SESSION['me']);

// callback.php で使うので session に突っ込む
$_SESSION['oauth_token']        = $token['oauth_token'];
$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];

//ログインするときexpireにtimeをいれてく
$_SESSION['expires'] = time();
 
// 認証用URL取得してredirect
$authURL = $tw->getAuthorizeURL($_SESSION['oauth_token']);
header("Location: " . $authURL);
//*/
?>