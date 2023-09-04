<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

$ntid = $_GET['ntid'];
  
  $sql = "SELECT * FROM notice WHERE ntid='{$ntid}'";
  $result = $conn->query($sql);
  $sqlarr = $result -> fetch_assoc();
  $hit = $sqlarr['hit']  + 1; //조회수 증가시키기
  $sql2 ="UPDATE board set hit = '{$hit}' where idx='{$pno}'";
  $result2 = $conn->query($sql2);

?>


