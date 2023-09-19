<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
// include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/inc/coupon_function.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$userpw = $_POST['userpasswd'];
$userpw = hash('sha512', $userpw);
$useremail = $_POST['useremail'];

$sql = "INSERT INTO 
  (username,userid,userpw,useremail)
  VALUES('{$username}','{$userid}','{$userpw}','{$useremail}')";
$result = $mysqli -> query($sql) or die($mysql->error);


//회원가입 성공 시. 쿠폰 발행 
// if($result){
//   user_coupon($mysqli, $userid, 1,'회원가입');
// }else{
//   echo "<script>
//   alert('회원가입 실패');
//   history.back();
//   </script>";
// }

?>