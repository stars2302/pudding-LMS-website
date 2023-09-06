<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  $qid = $_GET['qid'];
  $state = $_GET['state'];
 
  $sql = "UPDATE qna SET q_state='{$state}' WHERE qid ='{$qid}'";

  $result = $mysqli -> query($sql);
  if($result){
    echo "<script>
    alert('변경 했습니다');
    location.href='qna_list.php'</script>";

  } else{
    echo "<script>
    location.href='qna_list.php'</script>";
  }

  echo json_encode($data);


?>