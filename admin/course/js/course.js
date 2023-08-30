$("#product_detail").summernote({
  height: 400,
});


let price = $('.price input')

$("#price_menu").change(function(){
  let option1 = $(this).val()
  // console.log(option1)

  if(option1 == '무료'){
    price.prop('disabled',true)
  }else{
    price.prop('disabled',false)
  }
});

let month = $('.month')

$("#limit").change(function(){
  let option2 = $(this).val()
  console.log(option2)

  if(option2 == '무제한'){
    month.prop('disabled',true)
  }else{
    month.prop('disabled',false)
  }
})

$(".add_listBtn a").click(function(e){
  e.preventDefault();
  let youtube = $('.youtube:last').clone();
  console.log(youtube)
  $('.you_upload').append(youtube);
})

$('.you_upload').on('click','.trash_icon',function(){
  if($('.youtube').length > 1){
    $(this).closest('.youtube').remove();
  }
})


// var uploadFiles = [];
// var $drop = $("#drop");
// $drop.on("dragenter", function (e) { //드래그 요소가 들어왔을떄
//   $(this).addClass('drag-enter');
// }).on("dragleave", function (e) { //드래그 요소가 나갔을때
//   $(this).removeClass('drag-enter');
// }).on("dragover", function (e) {
//   e.stopPropagation();
//   e.preventDefault();
// }).on('drop', function (e) { //드래그한 항목을 떨어뜨렸을때
//   e.preventDefault();
//   console.log(e);

//   $(this).removeClass('drag-enter');
//   var files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목
//   console.log(files);
//   for (var i = 0; i < files.length; i++) {
//     var file = files[i];
//     attachFile(file);
//   }    
// });