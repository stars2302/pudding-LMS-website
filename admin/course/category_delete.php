<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';



  $imgid = $_POST['imgid'];
  // $sql = "DELETE FROM product_image_table where imgid={$imgid}";
  $sql = "SELECT * FROM product_image_table where imgid={$imgid}";
  $result = $mysqli -> query($sql);
  $rs =  $result->fetch_object();

  if($rs->userid != $_SESSION['AUID']){
    $return_data = array("result"=>"my"); 
    echo json_encode($return_data);
    exit;
  }

  $sql = "UPDATE product_image_table set status=0 where imgid={$imgid}";
  $result = $mysqli -> query($sql);

  if($result){
    $delete_file = $_SERVER['DOCUMENT_ROOT'].'/abcmall/pdata/'.$rs->filename;
    unlink($delete_file);

    $return_data = array("result"=>"yes"); 
    echo json_encode($return_data);
  } else{
    $return_data = array("result"=>"no"); 
    echo json_encode($return_data);
  }


  ?>