<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

$cate1 = $_POST['cate1']; //부모분류의 cid
$cate2 = $_POST['cate2'] ?? ''; //부모분류의 cid
// $cate3 = $_POST['cate3'] ?? '';//부모분류의 cid


$where ='';
$cateid = '';

if($cate1){
  $where = " and step=2 and pcode = '${cate1}'";
  $cateid = $cate1;
};
if($cate2){
  $where = " and step=3 and pcode = '${cate2}'";
  $cateid = $cate2;
}
// if($cate3){
//   $where = " and step=3 and pcode = '${cate3}'";
// }

$query1 = "SELECT name FROM category WHERE cateid= '${cateid}'";
$result1 = $mysqli->query($query1); //쿼리실행결과를 $result 할당
$rs1 = $result1->fetch_object();


$query = "SELECT * FROM category WHERE 1=1";
$query .= $where;
$result = $mysqli->query($query); //쿼리실행결과를 $result 할당

while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}

if(!$rsc){
  $return_data = array("result"=> 'fail'); 
  echo json_encode($return_data);
  exit;
}else{
  $return_data = array("catename" => $rs1-> name ,"result"=> $rsc); 
  echo json_encode($return_data);
  exit;
}

// $return_data = array("result"=> $rsc); 
// echo json_encode($return_data);
// exit;
?>