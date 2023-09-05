<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

$ntid =$_GET['ntid'];
$sql = "SELECT * FROM notice WHERE ntid='{$ntid}'";
$result = $mysqli->query($sql);
$sqlarr = $result -> fetch_object();

?>
<section>
<h2 class="main_tt">공지사항 수정</h2>
<form class="notice_create_form" action="notice_update_ok.php?ntid=<?= $ntid; ?>" method="POST">
  <div class="notice_create_form_div">
    <h3 class="content_tt"><label for="title">제목</label></h3>
    <input type="text" id="title" name="nt_title" class="notice_create_input form-control" placeholder="" aria-label="Username" 
    required 
    value="<?= $sqlarr -> nt_title; ?>">
  </div>
  <div class="notice_create_form_div">
    <label for="summernote"><h3 class="content_tt">상세내용</h3></label>
    <textarea id="summernote" name="nt_content" required>
      <?= $sqlarr -> nt_content; ?>
    </textarea>
  </div>  
  <div class="notice_create_form_div">
    <div>
      <?= $sqlarr -> nt_filename; ?>
    </div>
    <label for="image"><h3 class="content_tt">파일첨부</h3></label>
    <input type="file" id="image" name="nt_filename" class="notice_create_input form-control" aria-label="Username" 
    value="">    
  </div>
  <div class="create_btns d-flex justify-content-end">
    <button class="btn btn-primary">수정 완료</button>     
    <a href="notice_list.php" class="btn_cancel btn btn-dark">수정 취소</a>
</div>
</form> 
</section>    
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>