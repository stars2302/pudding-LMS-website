<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$username = $_POST['username'];
$useremail = $_POST['useremail'];

$sql = "SELECT * FROM users WHERE username='{$username}' AND useremail ='{$useremail}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

if (!isset($rs)) {
  echo '<script>alert("가입 이력이 없습니다.");</script>';
} else {
  echo "<script>
        alert('고객님의 아이디는 " . $rs->userid . "입니다.');
        location.href='login.php';
        </script>
      ";
}
?>