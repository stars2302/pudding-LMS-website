<?php
include 'dbconn.php';

// 조회수 증가
$sql = "UPDATE qna SET q_hit = q_hit + 1 WHERE qid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $qid);
$stmt->execute();

// 게시물 정보 가져오기
$sql = "SELECT * FROM qna WHERE qid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $qid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// 댓글의 총 개수 구하기
$sql_comment_count = "SELECT COUNT(*) as comment_count FROM qna_comments WHERE post_id = ?";
$stmt = $mysqli->prepare($sql_comment_count);
$stmt->bind_param('i', $qid);
$stmt->execute();
$result_comment_count = $stmt->get_result();
$row_comment_count = $result_comment_count->fetch_assoc();
$comment_count = $row_comment_count['comment_count'];

// 답변 상태 토글 버튼을 눌렀을 때
if (isset($_GET['toggle'])) {
    $newState = $_GET['toggle'];
    $sql = "UPDATE qna SET q_state = ? WHERE qid = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $newState, $qid);
    $stmt->execute();
}