<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';


  $cartid = $_POST['cartid'];
  
  foreach($cartid as $ctid){
    $sql = "DELETE from cart where cartid=$ctid";
    $result = $mysqli->query($sql);





  }
  $return_data = array("result"=>$result); 
  echo json_encode($return_data);
  exit;
?>