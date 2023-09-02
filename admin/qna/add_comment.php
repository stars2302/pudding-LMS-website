<?php
// include 'dbconn.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_page.php';

$post_id = $_POST['post_id'];
$parent_comment_id = $_POST['parent_comment_id'];
$depth = $_POST['depth'];
$comment = $_POST['comment'];
$user_id = 'username'; // 현재 로그인한 사용자 이름

$sql = "INSERT INTO qna_comments (post_id, parent_comment_id, depth, user_id, comment) VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('iiiss', $post_id, $parent_comment_id, $depth, $user_id, $comment);
$result = $stmt->execute();

if ($result) {
    header("Location: qna_content.php");
} else {
  echo "댓글 작성 실패: " . $mysqli->error;
}
?>
