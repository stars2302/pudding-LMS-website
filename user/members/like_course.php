<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';


// if (isset($_SESSION['UID'])) {
//   $uid = $_SESSION['UID'];
//   $query = "SELECT * FROM users WHERE userid='{$uid}'";
//   $result = $mysqli->query($query);
//   $rs = $result->fetch_object();
// }
$uid = $_SESSION['UID'];
$cid = $_GET['cid'];

// $userid = $_POST['userid'];

// $sql = "SELECT userid FROM users WHERE uid ='{$uid}'";
// $result = $mysqli->query($sql);
// $rs = $result->fetch_object();


$sql = "INSERT INTO like_course (cid, userid) 
            VALUES ('{$cid}', '{$uid}')";
$result = $mysqli->query($sql);
// $rs = $result->fetch_object();


if ($result) {
  $retun_data = array("result" => 1);
  echo json_encode($retun_data);
} else {
  $retun_data = array("result" => 0);
  echo json_encode($retun_data);
}


if(isset($retun_data)) {
  echo '<script>alert("강의 좋아요");
  history.back();
  </script>';
  
} else {
  echo "
  <script>
  history.back();
  </script>
";
}

?>