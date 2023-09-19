<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $userid = $_POST['auserid'];
  $userpw = $_POST['apassword'];
  $password = hash('sha512',$userpw); //sha512 알고리즘이용 암호화

  $query = "select * from admin where auserid='{$userid}' and apassword='{$password}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){
    $_SESSION['AUID'] = $rs->auserid;
    $_SESSION['AUNAME'] = $rs->ausername;


    echo "<script>
      // alert('관리자님 반갑습니다');
      alert('$rs->ausername 님 반갑습니다');
       location.href = '/pudding-LMS-website/admin/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디, 비번을 다시 확인하세요');
      history.back();
    </script>";
  }

  

?>