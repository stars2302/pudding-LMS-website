//coupon_create / coupon_update 사진등록 버튼 클릭하면~
$('.thumb_btn').click(function(){
  //create 사진등록 button click하면 숨어있던 input[type="file"]실행
  $('.thumbnail .hidden').trigger('click');


  
});


//coupon_create / coupon_update 사진등록 input의 내용이 바뀌면~
$('#thumbnail').change(function(){
  let file = $(this).prop('files');
  setTimeout(function(){
    
    let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
    formData.append('savefile', file[0]); //<input type="file" name="cp_image" value="파일명">
    $.ajax({
      url: 'coupon_image_save.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      type: 'POST',
      error: function (error) {
        console.log('error:', error);
      },
      success: function (return_data) {
        if(return_data.result == 'image'){
          alert('이미지파일만 첨부할 수 있습니다.');
          return;
        } else if(return_data.result == 'size'){
          alert('10MB 이하만 첨부할 수 있습니다.');
          return;
        } else if(return_data.result == 'error'){
          alert('관리자에게 문의하세요');
          return;
        } else{
          $('.show_thumb').html(`<img src="${return_data.src}" alt="">`);
          $('#imgSRC').val(return_data.src);
        }
      }
    });//ajax

    //사진등록 이전에 있던 사진 images폴더에서 삭제
  let prevImg = $(this).siblings('.show_thumb').find('img').attr('src');
  console.log(prevImg);
  let data = {
    prevImg : prevImg
  }
  console.log(data);
  $.ajax({
    async : false, 
    type: 'post',     
    data: data, 
    url: "image_del.php", 
    dataType: 'json', //결과 json 객체형식
    error: function(error){
      console.log('Error:', error);
    },
    success: function(return_data){
      console.log(return_data);
    }
  });//ajax
  },100);
});



// coupon_create / coupon_update 쿠폰등록 이미지 validate
$('.coupon_submit_btn').click(function(){
  console.log($('#thumbnail').val());
  if(!$('#thumbnail').val()){
    alert('쿠폰 이미지를 등록해주세요');
  }
});




// coupon_create / coupon_update radio change event
$('.coupon_sale_check').change(function(){
  let $this = $(this);
  // inputDisable($this);
  if($this.find('input[type="radio"]').filter(':checked')){
    $this.parent().find('.input').prop('disabled',true);
    $this.parent().find('.input').prop('required',false);
    $this.find('input[type="radio"]:checked').siblings('.input').prop('disabled',false);
    $this.find('input[type="radio"]:checked').siblings('.input').prop('required',true);
    $this.find('input[type="radio"]:not(:checked)').siblings('.input').val('');//radio input 바꾸면 val 없애기
  }
});
$('.coupon_sale_check').trigger('change');

$('.coupon_limit_date').change(function(){
  $this = $(this);
  if(!$(this).find('input[name="cp_date_type"]').prop('checked')){
    $this.find('.form-select').prop('disabled',false);
  } else{
    $this.find('.form-select').prop('disabled',true);
  }
});



// coupon_create / coupon_update 취소버튼 클릭
$('.coupon_cancel').click(function(){
  alert('취소되었습니다.');
  location.href = "/pudding-LMS-website/admin/coupon/coupon_list.php";
});




//coupon_list 활성/비활성 toggle change
$('.cp_status_toggle').change(function(){
  let $this = $(this);

  //check 되면 1, 아니면 0을 value로 넘기기
  if($this.find('input').prop('checked')){
    $this.val(1);
  } else{
    $this.val(0);
  }

  //input의 value와 부모의 cpid를 받아오기
  let cp_status = $(this).val();
  let cpid = $(this).parent().attr('data-cpid');
  let data = {
    cp_status : cp_status,
    cpid : cpid
  }
  $.ajax({
    async : false, 
    type: 'post',     
    data: data, 
    url: "coupon_status_change.php", 
    dataType: 'json', //결과 json 객체형식
    error: function(error){
      console.log('Error:', error);
    },
    success: function(return_data){
      console.log(return_data.result);
      if(return_data.result == '1'){
        alert('변경되었습니다.');
        location.reload();//새로고침
      } else{
        alert('변경에 실패되었습니다.');
      }
    }
  });//ajax
});


//coupon_list filter
$('.coupon_filter').change(function(){
  $(this).find('button').trigger('click');
});


//coupon_list 쿠폰 삭제 버튼 클릭
$('.icons .del_btn').click(function(e){
  let prt = $(this).closest('.coupon').attr('data-cpid');
  console.log(prt);
  e.preventDefault();


  if(confirm('정말로 삭제하시겠습니까?')){
    location.href = '/pudding-LMS-website/admin/coupon/coupon_delete_ok.php?cpid='+prt;
  } else {
    alert('취소되었습니다.');
    location.href = '/pudding-LMS-website/admin/coupon/coupon_list.php';
  }
});