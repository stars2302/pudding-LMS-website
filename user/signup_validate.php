<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$userid = $_POST['userid'];
var_dump($userid);
// $useremail = $_POST['useremail'];

$sql = "SELECT count(*) AS cnt FROM users WHERE userid='{$userid}'";
$result = $mysqli->query($sql);



if ($result) {
  $rc = $result->fetch_object();
  $data = array('cnt' => $rc->cnt);
  echo json_encode($data);
} else {
  echo json_encode(array('cnt' => 0)); // 에러 처리를 위한 기본값 반환
}



// $rc = $result->fetch_object();
// $data = array('cnt' => $rc->cnt);
// echo json_encode($data);
// var_dump($data);
?>