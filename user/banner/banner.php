<?php
$title="오늘의쿠폰";
$css_route="banner/css/banner.css";
$js_route = "banner/js/banner.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

if(!isset($_SESSION['UID'])){
  echo"<script>
  alert('로그인이 필요합니다.');
  location.href = '/pudding-LMS-website/user/members/login.php';
  </script>";
}
?>


<div class="container d-flex justify-content-center flex-column align-items-center game_start_container">
  <div class="game_start text-center jua col-6 white_bg radius_12 shadow_box">
    <h2>
      <span class="star main_tt">★★★</span><br>
      WORDLE 게임 
    </h2>
    <p class="main_stt">
      게임 풀고 강의 할인 받자!<br>
      10,000원 할인 쿠폰 증정
    </p>
    <a href="/pudding-LMS-website/user/banner/banner_game.php" class="btn btn-dark content_tt">game start</a>
  </div>
  <img src="images/pudding_1.png" alt="" class="col-4">
</div>




<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
