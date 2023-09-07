<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
/* 페이지 타이틀 및 CSS/JS 경로 설정 & 데이터 베이스 연결*/

/* 제목, 내용, 파일, 날짜*/
$nt_title = $_POST["nt_title"];
$nt_content = $_POST["nt_content"];
$nt_filename = $_FILES["nt_filename"]["name"] ?? '';
$nt_regdate = date('Y-m-d');
if ($_FILES['nt_filename']['name']) {
 
    //파일 사이즈 검사
    if ($_FILES['nt_filename']['size'] > 10240000) {
      echo "<script>
          alert('10MB 이하만 첨부할 수 있습니다.');    
          history.back();      
        </script>";
      exit;
    }
    $filetype = 1;
    //이미지 여부 검사
    if (strpos($_FILES['nt_filename']['type'], 'image') === false) {
      $filetype = 0;
    } 
 

    //파일 업로드
    $save_dir = $_SERVER['DOCUMENT_ROOT'] . "/pudding-LMS-website/admin/images/notice/";
    $ext = pathinfo($nt_filename, PATHINFO_EXTENSION); //jpg
    $upload_path = "/pudding-LMS-website/admin/images/notice/" . $nt_filename; //파일 경로
    $newfilename = date("YmdHis") . substr(rand(), 0, 6); //20238171184015
    $thumbnail = $newfilename . "." . $ext; //20238171184015.jpg

    if (move_uploaded_file($_FILES['nt_filename']['tmp_name'], $save_dir . $thumbnail)) {
        $upload_option_image = "/pudding-LMS-website/admin/images/notice/" . $thumbnail;
    } else {
      echo "<script>
          alert('이미지등록 실패!');    
          history.back();            
        </script>";
    }
  } //첨부파일 있다면 할일


  //없으면 빈값^^....
if($_FILES["nt_filename"]["name"] === ''){
  $upload_option_image = '';
}
if(!isset($filetype)){
  $filetype = '';
}

$sql = "INSERT INTO notice 
(nt_title, nt_filename, nt_content, nt_regdate, filetype) VALUES 
('{$nt_title}','{$upload_option_image}','{$nt_content}','{$nt_regdate}','{$filetype}')";
$result = $mysqli->query($sql);
$pid = $mysqli->insert_id;
if($result === TRUE) {
    echo "<script>
    alert('글쓰기가 완료되었습니다.');
    location.href='notice_list.php'; 
    </script>";
} else {
    echo "Error: ". $sql . "<br>" .$mysqli->error;
}
$mysqli->close();
?>