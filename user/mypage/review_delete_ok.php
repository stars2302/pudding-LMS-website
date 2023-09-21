<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $rid = $_POST['rid'];
 
  $sql = "DELETE from review where rid={$rid}";
  $rsql = "DELETE FROM review_reply where rid={$rid}";

  $result = $mysqli -> query($sql);
  $rresult = $mysqli -> query($rsql);

  
  if($result && $rresult){
    $data = array('result' => 'ok');
    $data = array('rresult' => 'ok');
  } else{
    $data = array('result' => 'fail');
    $data = array('rresult' => 'fail');
  }

  echo json_encode($data);


?>