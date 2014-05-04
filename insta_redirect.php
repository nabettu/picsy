<?php

require_once('config.php');
session_start();

if (empty($_GET['code'])) {
    // 認証前の準備
    $params = array(
        'client_id' => INSTA_CLIENT_ID,
        'redirect_uri' => INSTA_REDIRECT_URL,
        'scope' => 'basic',
		'response_type' => 'code'
    );
    $url = 'https://api.instagram.com/oauth/authorize/?'.http_build_query($params);
    
    // instagramへ飛ばす
    header('Location: '.$url);
    exit;
} else {
    // 認証後の処理
    // user情報の取得
	//echo "code=".$_GET['code']; echo "<br>";
    $params = array(
        'client_id' => INSTA_CLIENT_ID,
        'client_secret' => INSTA_CLIENT_SECRET,
        'code' => $_GET['code'],
        'redirect_uri' => INSTA_REDIRECT_URL,
        'grant_type' => 'authorization_code'
    );
    $url = "https://api.instagram.com/oauth/access_token";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $res = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($res);
    
	//var_dump($json); echo "<br>";
	$insta_id=$json->user->id;
	$insta_access_token=$json->access_token;;
	$insta_name=$json->user->username;
	
	/*
	echo "insta_id=".$insta_id; echo "<br>";
	echo "insta_access_token=".$insta_access_token; echo "<br>";
	echo "insta_full_name=".$insta_full_name; echo "<br>";
	if (!empty($_SESSION['id'])) {
		echo "id=". $_SESSION['id'];echo "<br>";
	}
	*/
    //exit;
	
	//DBへ登録作業
	// MySQLへ接続する
  $link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");
  
  $sql = "update `LAA0287235-zuqsqh`.`picsy`
		SET `insta_id`='".$insta_id."', `insta_access_token`='".$insta_access_token."' ,`insta_user_name`='".$insta_name."' ,`func`=0 
		WHERE `id` ='". $_SESSION['id'] ."'";
		
		//UPDATE `picsy`  set `insta_id`=3 WHERE `id`=3;
		//var_dump($sql);echo "<br>";
		$result = mysql_query($sql, $link) or die("cannot send query<br />SQL:".$sql);

//var_dump($result);echo "<br>";
        $_SESSION['me'] = $insta_name;
		header('Location: '.SETTING_URL);
		exit;

	
}
