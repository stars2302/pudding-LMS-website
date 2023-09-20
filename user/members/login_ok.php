<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

// uid	
// userid
// useremail
// username
// userpasswd
// regdate
// userimg 

$userid = $_POST['userid'];
$userpw = $_POST['userpasswd'];
$passwd = hash('sha512', $userpw); //암호를 sha512 알고리즘이용 암호화

$query = "SELECT * FROM users WHERE userid='{$userid}' AND userpasswd='{$passwd}'";
$result = $mysqli->query($query);
$rs = $result->fetch_object();

if ($rs) {
  $_SESSION['UID'] = $rs->userid;
  $_SESSION['UNAME'] = $rs->username;

  echo "<script>
      alert('$rs->username 님 반갑습니다');
      location.href = '/pudding-LMS-website/user/index.php';
    </script>";
} else {
  echo "<script>
      alert('계정정보를 다시 확인해주세요');
     history.back();
    </script>";
}
?>