<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  // $name = $_POST['name'];
  $content = $_POST['content'];

  $sql = "INSERT INTO up (content) VALUES ('{$content}')";
  $result = $mysqli->query($sql);

  if ($result === TRUE) {
    echo "<script>
    alert('저장되었습니다..');
    //location.href='course_create.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $mysqli->close();
?>