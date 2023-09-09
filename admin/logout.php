<?php
session_start();

if(isset($_SESSION['AUID'] )) {
  unset($_SESSION['AUID']); 
  unset($_SESSION['AUNAME']);  
}

header("Location:/pudding-LMS-website/admin/login.php");
die();

?>