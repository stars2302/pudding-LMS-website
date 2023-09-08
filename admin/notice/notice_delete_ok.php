<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$ntid = $_GET['ntid'];

$sql = "DELETE FROM notice WHERE ntid='{$ntid}'";

if ($mysqli->query($sql) === TRUE) {
  echo "<script>
  alert('삭제되었습니다.');
  location.href = '/pudding-LMS-website/admin/notice/notice_list.php';
  </script>";
} else {  
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
