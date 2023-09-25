<?php
$title="장바구니";
$css_route="cart/css/cart.css";
$js_route = "cart/js/cart.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>


<div class="cart_complete shadow_box container radius_12 white_bg text-center d-flex flex-column justify-content-center align-items-center">
  <h2 class="main_tt">결제완료!</h2>
  <p class="b_text01">PUDDING을 이용해주셔서 감사합니다</p>
  <img src="images/cart_1.png" alt="">
  <a href="/pudding-LMS-website/user/mypage/mypage.php" class="btn btn-primary dark mt-3">강의보러가기</a>
</div>


<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>