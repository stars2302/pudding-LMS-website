<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$userid = $_POST['userid'];
// $useremail = $_POST['useremail'];

//$sql = "SELECT count(*) AS cnt FROM users WHERE userid='{$userid}' OR useremail = '{$useremail}'";
$sql = "SELECT count(*) AS cnt FROM users WHERE userid='{$userid}'";
$result = $mysqli->query($sql);
$rc = $result->fetch_object();
$data = array('cnt' => $rc->cnt);
echo json_encode($data);

?>