<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$useremail = $_POST['useremail'];

$sql = "SELECT * FROM users WHERE username='{$username}' AND useremail ='{$useremail}' AND userid ='{$userid}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

if (!isset($rs)) {
  echo '<script>alert("가입 이력이 없습니다.");</script>';
} else {
  echo "
  <script>
  alert('인증되었습니다. 지금 비밀번호를 변경하시겠습니까?');
   location.href='pw_update.php?uid=$rs->uid';
  </script>
";
}

?>