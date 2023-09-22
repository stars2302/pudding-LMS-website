//winner coupon 지급
$('.game_winner .coupon').click(function(){ 
  let uid = $(this).attr('data-user');
  let data = {
    uid : uid,
    cpid: 2
  }
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
      if(return_data.result == "ok"){
        alert('쿠폰이 지급되었습니다.');
        location.href = "/pudding-LMS-website/user/index.php";
      } else{
        alert('이미 발급받은 쿠폰입니다.');
        location.href = "/pudding-LMS-website/user/index.php";
      }
    }
  });//ajax
});
