<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
require_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


$nt_title = $_POST["nt_title"];
$nt_content = $_POST["nt_content"];
$nt_filename = $_POST["nt_filename"];
$nt_regdate = date('Y-m-d');

$sql = "INSERT INTO notice (nt_title, nt_filename, nt_content, nt_regdate) VALUES 
('{$nt_title}','{$nt_filename}','{$nt_content}','{$nt_regdate}')";

if($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('글쓰기가 완료되었습니다.');
    location.href='notice_list.php';
    </script>";
} else {
    echo "Error: ". $sql . "<br>" .$mysqli->error;
}

$mysqli->close();

?>

