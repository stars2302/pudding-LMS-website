<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

  $ntid = $_GET['ntid'];
  $nt_title = $_POST["nt_title"];
  $nt_content = $_POST["nt_content"];
  $nt_filename = $_FILES["nt_filename"]["name"] ?? '';
  $nt_regdate = date('Y-m-d');

  //update 테이블명 set 컬럼명1='수정된 값', 컬럼명2='수정된 값' where 조건;

  $sql ="UPDATE notice SET nt_title='{$nt_title}', 
  nt_content='{$nt_content}', 
  nt_filename='{$nt_filename}', 
  nt_regdate='{$nt_regdate}' 
  WHERE ntid='{$ntid}'";

  if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('글수정 완료되었습니다.');
    location.replace('notice_list.php?ntid=<?=$ntid?>');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>

