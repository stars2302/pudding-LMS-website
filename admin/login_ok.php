<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $userid = $_POST['userid'];
  $userpw = $_POST['password'];
  $password = hash('sha512',$userpw); //sha512 알고리즘이용 암호화

  $query = "select * from admin where userid='{$userid}' and password='{$password}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){
    $sql = "select * from admin where idx = {$rs->idx}";
    $result = $mysqli->query($sql);
    $_SESSION['AUID'] = $rs->userid;
    $_SESSION['AUNAME'] = $rs->username;


    echo "<script>
      alert('관리자님 반갑습니다');
       location.href = '/pudding-LMS-website/admin/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디, 비번을 다시 확인하세요');
      history.back();
    </script>";
  }

  

?>