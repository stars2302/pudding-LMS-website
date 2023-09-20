<?php
$title="오늘의쿠폰";
$css_route="banner/css/banner.css";
$js_route = "banner/js/banner.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
}
else{
  echo"<script>
alert('로그인 후 이용해주세요.');
history.back();
</script>";
}
?>

<div class="container d-flex justify-content-center flex-column align-items-center game_winner_container">
  <div class="game_winner text-center jua col-5 white_bg radius_12 shadow_box">
    <h2 class="main_tt">
      MISSON COMPLETE!
    </h2>
    <p class="b_text01">
    축하합니다! 오늘의 푸딩 게임에서 승리하셨습니다 💛
    </p>
    <button>
      <img src="images/coupon.png" alt="" class="coupon" data-user="<?= $userid ?>">
    </button>
  </div>

  <img src="images/pudding_3.png" alt="" class="col-5">
</div>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>