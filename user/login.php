<?php
$title="로그인";
$css_route="css/login.css";
$js_route = "js/login.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
    <main class="pudding_bg">
      <div class="border_12 white_bg login_box d-flex">
        <div class="col-md-6 d-flex align-items-center">
          <img src="images/login/login.png" alt="" />
        </div>
        <div
          class="col-md-6 d-flex flex-column align-items-center justify-content-center"
        >
          <h2>
            Welcome to <img src="images/logo.png" alt="푸딩로고이미지" /> !
          </h2>
          <h3>LOGIN</h3>
          <form action="">
            <label for="userid" class="hidden"></label>
            <input
              type="text"
              class="form-control"
              id="userid"
              name="userid"
              placeholder="아이디"
              aria-label="Userid"
            />
            <label for="userpw" class="hidden"></label>
            <input
              type="text"
              class="form-control"
              id="userpw"
              name="userpw"
              placeholder="비밀번호"
              aria-label="Userpassword"
            />
            <button class="btn btn-primary dark">회원가입</button>
            <div
              class="form-check d-flex justify-content-end login_check gap-2"
            >
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="flexCheckDefault"
              />
              <label class="form-check-label" for="flexCheckDefault">
                아이디 저장
              </label>
            </div>
            <div class="id_pw d-flex justify-content-center">
              <a href="signup.html">회원가입</a>
              <a href="#">아이디 찾기</a>
              <a href="#">비밀번호 찾기</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <aside class="main_btn">
      <div class="history_btn">
        <a href="">
          <img src="images/clock-history.png" alt="" />
        </a>
      </div>
      <div class="top_btn">
        <a href="">
          <img src="images/top_btn.png" alt="" />
        </a>
      </div>
    </aside>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

