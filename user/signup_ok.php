<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
// include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/inc/coupon_function.php';


// uid	
// userid
// useremail
// username
// userpasswd
// regdate
// userimg 

$userid = $_POST['userid'];
$userpw = $_POST['userpasswd'];
$userpw = hash('sha512', $userpw);
$username = $_POST['username'];
$useremail = $_POST['useremail'];

$sql = "INSERT INTO users
  (userid,useremail,username,userpasswd)
  VALUES('{$userid}','{$useremail}','{$username}','{$userpw}')";
$result = $mysqli -> query($sql) or die($mysql->error);

//회원가입 성공 시. 쿠폰 발행 
if($result){
  // user_coupon($mysqli, $userid, 1,'회원가입');
  echo "<script>
  alert('회원가입 성공');
  location.href='login.php';
  </script>";
}else{
  echo "<script>
  alert('회원가입 실패');
  history.back();
  </script>";
}

?>