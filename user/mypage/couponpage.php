<?php
$title="마이페이지 - 쿠폰함";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
          <ul>
          <li class="content_stt link_tag"><a href="/pudding-LMS-website/user/mypage/mypage.php">내 강의실</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/buypage.php">구매내역</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/couponpage.php">쿠폰함</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/review_list.php">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">쿠폰함</h1>
      <div class="d-flex justify-content-between conpon_box">
        <div class="d-flex flex-column coupon_box_able radius_5">
          <div class="able d-flex">
            <i class="ti ti-circle-check"></i>
            <h6>사용가능한 쿠폰</h6>
          </div>
          <div class="able d-flex justify-content-end align-items-center">
            <h1>3</h1>
            <span>개</span>
          </div>
        </div>

        <div class="d-flex flex-column coupon_box_able radius_5">
          <div class="able d-flex">
            <i class="ti ti-alarm"></i>
            <h6>만료임박 쿠폰</h6>
          </div>
          <div class="able d-flex justify-content-end align-items-center">
            <h1><a href="#">1</a></h1>
            <span>개</span>
          </div>
        </div>
      </div>
    </section>
    <section class="content_wrap_cp">
      <div class="coupons">
        <h2 class="hidden">쿠폰리스트</h2>
        <ul class="d-flex flex-wrap justify-content-between g-5">
          <li class="coupon shadow_box radius_5 white_bg d-flex">
            <img
              src="../images/pdata/users/coupon1.png"
              alt=""
              class="radius_5"
            />
            <div class="text_box">
              <h3 class="b_text01">회원가입 축하 쿠폰</h3>
              <p>사용기한 : 무제한</p>
              <p>최소사용금액 : 50,000원</p>
              <p>할인율 : 10%</p>
            </div>
          </li>
          <li class="coupon shadow_box radius_5 white_bg d-flex">
            <img
              src="../images/pdata/users/coupon1.png"
              alt=""
              class="radius_5"
            />
            <div class="text_box">
              <h3 class="b_text01">회원가입 축하 쿠폰</h3>
              <p>사용기한 : 무제한</p>
              <p>최소사용금액 : 50,000원</p>
              <p>할인율 : 10%</p>
            </div>
          </li>
          <li class="coupon shadow_box radius_5 white_bg d-flex">
            <img
              src="../images/pdata/users/coupon1.png"
              alt=""
              class="radius_5"
            />
            <div class="text_box">
              <h3 class="b_text01">회원가입 축하 쿠폰</h3>
              <p>사용기한 : 무제한</p>
              <p>최소사용금액 : 50,000원</p>
              <p>할인율 : 10%</p>
            </div>
          </li>
          <li class="coupon shadow_box radius_5 white_bg d-flex">
            <img
              src="../images/pdata/users/coupon1.png"
              alt=""
              class="radius_5"
            />
            <div class="text_box">
              <h3 class="b_text01">회원가입 축하 쿠폰</h3>
              <p>사용기한 : 무제한</p>
              <p>최소사용금액 : 50,000원</p>
              <p>할인율 : 10%</p>
            </div>
          </li>
        </ul>
      </div>
    </section>

    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

