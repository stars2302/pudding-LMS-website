<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

  $ntid = $_POST['ntid'];
   $nt_regdate = date('Y-m-d');
   $nt_title = $_POST["nt_title"];
   $nt_content = $_POST["nt_content"];


   $sql = "SELECT nt_filename FROM notice WHERE ntid='{$ntid}'";
   $result = $mysqli->query($sql);
   $sqlarr = $result -> fetch_object();

   if ($_FILES['nt_filename']['name']) {
      if(isset($sqlarr->nt_filename)) {
        unlink($_SERVER['DOCUMENT_ROOT'] .$sqlarr->nt_filename);
      } 
    //파일 사이즈 검사s
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
    $filename = $_FILES['nt_filename']['name']; //insta.jpg
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg    
    $newfilename = date("YmdHis") . substr(rand(), 0, 6); //20238171184015
    $thumbnail = $newfilename . "." . $ext; //20238171184015.jpg
    

    if (move_uploaded_file($_FILES['nt_filename']['tmp_name'], $save_dir . $thumbnail)) {
        $nt_filename = "/pudding-LMS-website/admin/images/notice/". $thumbnail;
    } else {
      echo "<script> 
      alert('이미지 등록 실패!');
          history.back();            
        </script>";
        exit;
    }
    }     

   


  //update 테이블명 set 컬럼명1='수정된 값', 컬럼명2='수정된 값' where 조건;


      $sql ="UPDATE notice SET 
      nt_title='{$nt_title}', 
      nt_content='{$nt_content}', 
      nt_filename='{$nt_filename}', 
      nt_regdate='{$nt_regdate}' 
      WHERE ntid='{$ntid}'";


  $result = $mysqli -> query($sql);

  if ($result === TRUE) {    
      echo "<script>
      alert('글수정 완료되었습니다.');
      location.replace('notice_list.php');</script>";          
  }  else {
    echo "Error:".$sql . "<br>" . $mysqli -> error;  
  }
$mysqli->close();
?>

