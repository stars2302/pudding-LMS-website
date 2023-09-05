

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';


if (isset($_POST['cateid']) && !empty($_POST['cateid'])) {
if (isset($_POST['cateid'])) {
    $cateid = $_POST['cateid'];

    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM category WHERE cateid = {$cateid} ";
    //$query = "DELETE FROM category WHERE `category`.`cateid` = {$cateid}";
    
    $result = $mysqli->query($query);

    if ($result) {
      $retun_data = array("result" => 'success');
      echo json_encode($retun_data);
    } else {
      $retun_data = array("result" => 'error');
      echo json_encode($retun_data);
    }
  }
}

// if (isset($_POST['cateid'])) {
//   $cateid = $_POST['cateid'];

//   // Use prepared statement to prevent SQL injection
//   //$query = "DELETE FROM category WHERE cateid = ?";
//   $query = "DELETE FROM category WHERE `category`.`cateid` = {$cateid}";
  
//   // Prepare the statement
//   $stmt = $mysqli->prepare($query);
  
//   if ($stmt) {
//       // Bind the parameter
//       $stmt->bind_param("i", $cateid);
      
//       // Execute the statement
//       if ($stmt->execute()) {
//           $return_data = array("result" => 'success');
//           echo json_encode($return_data);
//       } else {
//           // $return_data = array("result" => 'error');
//           $return_data = array("result" => 'error', "message" => $stmt->error); // Include an error message for debugging
//           echo json_encode($return_data);
//       }
      
//       // Close the statement
//       $stmt->close();
//   } else {
//       $return_data = array("result" => 'error');
//       echo json_encode($return_data);
//   }
// }








	// if ($result) {
	// 	echo "1";
	// } else {
	// 	echo "error";
	// }

    // $stmt->bind_param("i", $cateid);

//     if ($stmt->execute()) {
//       $response = array("result" => "success");
//   } else {
//       $response = array("result" => "fail", "error" => $stmt->error); // Add error information
//   }
  

//     $stmt->close();
//     $mysqli->close();
// } else {
//     $response = array("result" => "fail");
// }

//echo json_encode($response);
?>
