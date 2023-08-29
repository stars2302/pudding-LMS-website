/* notice.js */

$('.ti-trash, .btn_delete').click(function(){
  confirm('정말 삭제하시겠습니까?');
  if(result) {
    //yes
     location.replace('notice_list.html');
 } else {
     history.back();
 }
});
$('.btn_modify').click(function(){
  confirm('수정하시겠습니까?');
  if(result) {
    //yes
     location.replace('notice_list.html');
 } else {
     history.back();
 }
});

/* notice_create.js */
$('#summernote').summernote();