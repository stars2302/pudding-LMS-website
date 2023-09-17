<?php
session_start();

$username = $_SESSION['UNAME'];
echo "<script>alert('{$username}님 로그아웃 되었습니다.');
window.location.href='/pudding-LMS-website/user/login.php';</script>";

//세션 해제 
if (isset($_SESSION['UID'])) {
  unset($_SESSION['UID']);
  unset($_SESSION['UNAME']);
}
die();
?>