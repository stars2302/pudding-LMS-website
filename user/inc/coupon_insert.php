<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
  $userid = $_POST['uid'];
  $cpid = $_POST['cpid'];
  

  //지급 할 쿠폰을 유저가 가지고 있는지 조회
  $sqluc = "SELECT * FROM user_coupon where cpid=$cpid";
  $result3 = $mysqli -> query($sqluc);
  while($rs = $result3->fetch_object()){
    $rscuc[]=$rs;
  }

  //지급 할 쿠폰의 사용기한 조회, insert내용 변수에 담기
  $sql = "SELECT * FROM coupons WHERE cpid= $cpid";
  $result = $mysqli-> query($sql);
  $cp = $result->fetch_object();
  
  date_default_timezone_set("Asia/Seoul");
  $regdate = date("Y-m-d H:i:s");
  $use_max_date = date("Y-m-d H:i:s", strtotime($regdate . " +{$cp->cp_date} months"));


  //유저가 해당 쿠폰을 가지고있지 않으면
  if(!isset($rscuc)){

    //user_coupon 테이블에 insert
    $sql2 = "INSERT into user_coupon 
    (cpid, userid, use_max_date, regdate) values 
    ({$cpid},'{$userid}','{$use_max_date}','{$regdate}')";
    $result2 = $mysqli -> query($sql2);
    $return_data = array("result"=>"ok"); //return_data result에 ok
    echo json_encode($return_data);
    exit;

  //유저가 해당 쿠폰을 이미 소지하고 있으면
  } else{
    $return_data = array("result"=>"fail");//return_data result에 fail
    echo json_encode($return_data);
    exit;
  }
?>