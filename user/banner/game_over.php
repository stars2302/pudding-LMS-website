<?php
$title="오늘의쿠폰";
$css_route="banner/css/banner.css";
$js_route = "banner/js/banner.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
if(!isset($_SESSION['UID'])){
  echo"<script>
  alert('로그인 후 이용해주세요.');
  location.href = '/pudding-LMS-website/user/members/login.php';
  </script>";
}
?>


<div class="container d-flex justify-content-center flex-column align-items-center game_over_container">
  <div class="game_over text-center jua col-3 white_bg radius_12 shadow_box">
    <h2 class="main_tt">
      LOSE....
    </h2>
    <p class="b_text01">
    다음 기회에 다시 도전하세요!
    </p>
    <a href="/pudding-LMS-website/user/index.php" class="btn btn-primary">홈으로 이동</a>
  </div>

  <img src="images/pudding_4.png" alt="" class="col-4">
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>