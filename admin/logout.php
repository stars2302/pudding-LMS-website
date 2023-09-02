<?php
session_start();

if(isset($_SESSION['AUID'] )) {
  unset($_SESSION['AUID']); // 세션 변수 삭제   
  unset($_SESSION['AUNAME']); // 세션 변수 삭제   
}

header("Location:/pudding-LMS-website/admin/login.php");
die();

?>