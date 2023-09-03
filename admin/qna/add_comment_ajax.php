<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post_id = $_POST['post_id'];
  $parent_comment_id = $_POST['parent_comment_id'];
  $depth = $_POST['depth'];
  $comment = $_POST['comment'];
  $user_id = 'test'; // 로그인한 사용자 ID
  
  $sql = "INSERT INTO qna_comments (post_id, parent_comment_id, depth, user_id, comment) VALUES (?, ?, ?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('iiiss', $post_id, $parent_comment_id, $depth, $user_id, $comment);
  

  if ($stmt->execute()) {
    $new_id = $mysqli->insert_id;
    
    // 새로 생성된 레코드의 created_at 정보를 불러옴
    $time_sql = "SELECT created_at FROM qna_comments WHERE id = ?";
    $time_stmt = $mysqli->prepare($time_sql);
    $time_stmt->bind_param('i', $new_id);
    $time_stmt->execute();
    $time_result = $time_stmt->get_result();
    $time_row = $time_result->fetch_assoc();
    $created_at = $time_row['created_at'];
    
    echo json_encode(["status" => "success", "new_id" => $new_id, "depth" => $depth, "created_at" => $created_at]);
  } else {
    echo json_encode(["status" => "fail", "error" => $stmt->error]);
  }
} else {
  echo "fail";
}

?>
