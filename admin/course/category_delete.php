<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';


if (isset($_POST['cateid']) && !empty($_POST['cateid'])) {
if (isset($_POST['cateid'])) {
    $cateid = $_POST['cateid'];

    $query = "DELETE FROM category WHERE cateid = {$cateid} ";
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

?>
