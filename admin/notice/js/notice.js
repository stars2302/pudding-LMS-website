/* notice.js */

$('.bin_icon').click(function(){
  confirm('정말 삭제하시겠습니까?');
  if(result) {
    //yes
     location.replace('index.php');
 } else {
     history.back();
 }
});

