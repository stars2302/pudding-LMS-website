<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';


//세션에 UID가 있어야 좋아요 가능 
if (isset($_SESSION['UID'])) {
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid'];

  $sql = "INSERT INTO cart (cid, userid) VALUES ('{$cid}', '{$uid}')";
  $result = $mysqli->query($sql);

  if ($result) {
    $retun_data = array("result" => 1);
    echo json_encode($retun_data);
  } else {
    $retun_data = array("result" => 0);
    echo json_encode($retun_data);
  }

  if (isset($retun_data)) {
    echo '<script>alert("장바구니 담기 성공");
          history.back();
          </script>';
  } else {
    echo "<script>history.back();</script>";
  }
  
} else {
  //아니라면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
        location.href = '/pudding-LMS-website/user/members/login.php';
        </script>";
}

?>