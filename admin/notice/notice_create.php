<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


?>

<!-- 공지사항 label for와 id를 연결하고, action으로 연결, post로 전달, 파일이나 이미지를 서버 전송할 때 타입으로 변경  -->
<section>
  <h2 class="main_tt">공지사항 등록</h2>
  <form class="notice_create_form" action="notice_create_ok.php" method="POST" enctype="multipart/form-data">
    <div class="notice_create_form_div">
      <label for="title"><span class="content_tt">제목</span></label>
      <input type="text" id="title" name="nt_title" class="notice_create_input form-control" placeholder="" aria-label="Username" required>  
    </div>
    <div class="notice_create_form_div">
      <label for="summernote"><span class="content_tt">상세내용</span></label>
      <textarea id="summernote" name="nt_content" required></textarea>
    </div>
    <div class="notice_create_form_div">
      <label for="image"><span class="content_tt">파일첨부</span></label>
      <input type="file" id="image" name="nt_filename" class="notice_create_input form-control" aria-label="Username">  
    </div>
    <div class="create_btns d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">등록 완료</button>     
      <a href="notice_list.php" class="btn_cancel btn btn-dark">등록 취소</a>
    </div>
  </form> 
</section>
</div><!-- //content_wrap -->
</div><!-- //wrap -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>