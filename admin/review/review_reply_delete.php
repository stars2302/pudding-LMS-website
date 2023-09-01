<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';



  $rid = $_POST['rid'];
 

  $sql = "DELETE from review_reply where rid={$rid}";

  $result = $mysqli -> query($sql);
  if($result){
    $data = array('result' => 'ok');
  } else{
    $data = array('result' => 'fail');
  }

  echo json_encode($data);

?>