<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
session_start(); //세션을 시작한다.

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}


// POST 데이터로 전달된 ntid 값 받기
if (isset($_POST['ntid'])) {
  $ntid = $_POST['ntid'];

  //게시물 삭제 쿼리  
  $sql = "DELETE FROM notice WHERE ntid = ?";
  $stmt = $mysqli->prepare($sql); //취약점을 보완하기 위해 stmt 세팅
  $stmt->bind_param("s", $ntid); // 위 sql문장의 ?처리된 부분을 패러미터로 바인드시킨다

  if ($stmt->execute()) {
    //게시물 삭제 성공
    // //삭제된 게시물 이후의 번호를 재조정
    // $update_sql = "SET @rownum:=0";
    // $mysqli->query($update_sql); //변수 초기화
    // $update_sql = "UPDATE notice SET ntid = (@rownum=@rownum+1) ORDER BY ntid";
    // $viewed_query = isset($_SESSION['viewd_notices']) ? $_SESSION['viewd_notices'] : [];
    // $mysqli->query($update_sql);

    //삭제 후 리스트 페이지로 이동
    header("Location: notice_list.php");
    exit;
  } else {
    echo "게시물 삭제 실패 : " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "ntid가 전달되지않았습니다.";
}


$mysqli->close();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
