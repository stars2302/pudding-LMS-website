<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';

  $cid = $_REQUEST['cid'];
  $ismain=$_REQUEST["ismain"] ?? []; //값이 없으면 빈배열로
  $isnew=$_REQUEST["isnew"] ?? [];
  $isbest=$_REQUEST["isbest"] ?? [];
  $isrecom=$_REQUEST["isrecom"] ?? [];
  $stat=$_REQUEST["stat"] ?? [];

  foreach($cid as $c){
    $ismain[$p] = $ismain[$p] ?? 0; //배열에 값이 없으면 0
    $isnew[$p] = $isnew[$p] ?? 0;
    $isbest[$p] = $isbest[$p] ?? 0;
    $isrecom[$p] = $isrecom[$p] ?? 0;
    $stat[$p] = $stat[$p] ?? 0;

    $query = "UPDATE course SET ismain=".$ismain[$p].", isnew=".$isnew[$p].", isbest=".$isbest[$p].", isrecom=".$isrecom[$p].", status=".$stat[$p]." where pid=".$p;
    $rs=$mysqli->query($query) or die($mysqli->error);    

}
 if($rs){
  echo "<script>
    alert('일괄 수정 되었습니다.');
    history.back();
  </script>";
 } else{
  echo "<script>
    alert('일괄 수정 실패!');
    history.back();
  </script>";
 }

  



  ?>