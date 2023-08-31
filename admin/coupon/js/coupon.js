
$('.thumb_btn').click(function(){
  //create 사진등록 button click하면 숨어있던 input[type="file"]실행
  $('.thumbnail .hidden').trigger('click');
});

$('#thumbnail').change(function(){
  console.log($(this).val());
  let file = $(this).prop('files');
  console.log(file);

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
        console.log('error:', error)
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
        }
      }

    });//ajax
});

//쿠폰등록 이미지 validate
$('.coupon_submit_btn').click(function(){
  console.log($('#thumbnail').val());
  if(!$('#thumbnail').val()){
    alert('쿠폰 이미지를 등록해주세요');
  }
});




//create radio change event
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
