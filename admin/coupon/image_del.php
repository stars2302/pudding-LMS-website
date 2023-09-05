<?php
$prevImg = $_POST['prevImg']??'';
$prevImgDel = $_SERVER['DOCUMENT_ROOT'].$prevImg;
unlink($prevImgDel);//이미지 삭ㅈㅔ
echo json_encode($prevImgDel);
exit;
?>