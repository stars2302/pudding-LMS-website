<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

  $cateid = $_POST['cateid']?? '';
  $name = $_POST['catename']?? '';
	// $step = $_POST['step'];

  var_dump( $cateid);
  $query = "UPDATE category SET name= '{$name}' WHERE cateid={$cateid}";
  // var_dump($query);
  $result = $mysqli->query($query);
  // var_dump($result);
  if ($result) {
    echo "<script>
    alert('카테고리 수정 완료되었습니다.');
    location.href='category.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . $result->error;
}
	$mysqli->close();
?> 
