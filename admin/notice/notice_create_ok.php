<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
require_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

$nt_title = $_POST["nt_title"];
$nt_content = rawurldecode($_POST['nt_content']);
$nt_regdate = date('Y-m-d');


if (isset($_FILES['nt_filename']['name'])) {
  if ($_FILES['nt_filename']['name']) {
    //파일 사이즈 검사
    if ($_FILES['nt_filename']['size'] > 10240000) {
      echo "<script>
        alert('10MB이하만 첨부할 수 있습니다.');
        history.back();
      </script>";
      exit;
    }
  }

  $file_type = $_FILES['nt_filename']['type'];
  if (strpos($file_type, 'image') != '') {
    $is_img = 1;
  } else {
    $is_img = 0;
  }
}

//파일업로드 
$save_dir = $_SERVER['DOCUMENT_ROOT'] . "/pudding-LMS-website/admin/images/notice/";

$org_name = $_FILES['nt_filename']['name']; //파일명 할당
$ext = pathinfo($org_name, PATHINFO_EXTENSION); //jpg
$upload_path = "/pudding-LMS-website/admin/images/notice/" . $org_name; //파일 경로
$newfilename = date("YmdHis") . substr(rand(), 0, 6);
$thumbnail = $newfilename . "." . $ext;

if (move_uploaded_file($_FILES['nt_filename']['tmp_name'], $save_dir . $thumbnail)) {
  $upload_option_image = "/pudding-LMS-website/admin/images/notice/" . $thumbnail;
} else {
  echo "<script>
        alert('이미지등록 실패!');    
        // history.back();            
      </script>";
}








$sql = "INSERT INTO notice (nt_title, nt_filename, nt_content, nt_regdate) VALUES 
('{$nt_title}' , '{$upload_option_image}','{$nt_content}', '{$nt_regdate}')";


$result = $mysqli->query($sql);
$pid = $mysqli->insert_id;



if ($mysqli->query($sql) === TRUE) {
  echo "<script>
  alert('글쓰기 완료되었습니다.');
  location.href='notice_list.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
