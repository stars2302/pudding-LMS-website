<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php');

// $userid = $_SESSION["userid"];
$userid = $_POST["userid"];

$cid = $_GET["cid"];
$rating = intval($_POST['rating']);

$content = $_POST["review_create"];
$date = date("Y-m-d");
$sql = "INSERT INTO review (userid ,cid, content, regdate, rating) VALUES 
('{$userid}','{$cid}','{$content}','{$date}','{$rating}')";


if ($mysqli->query($sql) === TRUE) {
    $rid = $mysqli->insert_id; 
    echo "<script>
    alert('댓글쓰기 완료되었습니다.');
    location.href='/pudding-LMS-website/user/mypage/review_view.php?rid={$rid}';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();
?>