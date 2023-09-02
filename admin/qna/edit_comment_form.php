<?php
include 'dbconn.php';

$comment_id = $_POST['comment_id'];

$sql = "SELECT * FROM qna_comments WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
?>
  <form action="edit_comment.php" method="post">
    <input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>">
    <textarea name="comment"><?php echo htmlspecialchars($row['comment']); ?></textarea>
    <button type="submit">댓글 수정</button>
  </form>
<?php
} else {
  echo "댓글이 존재하지 않습니다.";
}
?>
