<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';



  //이미지 여부 검사
  if(strpos($_FILES['savefile']['type'], 'image') === false){
    $return_data = array("result"=>'image'); 
    echo json_encode($return_data);
    exit;
  } 

  //파일 사이즈 검사(10mb)
  if($_FILES['savefile']['size']> 10240000){
    $return_data = array("result"=>'size'); 
    echo json_encode($return_data);
    exit;
  }

  //파일 업로드

  //업로드 경로
  $save_dir = $_SERVER['DOCUMENT_ROOT']."/pudding-LMS-website/admin/coupon/images/";//이미지저장할위치

  //파일이름
  $filename = $_FILES['savefile']['name']; //파일이름
  $ext = pathinfo($filename, PATHINFO_EXTENSION); //파일확장자
  $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015 <- 오늘날짜와 난수를 조합해 파일이름 변경
  $savefile = $newfilename.".".$ext; //20238171184015.jpg

  //경로 + 이름
  $savefileSRC = '/pudding-LMS-website/admin/coupon/images/'.$savefile;
  
  $return_data = array("src"=>$savefileSRC); 
  echo json_encode($return_data);
  
  
  if(move_uploaded_file($_FILES['savefile']['tmp_name'], $save_dir.$savefile)){ //이미지 지정한 경로에 업로드
    
  } else{
    $return_data = array("result"=>'error'); 
    echo json_encode($return_data);
    exit;
  }
?>