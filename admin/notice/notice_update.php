<?php
$title = "공지사항 수정";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

//수정할 게시물의 id(ntid)를 로드
$ntid = $_GET['ntid'];

//게시물 조회 쿼리
$sql = "SELECT * FROM notice WHERE ntid = $ntid";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nt_title = $row["nt_title"];
  $nt_filename = $row["nt_filename"];
  $nt_read_cnt = $row["nt_read_cnt"];
  $nt_content = $row["nt_content"];
  $nt_regdate = $row["nt_regdate"];
} else {
  echo "게시물을 찾을 수 없습니다";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //게시물 수정 처리를 여기에 추가
  $new_nt_title = $_POST["nt_title"];
  $new_nt_content = $_POST["nt_content"];

  //파일 업로드 처리 (이미지 파일만 업로드 가능하도록 설정)
  $updateok = 1;
  $target_dir = "uploads/"; //업로드 디렉토리
  $target_file = $target_dir . basename($_FILES["nt_filename"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  //이미지 파일 형식을 검사하고 원하는 형식으로 설정하세요.
  if ($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg") {
    echo "이미지 파일만 업로드 가능합니다.";
    $uploadok = 0;
  }


  //파일업로드 처리가 완료되어야 하며, 필요한 경우 파일 업로드 후에 파일 이름을 데이터베이스에 저장하여야합니다.
}



//게시물 정보 업데이트 쿼리
$update_sql = "UPDATE notice set nt_title = '$nt_title', 
nt_content = '$nt_content', nt_filename='$nt_filename' WHERE ntid = $ntid";
if ($mysqli->query($update_sql) === TRUE)
?>
<section>
  <h2 class="main_tt">공지사항 수정</h2>
  <!-- 수정폼 -->
  <form class="notice_create_form" id="notice_create_form" action="notice_update_ok.php" method="post">
    <div class="notice_create_form_div">
      <input type="hidden" name="ntid" value="<?php echo $ntid; ?>">
      <h3 class="content_tt"><label for="nt_title">제목</label></h3>
      <input type="text" id="nt_title" name="nt_title" class="notice_create_input form-control" value="<?php echo $nt_title; ?>" placeholder="" aria-label="Username" required>
    </div>
    <div class="notice_create_form_div">
      <label for="nt_content">
        <h3 class="content_tt">상세내용</h3>
      </label>
      <div id="summernote" name="nt_content"><?php echo $nt_content; ?></div>
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