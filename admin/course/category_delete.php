<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  
  //if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $cateid = $_POST['cateid'];
      $cateName1 = $_POST["cateName1"] ?? '';
      $cateName2 = $_POST["cateName2"] ?? '';
      $cateName3 = $_POST["cateName3"] ?? '';

      $search_where = '';

     
      if($cateName1){
        $search_where .= " and name like '{$cateName1}%'";
      }
      if($cateName2){
        $search_where .= " and name like '{$cateName2}%'";
      }
      if($cateName3){
        $search_where .= " and name like '{$cateName3}%'";
      }
  
      // Perform the deletion using an appropriate SQL query based on your database structure
      // Replace 'your_table_name' with your actual table name

      // $sql = "DELETE * FROM category WHERE
      //         name = '$cateName1' AND
      //         name = '$cateName2' AND
      //         name = '$cateName3'";
      $sql = "DELETE FROM category where cateid={$cateid} ";
      $sql .= $search_where;
      echo $sql;
      if ($mysqli->query($sql)) {
          // Deletion was successful
          $response = array("result" => "success");
      } else {
          // Deletion failed
          $response = array("result" => "fail");
      }
  
      // Return a JSON response
      echo json_encode($response);
  //} 
  // else {
  //     // Invalid request method
  //     echo json_encode(array("result" => "fail"));
  // }

  
  ?>