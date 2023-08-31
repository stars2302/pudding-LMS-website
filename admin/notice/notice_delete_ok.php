<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php');

$ntid = $_POST['ntid'];
$sql = "DELETE FROM notice WHERE ntid = ?";
$stmt = $mysqli->prepare($sql); //취약점을 보완하기 위해 stmt 세팅
$stmt->bind_param("s", $ntid); // 위 sql문장의 ?처리된 부분을 패러미터로 바인드시킨다



if ($stmt->execute()) {
  echo "<script>
  alert('글 삭제 완료되었습니다.');
  location.href='notice_list.php';
  </script>";
} else {
  echo "Error: " . $sql . "<br>" . $stmt->error;
}

$stmt->close();
$mysqli->close();
