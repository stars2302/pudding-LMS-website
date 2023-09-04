<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
$cp_status = $_POST['cp_status'];
$cpid = $_POST['cpid'];

$sql = "UPDATE coupons set cp_status={$cp_status} where cpid={$cpid}";
$result = $mysqli->query($sql);

if(isset($result)){
  $return_data = array("result"=>"1");
  echo json_encode($return_data);
  exit;
} else{
  $return_data = array("result"=>"0");
  echo json_encode($return_data);
  exit;
}
?>