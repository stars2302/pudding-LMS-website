<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>
<section>
<h2 class="main_tt">공지사항 수정</h2>
<form class="notice_create_form" action="notice_create_ok.php" method="POST">
  <div class="notice_create_form_div">
    <h3 class="content_tt"><label for="">제목</label></h3>
    <input type="text" id="title" name="nt_title" class="notice_create_input form-control" placeholder="" aria-label="Username" 
    required value="<?= $sqlarr["nt_title"] ?>"></div>
  <div class="notice_create_form_div">
    <label for=""><h3 class="content_tt">상세내용</h3></label>
    <textarea id="summernote" name="nt_content" required 
    required value="<?= $sqlarr["nt_content"] ?>">
    </textarea>
  </div>
  <div class="notice_create_form_div">
    <label for=""><h3 class="content_tt">파일첨부</h3></label>
    <input type="file" id="image" name="nt_filename" class="notice_create_input form-control" aria-label="Username" 
    required value="">
  </div>
  <div class="create_btns d-flex justify-content-end">
    <a href="notice_create_ok.php" class="btn btn-primary">등록 완료</a>     
    <a href="notice_list.php" class="btn_cancel btn btn-dark">등록 취소</a>
</div>
</form> 
</section>    
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>