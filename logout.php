<?php

require_once('config.php');

session_start();

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/http://picsy.t-tu.com/');
}

session_destroy();

header('Location: '.SITE_URL);

?>