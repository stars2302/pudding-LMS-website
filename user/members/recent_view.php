<?php
// $cid = $_GET['cid'];
$i = 0; //쿠키에 상품정보를 등록할 때 사용할 인덱스
// $rvc = [];
//유림 최근본 상품
if(isset($_COOKIE['recent_view_course'])){ //recent_view_course 쿠키 존재유무
  $rvc = json_decode($_COOKIE['recent_view_course']);//쿠키의 json값을 배열로 변경

  if(!in_array($rs, $rvc)){
    // $rvc[] = $rs;
      if(sizeof($rvc)>=3){ //이미 3개의 쿠키가 있다면 
        unset($rvc[0]); //배열의 첫번째 값을 지운다.
      }
      ksort($rvc); //연관배열의 키값을 기준으로 오름차순, abc 순으로

      foreach ($rvc as $cc) {
          $rvarr[$i] = $cc; //오름차순 정렬된 값을 새배열에 할당.
          $i++;
      }
      $rvarr[$i] = $rs; //배열에 마지막에 현재상품정보를 추가
      $ckval = json_encode($rvarr);//쿠키에 넣기전에 쿠키형식으로 encode;
      setcookie('recent_view_course', $ckval, time()+86400); //24시간유지되는 쿠키 생성
  }
} else{
  //recent_view_course 쿠키 생성
  $rvarr[$i] = $rs; //배열에 마지막에 현재상품정보를 추가
  $ckval = json_encode($rvarr);//쿠키에 넣기전에 쿠키형식으로 encode;
  setcookie('recent_view_course', $ckval, time()+86400); //24시간유지되는 쿠키 생성
  // setcookie('recent_view_course', json_encode($recentlyViewedCourses), time() + 86400);


}


?>