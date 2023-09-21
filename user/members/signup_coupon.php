<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$userid = $_GET['userid'];
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
   let data = {
    uid : '<?=$userid ?>',
    cpid: 1
  }
  console.log(data);
  $.ajax({
    async : false, 
    type: 'post',     
    data: data, 
    url: "/pudding-LMS-website/user/inc/coupon_insert.php", 
    dataType: 'json', //결과 json 객체형식
    error: function(error){
      console.log('Error:', error);
    },
    success: function(return_data){
      console.log(return_data.result);
      if(return_data.result == "ok"){
        alert('쿠폰이 지급되었습니다.');
        location.href = "/pudding-LMS-website/user/index.php";
      } else{
        alert('이미 발급받은 쿠폰입니다.');
        location.href = "/pudding-LMS-website/user/index.php";
      }
    }
  });//ajax
</script>