<?php
require_once('config.php');
/**
 * ALL YOUR IMPORTANT API INFO
 * EDIT THE CODES BELOW
 */
$object = 'user';
//$object_id = 1;
$aspect = 'media';
$verify_token='picsy_token';
$callback_url = 'http://picsy.t-tu.com/insta_callback.php';
 
/**
 * SETTING UP THE CURL SETTINGS
 * DO NOT EDIT BELOW
 */
$attachment =  array(
'client_id' => INSTA_CLIENT_ID,
'client_secret' => INSTA_CLIENT_SECRET,
'object' => $object,
//'object_id' => $object_id,
'aspect' => $aspect,
'verify_token' => $verify_token,
'callback_url'=>$callback_url
);
 
// URL TO THE INSTAGRAM API FUNCTION
$url = "https://api.instagram.com/v1/subscriptions/";
 
$ch = curl_init();
 
// EXECUTE THE CURL...
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $attachment);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output 
$result = curl_exec($ch);
curl_close ($ch);
 
// PRINT THE RESULTS OF THE SUBSCRIPTION, IF ALL GOES WELL YOU'LL SEE A 200
print_r($result);
 
?>