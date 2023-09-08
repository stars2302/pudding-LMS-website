<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';



$nt_title = $_POST["nt_title"];
$nt_content = $_POST["nt_content"];

$nt_regdate = date('Y-m-d');

$sql = "INSERT INTO notice 
(nt_title, nt_filename, nt_read_cnt, nt_content, nt_regdate, filetype) VALUES 
('{$nt_title}','',0,'{$nt_content}','{$nt_regdate}','{$filetype}')";
$result = $mysqli->query($sql);
$pid = $mysqli->insert_id;
if($result === TRUE) {
    echo "<script>
    alert('글쓰기가 완료되었습니다.');
    location.href='notice_list.php'; 
    </script>";
} else {
    echo "Error: ". $sql . "<br>" .$mysqli->error;
}
$mysqli->close();
?>