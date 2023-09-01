<?php
$title = "공지사항 수정";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>

<section>
  <h2 class="main_tt">공지사항 수정</h2>
  <form class="notice_create_form" id="notice_create_form" action="notice_create_ok.php" method="post">
    <div class="notice_create_form_div">
      <h3 class="content_tt"><label for="nt_title">제목</label></h3>
      <input type="text" id="nt_title" name="nt_title" class="notice_create_input form-control" placeholder="" aria-label="Username" required>
    </div>
    <div class="notice_create_form_div">
      <label for="nt_content">
        <h3 class="content_tt">상세내용</h3>
      </label>
      <div id="summernote" name="nt_content"></div>
      <!-- <textarea id="nt_content" name="nt_content" required></textarea> -->
    </div>
    <div class="notice_create_form_div">
      <label for="nt_filename">
        <h3 class="content_tt">파일첨부</h3>
      </label>
      <input type="file" id="nt_filename" name="nt_filename" class="notice_create_input form-control" aria-label="Username" required>
    </div>
    <div class="create_btns d-flex justify-content-end">
      <button type="submit" class="btn btn-primary" form="notice_create_form">수정 완료</button>
      <button type="button" class="btn_cancel btn btn-dark">수정 취소</button>
    </div>
  </form>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>