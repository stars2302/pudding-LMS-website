<?php
$title = "공지사항 등록";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


//이미지를 업로드할 디렉토리 경로
$uploadDir = '../images/notice/';

//업로드할 파일의 최대 크기 (바이트)
$maxFileSize = 10 * 1024 * 1024; //10MB

//허용되는 파일 확장자
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

//에러 메시지 배열 초기화
$errors = [];

//이미지


if ($_SERVER['REQUEST_METHOD']  === 'POST') {
  //파일이 제대로 전송되었는지 확인
  if (isset($_FILES['nt_filename']) || $_FILES['nt_filename']['error'] === UPLOAD_ERR_OK) {
    //파일 정보 가져오기
    $fileName = $_FILES['nt_filename']['name'];
    $fileSize = $_FILES['nt_filename']['size'];
    $fileTmpName = $_FILES['nt_filename']['tmp_name'];
    $fileType = $_FILES['nt_filename']['type'];

    //파일 확장자 확인
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
      $errors[] = "허용되지 않는 파일 확장자입니다.";
    }

    //파일 크기 확인 
    if ($fileSize > $maxFileSize) {
      $errors[] = "파일 크기가 허용 범위를 초과했습니다.";
    }

    // 에러가 없다면 파일 저장
    if (empty($errors)) {
      $newFileName = uniqid() . '.' . $fileExtension;  //고유 파일명 생성 
      $uploadPath = $uploadDir . $newFileName;
      if (move_uploaded_file($fileTmpName, $uploadPath)) {
        echo "파일이 성공이 업로드되었습니다.";
      } else {
        $errors[] = "파일을 업로드 하는 중에 오류가 발생했습니다";
      }
    }
  } else {
    $errors[] = "파일 업로드 중 오류가 발생했습니다.";
  }
}

// 에러 메시지 출력
if (!empty($errors)) {
  foreach ($errors as $error) {
    echo $error . "<br>";
  }
}
?>

<section>
  <h2 class="main_tt">공지사항 등록</h2>
  <form class="notice_create_form" id="notice_create_form" action="notice_create_ok.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="content" value="" name="nt_content">
    <div class="notice_create_form_div">
      <h3 class="content_tt"><label for="nt_title">제목</label></h3>
      <input type="text" id="nt_title" name="nt_title" class="notice_create_input form-control" placeholder="" aria-label="Username" required value="<?php echo $row->nt_title; ?>">
    </div>
    <div class="notice_create_form_div">
      <label for="nt_content">
        <h3 class="content_tt" value="<?php echo $row->nt_content; ?>"></h3>
      </label>
      <div id="summernote" vale="<?= $row->nt_content; ?>">

      </div>
      <!-- <textarea id="nt_content" name="nt_content" required></textarea> -->
    </div>
    <div class="notice_create_form_div">
      <label for="nt_filename">
        <h3 class="content_tt">파일첨부</h3>
      </label>
      <input type="file" id="nt_filename" name="nt_filename" class="notice_create_input form-control" aria-label="Username">
    </div>
    <div class="create_btns d-flex justify-content-end">
      <button type="submit" class="notice_create_btn btn btn-primary" form="notice_create_form">등록 완료</button>
      <button type="button" class="btn_cancel btn btn-dark">등록 취소</button>
    </div>
  </form>
</section>
<script>
  $('#notice_create_form').submit(function() {
    let markupStr = $('#summernote').summernote('code');
    let content = encodeURIComponent(markupStr);
    $('#content').val(content);
  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>