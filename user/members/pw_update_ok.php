<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$uid = $_GET['uid'];
$userpw = $_POST['userpasswd'];
$userpw = hash('sha512', $userpw);

$sql = "UPDATE users SET userpasswd = '{$userpw}' WHERE uid = '{$uid}'";
$result = $mysqli->query($sql);

if (!isset($result)) {
  echo '<script>alert("비밀번호 변경에 실패했습니다.");</script>';
} else {
  echo "<script>
        alert('비밀번호 변경 완료되었습니다.');
        location.href='login.php';
        </script>";
}
?>