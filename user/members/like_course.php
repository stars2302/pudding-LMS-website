<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

//세션에 UID가 있어야 좋아요 가능 
if (isset($_SESSION['UID'])) {
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid'];

  $sql = "INSERT INTO like_course (cid, userid) VALUES ('{$cid}', '{$uid}')";
  $result = $mysqli->query($sql);

  if (isset($result)) {
    echo '<script>alert("강의 좋아요.");
          history.back();
          </script>';
  } else {
    echo "<script>history.back();</script>";
  }
} else {
  //UID 없다면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
        location.href = '/pudding-LMS-website/user/members/login.php';
        </script>";
}

?>