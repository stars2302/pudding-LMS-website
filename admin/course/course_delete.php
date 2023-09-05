<?php
  session_start(); 

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $cid = $_GET['cid'];
  $sql = "DELETE FROM courses WHERE cid='{$cid}'";

  if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('삭제가 완료되었습니다.');
    location.href='course_list.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  ?>