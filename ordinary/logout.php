<?php
session_start();
if (isset($_SESSION['userid'])) {
  unset($_SESSION['userid']);
  setcookie('rememberMe', '', time() - 3600);
}
header('Location: ./dashboard.php');