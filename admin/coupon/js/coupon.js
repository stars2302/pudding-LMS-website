//coupon_create / coupon_update 사진등록 버튼 클릭하면~
$('.thumb_btn').click(function(){
  //create 사진등록 button click하면 숨어있던 input[type="file"]실행
  $('.thumbnail .hidden').trigger('click');
});


//coupon_create / coupon_update 사진등록 input의 내용이 바뀌면~
$('#thumbnail').change(function(){
  let file = $(this).prop('files');
    
    let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
    formData.append('savefile', file[0]); //<input type="file" name="savefile" value="파일명">
    //ajax 활용해 이미지 폴더에 추가. 이미지 이름 변환. validate
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
        
        //오류없이 등록되면!
        } else{
          //이미지 출력
          $('.show_thumb').html(`<img src="${return_data.src}" alt="">`);
          //숨겨진 input에 value로 이미지경로 넣어주기
          $('#imgSRC').val(return_data.src);
        }
      }
    });//ajax

  
  //사진변경 시 이전에 있던 사진 images폴더에서 삭제
  //기존 이미지 경로담기
  let prevImg = $(this).siblings('.show_thumb').find('img').attr('src');
  let data = {
    prevImg : prevImg
  }
  //해당 경로값을 보내 unlink
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
  
});



// coupon_create / coupon_update 쿠폰등록 이미지 validate
$('.coupon_submit_btn').click(function(){
  if(!$('#thumbnail').val()){
    alert('쿠폰 이미지를 등록해주세요');
  }
});




// coupon_create / coupon_update radio type input 체크 바꾸면
$('.coupon_sale_check').change(function(){
  let $this = $(this);
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
  //cpid에 해당하는 쿠폰의 value에 따라 활성/비활성 update
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
//filter radio 버튼들의 값이 바뀌면 submit버튼 trigger
$('.coupon_filter').change(function(){
  $(this).find('button').trigger('click');
});


//coupon_list 쿠폰 삭제 버튼 클릭
$('.icons .del_btn').click(function(e){
  let prt = $(this).closest('.coupon').attr('data-cpid');
  e.preventDefault();


  if(confirm('정말로 삭제하시겠습니까?')){
    //coupon_delete_ok로 이동
    location.href = '/pudding-LMS-website/admin/coupon/coupon_delete_ok.php?cpid='+prt;
  } else {
    alert('취소되었습니다.');
    //coupon_list로 이동
    location.href = '/pudding-LMS-website/admin/coupon/coupon_list.php';
  }
});
