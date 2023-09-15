<?php
$title="회원가입";
$css_route="css/login.css";
$js_route = "js/login.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
    <main class="pudding_bg">
      <div class="radius_12 white_bg signup_box d-flex">
        <div class="col-md-6 d-flex align-items-center">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="images/login/signup_slide_01.png" alt="푸딩 프로모션"></div>
              <div class="swiper-slide"><img src="images/login/signup_slide_02.png" alt="푸딩 프로모션"></div>
              <div class="swiper-slide"><img src="images/login/signup_slide_03.png" alt="푸딩 프로모션"></div>
              <div class="swiper-slide"><img src="images/login/signup_slide_04.png" alt="푸딩 프로모션"></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div
          class="col-md-6 d-flex flex-column align-items-center justify-content-center"
        >
          <h3>SIGNUP</h3>
          <form action="">
            <label for="userid">아이디</label>
            <input
              type="text"
              class="form-control"
              id="userid"
              name="userid"
              placeholder="아이디"
              aria-label="Userid"
              required
            />
            <label for="userpw">비밀번호</label>
            <input
              type="text"
              class="form-control"
              id="userpw"
              name="userpw"
              placeholder="비밀번호"
              aria-label="Userpassword"
              required
            />
            <label for="userpw">비밀번호 확인</label>
            <input
              type="text"
              class="form-control"
              id="userpw"
              name="userpw"
              placeholder="비밀번호 확인"
              aria-label="Userpassword"
              required
            />
            <label for="username">이름</label>
            <input
              type="text"
              class="form-control"
              id="username"
              name="username"
              placeholder="이름"
              aria-label="Username"
              required
            />
            <label for="useremail">이메일</label>
            <input
              type="email"
              class="form-control"
              id="useremail"
              name="useremail"
              placeholder="이메일"
              aria-label="Useremail"
              required
            />
            <div class="form-check">
              <input id="email"
              name="email"
                class="form-check-input"
                type="checkbox"
                value=""
                id="flexCheckDefault"
              />
              <label class="form-check-label" for="flexCheckDefault">
                [필수] 개인정보 제공 동의
              </label>
            </div>
            <button class="btn btn-primary dark">회원가입</button>
          </form>
        </div>
      </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
