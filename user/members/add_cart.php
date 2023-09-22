<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

//세션에 UID가 있어야 장바구니 담기 가능
if (isset($_SESSION['UID'])) {
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid'];

  $sqluc = "SELECT * FROM cart where cid=$cid and userid='$uid'";
  $result3 = $mysqli -> query($sqluc);
  while($rs = $result3->fetch_object()){
    $rscuc[]=$rs;
  }

  if(!isset($rscuc)){

    $sql = "INSERT INTO cart (cid, userid) VALUES ('{$cid}', '{$uid}')";
    $result = $mysqli->query($sql);
  
    if (isset($result)) {
      echo '<script>alert("장바구니 담기 성공");
            history.back();
            </script>';
    } else {
      echo "<script>history.back();</script>";
    }
  } else{
    echo "<script>alert('이미 장바구니에 담겨있습니다.');history.back();</script>";
  }
} else {
  //UID 없다면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
        location.href = '/pudding-LMS-website/user/members/login.php';
        </script>";
}

?>