<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';


// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

$nt_title = $_POST["nt_title"];
$nt_filename = $_POST["nt_filename"];
$nt_read_cnt = $_POST["nt_read_cnt"];
$nt_content = $_POST["nt_content"];
$nt_regdate = date('Y-m-d');
$nt_file_name = $_POST['nt_file_name'];


// POST 데이터로 전달된 ntid 값 받기
if (isset($_POST['ntid'])) {
  $ntid = $_POST['ntid'];
  if ($stmt->execute()) {
?>
    <script>
      alert("글 삭제 완료되었습니다.");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("글 삭제 실패: <?php echo $stmt->error; ?>");
    </script>
<?php
  }
} else {
  echo "ntid가 전달되지않았습니다.";
}

$stmt->close();
$mysqli->close();




include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>