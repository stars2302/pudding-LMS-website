/* notice.js */

$('[data-toggle="tooltip"]').tooltip();

$('.ti-trash, .btn_delete').click(function(){
  confirm('내용 삭제', '정말 삭제하시겠습니까?');  
  if(result) {    
    //yes
     location.replace('notice_list.html');
 } else {
     history.back();
 }
});
$('.btn_modify').click(function(){
  confirm('내용 수정','수정하시겠습니까?');
  if(result) {
    //yes
     location.replace('notice_list.html');
 } else {
     history.back();
 }
});

/* notice_create.js */
$('#summernote').summernote({
  /* 폰트선택 툴바 사용하려면 주석해제 */
  // fontNames: ['Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Apple SD Gothic Neo'],
  // fontNamesIgnoreCheck: ['Apple SD Gothic Neo'],
  placeholder: '공지사항 내용을 입력해 주세요',
  tabsize: 2,
  height: 150,
  resize: false,
  lang: "ko-KR",
  disableResizeEditor: true,
  toolbar: [
      /* 폰트선택 툴바 사용하려면 주석해제 */
      // ['fontname', ['fontname']],
      ['fontsize', ['fontsize']],
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['color', ['color']],
      ['table', ['table']],
      ['para', ['paragraph']],
      ['insert', ['link', 'picture']],
      ['view', []]
  ],
  callbacks: {	//여기 부분이 이미지를 첨부하는 부분
      onImageUpload: function (files) {
          RealTimeImageUpdate(files, this);
      }
  }
});