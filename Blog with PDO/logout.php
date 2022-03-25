<?php

require('include/init.php');

$_SESSION = array();

if(ini_get("session.use_cookies")) {
  $param = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
  $param['path'], $param['domain'],
  $param['secure'], $param['httponly']
);
}

session_destroy();

Url::redirect('/new blog/');

 ?>
