<?php 
require_once('config.php');
require_once('/home/users/1/thick.jp-tatsuaki/web/app/picsy/twitteroauth/twitteroauth.php');
require_once('/home/users/1/thick.jp-tatsuaki/web/app/picsy/tmhOAuth.php');
session_start();

//echo "<br>";
// request token�擾
$tw = new TwitterOAuth(TW_CONSUMER_KEY, TW_CONSUMER_SECRET);
 
$token = $tw->getRequestToken(TW_CALLBACK_URL);
if(! isset($token['oauth_token'])){
    echo "error: getRequestToken\n";
    exit;
}
	
//	var_dump($token);

//���ݑ΍�(20140406)
unset($_SESSION['me']);

// callback.php �Ŏg���̂� session �ɓ˂�����
$_SESSION['oauth_token']        = $token['oauth_token'];
$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];

//���O�C������Ƃ�expire��time������Ă�
$_SESSION['expires'] = time();
 
// �F�ؗpURL�擾����redirect
$authURL = $tw->getAuthorizeURL($_SESSION['oauth_token']);
header("Location: " . $authURL);
//*/
?>