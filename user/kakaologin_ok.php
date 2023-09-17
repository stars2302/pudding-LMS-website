<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];


  $query = "select * from users where userid='{$userid}' and username='{$username}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){
    $_SESSION['UID'] = $rs->userid;
    $_SESSION['UNAME'] = $rs->username;


    echo "<script>
      // alert('관리자님 반갑습니다');
      alert('$rs->username 님 반갑습니다');
    //location.href = '/pudding-LMS-website/user/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디, 비번을 다시 확인하세요');
      //history.back();
    </script>";
  }