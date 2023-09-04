<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  
  //if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $cateid = $_POST['cateid'];
      $cateName1 = $_POST["cateName1"] ?? '';
      $cateName2 = $_POST["cateName2"] ?? '';
      $cateName3 = $_POST["cateName3"] ?? '';

      $search_where = '';

     
      if($cateName1){
        $search_where .= " and name like '%{$cateName1}%'";
      }
      if($cateName2){
        $search_where .= " and name like '%{$cateName2}%'";
      }
      if($cateName3){
        $search_where .= " and name like '%{$cateName3}%'";
      }
  
      // $sql = "DELETE * FROM category WHERE
      //         name = '$cateName1' AND
      //         name = '$cateName2' AND
      //         name = '$cateName3'";

      //sql로 phpmyadmin 삭제시 삭제가 되지만 사이트에서는 안됨
      $sql = "DELETE FROM category where cateid={$cateid} ";
      $sql .= $search_where;
      echo $sql;
      if ($mysqli->query($sql)) {
          $response = array("result" => "success");
      } else {
          $response = array("result" => "fail");
      }
  

      echo json_encode($response);
  //} 
  // else {
  //     echo json_encode(array("result" => "fail"));
  // }

  
  ?>