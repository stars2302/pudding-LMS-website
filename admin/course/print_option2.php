<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

$cate = $_POST['cate']; 
$step = $_POST['step'];

$html = "";
$query = "SELECT * FROM category WHERE step=".$step." and pcode='".$cate."'";
$result = $mysqli->query($query); 

while ($rs = $result->fetch_object()) {

$html .= "<li class=\"list-group-item big d-flex justify-content-between align-items-center\" value=\"" . $rs->cateid . "\" data-cate=\"" . $rs->cateid . "\" style=\"height: 45px\">
<span class=\"cate_size\">" . $rs->name . "</span>
<div class=\"cate_edit_btns d-flex gap-3\">
  <a href=\"#\" data-bs-toggle=\"modal\" data-bs-target=\"#cateModifyModal".$step."\"><i class=\"ti ti-edit pen_icon\"></i></a>
  <a href=\"#\"><i class=\"ti ti-trash bin_icon\"></i></a>
</div>
</li>";

}
echo $html;
?>