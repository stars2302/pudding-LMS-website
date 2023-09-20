<?php
session_start();

if (isset($_SESSION['UID'])) {
  unset($_SESSION['UID']);
  unset($_SESSION['UNAME']);
}

header("Location:/pudding-LMS-website/user/login.php");
die();

?>