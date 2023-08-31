<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

$ntid = $_POST['ntid'];
$sql = "DELETE FROM notice WHERE ntid = ?";
$stmt = $mysqli->prepare($sql); //취약점을 보완하기 위해 stmt 세팅
$stmt->bind_param("s", $ntid); // 위 sql문장의 ?처리된 부분을 패러미터로 바인드시킨다

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

// POST 데이터로 전달된 ntid 값 받기
if (isset($_POST['ntid'])) {
  $ntid = $_POST['ntid'];
  $delete_sql = "DELETE FROM notice WHERE ntid = '{$ntid}'";
  if($mysqli -> query($delete_sql)){
    alert("글 삭제 완료되었습니다.");
  } else {
    alert("글 삭제 실패:").$mysqli->error;
  }
} else {
  echo "ntid가 전달되지않았습니다.";
}
$mysqli->close();




include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>