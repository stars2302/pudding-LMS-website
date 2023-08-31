<?php
$title = "공지사항 수정";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
require_once($_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

$nt_title = $_POST["nt_title"];
$nt_filename = $_POST["nt_filename"];
$nt_content = $_POST["nt_content"];

$sql = "INSERT INTO notice (nt_title, nt_content, nt_filename) VALUES 
('{$nt_title}' ,'{$nt_content}', '{$nt_filename}')";

if ($mysqli->query($sql) === TRUE) {
  echo "<script>
  alert('글쓰기 완료되었습니다.');
  location.href='notice_list.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
