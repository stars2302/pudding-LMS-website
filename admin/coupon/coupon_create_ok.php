<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
$mysqli->autocommit(FALSE);
try{
  $cp_imageSRC = $_FILES['cp_image']['name'];
  $cp_imagefile = '/pudding-LMS-website/admin/coupon/images/';
  $cp_image = $cp_imagefile.$cp_imageSRC;
  $cp_name = $_POST['cp_name'];
  $cp_limit = $_POST['cp_limit']??'';
  $cp_status = $_POST['cp_status'];
  $cp_type = $_POST['cp_type'];
  $cp_ratio = $_POST['cp_ratio']??'';
  $cp_price = $_POST['cp_price']??'';
  $cp_date = $_POST['cp_date']??'';
  // var_dump($cp_image);

  $sql = "INSERT into coupons 
  (cp_name, cp_image, cp_type, cp_price, cp_limit, cp_ratio, cp_status, cp_date) values 
  ('{$cp_name}','{$cp_image}','{$cp_type}','{$cp_price}','{$cp_limit}','{$cp_ratio}','{$cp_status}','{$cp_date}')";
  $result = $mysqli -> query($sql);


  if(isset($result)){
    $mysqli->commit();
    echo "
    <script>
      alert('쿠폰등록성공!');
      location.href = '/pudding-LMS-website/admin/coupon/coupon_list.php';
    </script>
    ";
  }

} catch(Exception $e){
  $mysqli->rollback();
  echo "
  <script>
    alert('쿠폰등록실패!');
  </script>
  ";
  exit;
}














?>