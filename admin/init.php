<?php
// routes
$js = './layout/js';
$css = './layout/css';

//
ob_start();
session_start();
include('./include/functions/functions.php');

global $user;
if(isset($_COOKIE['rememberMeAdmin'])){
  $_SESSION['user_id'] = $_COOKIE['rememberMeAdmin'];
  $user = select('*','users',"where id = $_SESSION[user_id]",'','LIMIT 1');
}

if(!(str_contains($_SERVER['SCRIPT_NAME'],'login'))) {
  if(isset($_SESSION['user_id'])) {
    $user = select('*','users',"where id = $_SESSION[user_id]",'','LIMIT 1');
  } else {
    go('logout');
  }
  if($user['rank'] != 'admin'){
    go('logout');
  } 
}

include('./include/templates/main/header.php');
if(isset($mainNav)){
  include('./include/templates/main/mainNav.php');
}

