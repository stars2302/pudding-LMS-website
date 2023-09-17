<?php
session_start(); 
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

if(isset($_SESSION['UID'])) {
    $userid = $_SESSION['UID'];

// $userid = $_SESSION['UID'];

$query = "select * from users where userid='{$userid}'"; 
$result = $mysqli->query($query);
$rs = $result->fetch_object();

// var_dump($rs);

if($rs){
    $_SESSION['UID'] = $rs->userid;
    $_SESSION['UNAME'] = $rs->username;

    echo "<script>
      alert('$rs->username 님 반갑습니다');
      location.href = '/pudding-LMS-website/user/index.php';
    </script>";
} else{
    echo "<script>
      alert('아이디, 비번을 다시 확인하세요');
      history.back();
    </script>";
}
}
?>






