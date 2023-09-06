<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
/* 페이지 타이틀 및 CSS/JS 경로 설정 & 데이터 베이스 연결*/

/* GET파라미터로 게시물 고유식별자 'ntid'가져오기 */ 
$ntid = $_GET['ntid'];
/* SQL DELETE 쿼리를 사용하여 notice 테이블에서 ntid와 일치하는 데이터를 삭제 */ 
$sql = "DELETE FROM notice WHERE ntid='{$ntid}'";
/* 쿼리 실행 및 결과 처리 (confirm함수로 예/아니오)*/
if ($mysqli->query($sql) === TRUE) {
  echo "<script>
  alert('삭제되었습니다.');
  location.href = '/pudding-LMS-website/admin/notice/notice_list.php';
  </script>";
} else {  
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
