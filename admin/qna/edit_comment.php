<?php
include 'dbconn.php';

$comment_id = $_POST['comment_id'];
$comment = $_POST['comment'];

$sql = "UPDATE qna_comments SET comment = ? WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('si', $comment, $comment_id);
$result = $stmt->execute();

if ($result) {
  header("Location: qna_content.php");
} else {
  echo "댓글 수정 실패: " . $mysqli->error;
}
?>
