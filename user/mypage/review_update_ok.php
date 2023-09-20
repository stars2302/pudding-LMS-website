<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php');

$rid = $_GET["rid"];

$rating=$_POST["rating"];
$content =$_POST["review_update"];
$date = date("Y-m-d");
$sql = "UPDATE review SET content='{$content}',regdate='{$date}', rating='{$rating}' WHERE rid='{$rid}'";


if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('리뷰쓰기 수정완료되었습니다.');
    location.href='/pudding-LMS-website/user/mypage/review_view.php?rid={$rid}';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>