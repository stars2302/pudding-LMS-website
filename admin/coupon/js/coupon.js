
//create 사진등록 button click하면 숨어있던 input[type="file"]실행
$('.thumb_btn').click(function(){
  $('.thumbnail .hidden').trigger('click');
});


$('.thumbnail .hidden').change(function(e){
  console.log(e.target.files[0].name);
  let fileSRC = e.target.files[0].name;
  console.log($(this).val());
  attachFile(fileSRC);
});

function attachFile(file) {
  console.log(file);
  let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
  formData.append('savefile', file) //<input type="file" name="savefile" value="파일명">
  console.log(formData);
  /*
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

      console.log(return_data);

      // if (return_data.result == 'member') {
      //   alert('로그인을 하십시오.');
      //   return;
      // } 
      if (return_data.result == 'image') {
        alert('이미지파일만 첨부할 수 있습니다.');
        return;
      } else if (return_data.result == 'size') {
        alert('10메가 이하만 첨부할 수 있습니다.');
        return;
      } else if (return_data.result == 'error') {
        alert('관리자에게 문의하세요');
        return;
      } else {
        //첨부이미지 테이블에 저장하면 할일
        let imgid = $('#file_table_id').val() + return_data.imgid + ',';
        $('#file_table_id').val(imgid);
        let html = `
            <div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
              <img src="/abcmall/pdata/${return_data.savefile}" alt="">
              <button type="button" class="btn btn-warning">삭제</button>
            </div>
        `;
        $('#thumbnails').append(html);
      }
    }

  });//ajax
  */
} //func attachFile



//create radio change event
$('.coupon_sale_check').change(function(){
  let $this = $(this);
  // inputDisable($this);
  if($this.find('input[type="radio"]').filter(':checked')){
    $this.parent().find('.input').prop('disabled',true);
    $this.find('input[type="radio"]:checked').siblings('.input').prop('disabled',false);
    console.log($this.parent().find('.input'));
    console.log($this.find('input[type="radio"]:checked').siblings('.input'));
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
