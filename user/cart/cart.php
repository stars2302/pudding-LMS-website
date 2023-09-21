<?php
$title="장바구니";
$css_route="cart/css/cart.css";
$js_route = "cart/js/cart.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/login_ok.php';



if(isset($_SESSION['UID'])){


  $userid = $_SESSION['UID'];//유저아이디
  // var_dump($userid); //gangbao

  //cart item 조회
  $sqlct = "SELECT c.*,ct.cartid FROM cart ct
          JOIN users u ON ct.userid = u.userid
          JOIN courses c ON c.cid = ct.cid
          WHERE u.userid = '{$userid}'
  
          ORDER BY ct.cartid DESC";
  
  
  $result = $mysqli-> query($sqlct);
  while($rs = $result->fetch_object()){
    $rscct[]=$rs;
  }
  
  //coupon 조회
  $sqlcp = "SELECT c.* FROM user_coupon uc
          JOIN users u ON uc.userid = u.userid
          JOIN coupons c ON c.cpid = uc.cpid
          WHERE u.userid = '{$userid}' AND (uc.use_max_date > NOW() OR uc.use_max_date IS NULL)
  
          ORDER BY uc.ucid DESC";
  
  
  $result = $mysqli-> query($sqlcp);
  while($rs = $result->fetch_object()){
    $rsccp[]=$rs;
  }
  // var_dump($rsccp);
}
else{
    echo"<script>
  alert('로그인 후 이용해주세요.');
  history.back();
  </script>";
}


?>


    <div class="cart_container container">
      <h2 class="jua main_tt">장바구니</h2>
        <div class="cartOpBtns d-flex justify-content-between col-8">
          <div class="form-check all_check d-flex align-items-center">
            <input class="form-check-input" type="checkbox" value="" id="all_check" checked>
            <label class="form-check-label" for="all_check">
              전체선택
            </label>
            <span>|<span class="select_count">0</span>개 (총 <span class="all_count">0</span>개)</span>
          </div>
          <button class="btn btn-primary dark select_del">선택삭제</button>
        </div>

      <div class="d-flex justify-content-between">
        <ul class="cart_item_container col-8 d-flex flex-column">
          <?php
          if(isset($rscct)){
            foreach($rscct as $cart){
          ?>


          <li class="cart_item shadow_box" data-cartid="<?= $cart->cartid ?>">
            <input class="form-check-input" type="checkbox" value="" id="cart_item<?= $cart->cartid ?>" checked>
            <label class="form-check-label" for="cart_item<?= $cart->cartid ?>"></label>
            <img src="<?= $cart->thumbnail ?>" alt="<?= $cart->name ?>" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3 class="b_text01"><?= $cart->name ?></h3>
                <span class="badge rounded-pill blue_bg b-pd">
                  <?php
                    //뱃지 키워드 
                    if (isset($cart->cate)) {
                      $categoryText = $cart->cate;
                      $parts = explode('/', $categoryText);
                      $lastPart = end($parts);

                      echo $lastPart;
                    }
                  ?>
                </span>
                <span class="badge rounded-pill b-pd
                  <?php
                  // 뱃지컬러
                  $levelBadge = $cart->level;
                  if ($levelBadge === '초급') {
                    echo 'yellow_bg';
                  } else if ($levelBadge === '중급') {
                    echo 'green_bg';
                  } else {
                    echo 'red_bg';
                  }
                  ?>
                "><?= $cart->level ?></span>
              </div>
              <div class="descript">
                <p><?= $cart->content ?></p>
              </div>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span><?= $cart->due ?></span>
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <!-- <span class="price content_tt"><span class="number"><?= $cart->price ?></span>원</span> -->
            <!-- 무료표시하기 -->
            <?php
            if($cart->price_status != "무료"){
            ?>
              <span class="price content_tt"><span class="number"><?= $cart->price ?></span>원</span>
            <?php
            }else{
            ?>
              <span class="price content_tt">무료</span>
            <?php 
            } 
            ?>
            <!-- 무료표시 끝 -->
          </li>


          <?php
            }
          }else {
          ?>
          <li class="no_cart_container">
            <img src="images/cart_2.png" alt="장바구니가 비어있어서 슬픈 푸딩 이미지" class="no_cart_img">
            <p class="content_stt">장바구니에 담긴 강의가 없습니다.</p>
            <a href="/pudding-LMS-website/user/index.php" class="btn btn-primary dark">홈으로이동</a>
          </li>
            <!-- echo '장바구니에 담긴 강의가 없습니다.<a href="/pudding-LMS-website/user/index.php"><i class="ti ti-home"></i> 홈으로 이동</a>'; -->
          <?php
          }
          ?>
        </ul>




        <div class="form_container col-4">
          <form action="" method="POST" class="payment_form radius_12 shadow_box">
            <input type="hidden" value="<?= $userid ?>" class="userid">
            <!-- <input type="hidden" value="" class="cartid">
            <input type="hidden" value="" class="total_price">
            <input type="hidden" value="" class="discount_price"> -->

            <h3 class="content_stt">결제정보</h3>
            <h4 class="demoHeaders style_pd b_text02">쿠폰선택</h4>
            <select class="selectmenu coupon_select">
              <option value="" disabled selected class="default">보유하고 있는 쿠폰</option>



              <?php
              if(isset($rsccp)){
                foreach($rsccp as $coupon){
              ?>

              <option value="<?= $coupon->cpid ?>" data-discount="<?php if($coupon->cp_type == '정률'){echo $coupon->cp_ratio;} else{echo $coupon->cp_price;} ?>" data-type="<?= $coupon->cp_type ?>" data-limit="<?= $coupon->cp_limit ?>"><?= $coupon->cp_name ?></option>

              <?php
                }
              }
              ?>



            </select>
            <hr>
            <div class="payment_info d-flex justify-content-between">
              <p>상품 수 :</p><p><span class="cart_count number">0</span>개</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>상품금액 :</p><p><span class="cart_total_price number">0</span>원</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>할인가 :</p><p>- <span class="cart_discount number">0</span><span class="discount_unit">원</span></p>
            </div>
            <hr>
            <div class="payment_total d-flex justify-content-between align-items-center">
              <p class="b_text01">총 결제금액</p><p class="content_tt"><span class="cart_pay_price number">0</span>원</p>
            </div>
            <button class="btn btn-primary dark submit_btn">구매하기</button>
          </form>
        </div>
      </div>
    </div>

    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>