<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$comment_id = $_POST['comment_id'];

// 대댓글이 있는지 확인
$sql = "SELECT COUNT(*) as cnt FROM qna_comments WHERE parent_comment_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$response = [];


//댓글 + 댓글 삭제 
if ($row['cnt'] > 0) {
    // 댓글에 또 댓글 있으면 삭제하지 않음
    $response['status'] = 'error';
    $response['message'] = '이 댓글과 관련된 댓글이 존재하므로 삭제 할 수 없습니다.';
} else {
    // 댓글이 더 없으면 삭제
    $sql = "DELETE FROM qna_comments WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $comment_id);
    $result = $stmt->execute();

    if ($result) {
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
        $response['message'] = '댓글 삭제 실패: ' . $mysqli->error;
    }
}


echo json_encode($response);
?>
