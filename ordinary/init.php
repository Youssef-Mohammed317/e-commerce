<?php
// routes
$js = './layout/js';
$css = './layout/css';
//
ob_start();
session_start();
include('../admin/include/functions/functions.php');

include('./include/templates/main/header.php');

global $user;
if(isset($_COOKIE['rememberMe'])){
  $_SESSION['userid'] = $_COOKIE['rememberMe'];
}
if(isset($_SESSION['userid'])){
  $user  = select('*' ,'users','where id = ' . $_SESSION['userid'],'','LIMIT 1');
  if($user['rank'] == 'admin'){
    $_SESSION['user_id'] = $user['id'];
    go('../admin/index');
    unset($_SESSION['userid']);
  } else{
    include('./include/templates/main/mainNav.php');
  }
} else {
  include('./include/templates/main/mainNav.php');
}
// // check uri
// $uri = $_SERVER['REQUEST_URI'];
// $uri = explode('/', $uri);
// $uri = end($uri);
// echo $uri;
// $valid_uris = [
//   'index',
//   'login',
//   'register',
//   'cart',
//   'checkout',
// ];