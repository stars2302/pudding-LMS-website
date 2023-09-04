<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

$cate = $_POST['cate']; //부모분류의 cid
$step = $_POST['step'];
$category = $_POST['category'];

$html = "<option selected disabled>".$category."</option>";
$query = "SELECT * FROM category WHERE step=".$step." and pcode='".$cate."'";
$result = $mysqli->query($query); //쿼리실행결과를 $result 할당

while ($rs = $result->fetch_object()) {
  $html .= "<option value=\"".$rs->cateid."\">".$rs->name."</option>";
}
echo $html;
?>