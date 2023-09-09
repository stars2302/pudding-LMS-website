<?php
$prevImg = $_POST['prevImg']??'';
$prevImgDel = $_SERVER['DOCUMENT_ROOT'].$prevImg;
unlink($prevImgDel);
echo json_encode($prevImgDel);
exit;
?>