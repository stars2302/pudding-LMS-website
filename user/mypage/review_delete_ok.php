<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $rid = $_POST['rid'];
 
  $rsql = "SELECT COUNT(*) AS cnt FROM review_reply where rid={$rid}";
  $rresult =$mysqli->query($rsql);
  $card = $rresult->fetch_object();

  

  if($card->cnt > 0){

    $data = array('result' => 'rfail');
    echo json_encode($data);
  }else{
    $sql = "DELETE from review where rid={$rid}";
    $result = $mysqli -> query($sql);
    if($result && $rresult){
        $data = array('result' => 'ok'); 
      } else{
        $data = array('result' => 'fail');
      }
    
      echo json_encode($data);
  }
 





  



?>