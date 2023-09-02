<?php
// include 'dbconn.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_page.php';

$comment_id = $_POST['comment_id'];

// 대댓글이 있는지 확인
$sql = "SELECT COUNT(*) as cnt FROM qna_comments WHERE parent_comment_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['cnt'] > 0) {
    // 대댓글이 있으면 삭제하지 않음
    echo "<script>alert('이 댓글과 관련된 댓글이 존재해서 삭제 할 수 없습니다.');</script>";
    echo "<script>window.location.href='qna_content.php';</script>"; 
} else {
    // 대댓글이 없으면 삭제
    $sql = "DELETE FROM qna_comments WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $comment_id);
    $result = $stmt->execute();

    if ($result) {
        header("Location: qna_content.php");
    } else {
        echo "댓글 삭제 실패: " . $mysqli->error;
    }
}
?>
