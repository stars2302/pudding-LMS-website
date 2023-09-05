<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

$cate = $_POST['cate']; //부모분류의 cid
$step = $_POST['step'];

$html = "";
$query = "SELECT * FROM category WHERE step=".$step." and pcode='".$cate."'";
$result = $mysqli->query($query); //쿼리실행결과를 $result 할당

while ($rs = $result->fetch_object()) {

$html .= "<li class=\"list-group-item big d-flex justify-content-between align-items-center\" value=\"" . $rs->cateid . "\" data-cate=\"" . $rs->cateid . "\" style=\"height: 45px\">
<span class=\"cate_size\">" . $rs->name . "</span>
<div class=\"cate_edit_btns d-flex gap-3\">
  <a href=\"#\"><i class=\"ti ti-edit pen_icon\"></i></a>
  <a href=\"#\"><i class=\"ti ti-trash bin_icon\"></i></a>
</div>
</li>";

}
echo $html;
?>