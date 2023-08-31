<?php
$title = "공지사항 수정";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>

<section>
  <h2 class="main_tt">공지사항 수정</h2>
  <form class="notice_create_form" action="notice_create_ok.html" method="post">
    <div class="notice_create_form_div">
      <h3 class="content_tt"><label for="">제목</label></h3>
      <input type="text" id="title" name="title" class="notice_create_input form-control" placeholder="" aria-label="Username" required>
    </div>
    <div class="notice_create_form_div">
      <label for="">
        <h3 class="content_tt">상세내용</h3>
      </label>
      <textarea id="summernote" name="editordata" required></textarea>
    </div>
    <div class="notice_create_form_div">
      <label for="">
        <h3 class="content_tt">파일첨부</h3>
      </label>
      <input type="file" id="image" name="image" class="notice_create_input form-control" aria-label="Username" required>
    </div>
    <div class="create_btns d-flex justify-content-end">
      <a class="btn btn-primary">수정 완료</a>
      <a href="notice_list.html" class="btn_cancel btn btn-dark">수정 취소</a>
    </div>
  </form>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>