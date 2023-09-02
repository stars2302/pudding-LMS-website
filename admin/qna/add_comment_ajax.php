<?php
// include 'dbconn.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_page.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post_id = $_POST['post_id'];
  $parent_comment_id = $_POST['parent_comment_id'];
  $depth = $_POST['depth'];
  $comment = $_POST['comment'];
  $user_id = $_POST['user_id']; // 로그인한 사용자 ID
  
  $sql = "INSERT INTO qna_comments (post_id, parent_comment_id, depth, user_id, comment) VALUES (?, ?, ?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('iiiss', $post_id, $parent_comment_id, $depth, $user_id, $comment);

  if ($stmt->execute()) {
    $new_id = $mysqli->insert_id;
    echo json_encode(["status" => "success", "new_id" => $new_id, "depth" => $depth]);
  } else {
    echo json_encode(["status" => "fail", "error" => $stmt->error]);
  }
} else {
  echo "fail";
}

?>
