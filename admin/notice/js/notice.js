
/* notice.js */
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();


/* notice_create.js */
// $('#summernote').summernote({
//   placeholder: '공지사항 내용을 입력해 주세요',
//   tabsize: 2,
//   height: 150,
//   resize: false,
//   lang: "ko-KR",
//   disableResizeEditor: true,
  // toolbar: [
  //     ['fontsize', ['fontsize']],
  //     ['style', ['bold', 'italic', 'underline', 'clear']],
  //     ['color', ['color']],
  //     ['table', ['table']],
  //     ['para', ['paragraph']],
  //     ['insert', ['link', 'picture']],
  //     ['view', []]
  // ],
  // callbacks: {	//여기 부분이 이미지를 첨부하는 부분
  //     onImageUpload: function (files) {
  //         RealTimeImageUpdate(files, this);
  //     }
  // }
// })
$("#summernote").summernote({
  height: 150,
  placeholder: '공지사항 내용을 입력해 주세요',
  resize: false,
  lang: "ko-KR",
  disableResizeEditor: true,
});


$(".notice_create_form").submit(function () {
  let markupStr = $("#summernote").summernote("code");
  let content = encodeURIComponent(markupStr);
  $(".content").val(content);

  if ($("#summernote").summernote("isEmpty")) {
    alert("상세설명을 입력하세요");
    return false;
  }
});


  //취소 버튼 클릭 시 입력 필드 초기화
  $('.btn_cancel').click(function(){
    $('#notice_create_form')[0].reset();
    $('#summernote').summernote('reset');
  });


  //notice 게시물 삭제 버튼 클릭
  $(".del_btn").click(function(e){
    e.preventDefault();
    let prt = $(this).closest('.prt').attr('data-prt');
    console.log(prt);
    if(confirm('글을 삭제하시겠습니까?')){
      location.href = '/pudding-LMS-website/admin/notice/notice_delete_ok.php?ntid='+prt;
    } else {
      alert('취소되었습니다.');
      location.href = '/pudding-LMS-website/admin/notice/notice_list.php';
    }
  });
});

