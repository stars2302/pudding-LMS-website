<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

  $row = $_GET['id'];
  $sql = "DELETE FROM qna_comments WHERE id='{$row}'";

  if ($conn->query($sql) === TRUE) {
      echo "<script>
      alert('글삭제 완료되었습니다.');
      location.href='../index.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>












