<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

   $ntid = $_POST['ntid'];
   $nt_regdate = date('Y-m-d');
   $nt_title = $_POST["nt_title"];
   $nt_content = $_POST["nt_content"];
 
  $sql ="UPDATE notice SET 
  nt_title='{$nt_title}', 
  nt_content='{$nt_content}', 
  nt_filename='', 
  nt_regdate='{$nt_regdate}' 
  WHERE ntid='{$ntid}'";

  $result = $mysqli -> query($sql);
  if ($result === TRUE) {    
      echo "<script>
      alert('글수정 완료되었습니다.');

      location.replace('notice_list.php');
      </script>";          
  }  else {
    echo "Error:".$sql . "<br>" . $mysqli -> error;  
  }
$mysqli->close();
?>