<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
$mysqli->autocommit(FALSE);
try{
  $cpid = $_GET['cpid'];

  $csql = "SELECT cp_image from coupons where cpid={$cpid}";
  $cresult = $mysqli -> query($csql);
  $rsc = $cresult -> fetch_object();

  $cp_image = $_POST['imgSRC'];
  
  //넘어온 img값이 빈값이면
  if($cp_image == ''){
    //기존 이미지로 업데이트
    $cp_image = $rsc->cp_image;
  }
  $cp_name = $_POST['cp_name'];
  $cp_limit = $_POST['cp_limit']??'';
  $cp_status = $_POST['cp_status'];
  $cp_type = $_POST['cp_type'];
  $cp_ratio = $_POST['cp_ratio']??0;
  $cp_price = $_POST['cp_price']??0;
  $cp_date = $_POST['cp_date']??'';

  $sql = "UPDATE coupons set cp_name='{$cp_name}', cp_image='{$cp_image}', cp_type='{$cp_type}', cp_price={$cp_price}, cp_limit='{$cp_limit}', cp_ratio={$cp_ratio}, cp_status='{$cp_status}', cp_date='{$cp_date}' where cpid={$cpid}";
  $result = $mysqli -> query($sql);
  // var_dump($sql);

  if(isset($result)){
    $mysqli->commit();
    echo "
    <script>
      alert('쿠폰수정성공!');
      location.href = '/pudding-LMS-website/admin/coupon/coupon_list.php';
      </script>
      ";
    }
    
  } catch(Exception $e){
    $mysqli->rollback();
    echo "
    <script>
    alert('쿠폰수정실패!');
  </script>
  ";
  exit;
}

?>