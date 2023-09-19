<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';


  $cartid = $_POST['cartid'];
  $total_price = $_POST['total_price'];
  $discount_price = $_POST['discount_price'];
  $userid = $_POST['userid'];

  if($total_price == $discount_price){
    $discount_status = 0;
  } else{
    $discount_status = 1;
  }

  $i=0;
  foreach($cartid as $ctid){
    $sql = "SELECT c.cid,c.name,c.cate FROM cart ct
            JOIN courses c ON c.cid = ct.cid
            WHERE ct.cartid = $ctid";
    $result = $mysqli->query($sql);
    $course = $result->fetch_object();

    //소분류 추출
    $categoryText = $course->cate;
    $parts = explode('/', $categoryText);
    $catename = end($parts);


    $sql2 = "INSERT into payments
        (cid,catename,userid,name,total_price,discount_price,discount_status) values
        ({$course->cid},'{$catename}','{$userid}','{$course->name}',{$total_price},{$discount_price},{$discount_status})
    ";
    $result2 = $mysqli -> query($sql2);

    if($result2 === true){ // INSERT가 성공한 경우
    $return_data = array("result{$i}" => "success");
  } else { // INSERT가 실패한 경우
    $return_data = array("result{$i}" => "error", "message" => $mysqli->error);
  }
  $i++;

    $sql3 = "DELETE from cart where cartid=$ctid";
    $result = $mysqli->query($sql3);
}
  echo json_encode($return_data);
  exit;

?>