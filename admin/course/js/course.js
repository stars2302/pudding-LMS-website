$(function(){

  $("#product_detail").summernote({
    height: 400,
  });
  
  let price = $(".price_status input");
  
  $("#price_menu").change(function () {
    let option1 = $(this).val();
    // console.log(option1)
  
    if (option1 == "무료") {
      price.prop("disabled", true);
      price.val(null);
    } else {
      price.prop("disabled", false);
    }
  });
  
  let month = $("#due_status");
  
  $("#due").change(function () {
    let option2 = $(this).val();
    console.log(option2);
  
    if (option2 == "무제한") {
      month.prop("disabled", true);
      month.val(null);
    } else {
      month.prop("disabled", false);
    }
  });
  
  $(".add_listBtn a").click(function (e) {
    e.preventDefault();
    let youtube = $(".youtube:last").clone();
    youtube.find('input').val('');
    $(".you_upload").append(youtube);
  });
  
  $(".you_upload").on("click", ".trash_icon", function () {
    if ($(".youtube").length > 1) {
      $(this).closest(".youtube").remove();
    }
  });
  
  $('#course_form').submit(function(){
  
    let markupStr = $('#product_detail').summernote('code');
    let content = encodeURIComponent(markupStr);
    $('#content').val(content);
  
    if ($('#product_detail').summernote('isEmpty')) {
      alert('상세설명을 입력하세요');
      return false;
    }
  });

  //추가이미지 드래그앤드랍
  var uploadFiles = [];
  var $drop = $("#drop");
  $drop.on("dragenter", function(e) {  
    $(this).addClass('drag-enter');
  }).on("dragleave", function(e) { 
    $(this).removeClass('drag-enter');
  }).on("dragover", function(e) {
    e.stopPropagation();
    e.preventDefault();
  }).on('drop', function(e) {  
    e.preventDefault();
    $(this).removeClass('drag-enter');
    var files = e.originalEvent.dataTransfer.files;  
    console.log(files);
    for(var i = 0; i < files.length; i++) {
      var file = files[i];
      attachFile(file); 
    }  
  });

    function attachFile(file){
      console.log(file);
      let formData = new FormData(); 
      formData.append('savefile', file) 
      console.log(formData);
      $.ajax({
        url:'course_save_image.php',
        data: formData,
        cache:false,
        contentType: false,
        processData : false,
        dataType :'json',
        type:'POST',
        error: function(error){
          console.log('error:', error)
        },
        success:function(return_data){
  
          console.log(return_data);
  
          if(return_data.result == 'image'){
            alert('이미지파일만 첨부할 수 있습니다.');
            return;
          } else if(return_data.result == 'size'){
            alert('10메가 이하만 첨부할 수 있습니다.');
            return;
          } else if(return_data.result == 'error'){
            alert('관리자에게 문의하세요');
            return;
          } else{
            //첨부이미지 테이블에 저장하면 할일
            let imgid = $('#image_table_id').val() + return_data.imgid + ',';
            $('#image_table_id').val(imgid);
            let html = `
                <div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
                  <img src="/pudding-LMS-website/admin/images/course/${return_data.savefile}" alt="">
                  <button type="button" class="btn btn-danger">삭제</button>
               </div>
            `;
            $('#thumbnails').append(html);
          }
        }
      });
    }

    $('#selectImg').click(function(){
      $('#upfile').trigger('click');
    });

})