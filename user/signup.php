<?php
$title = "회원가입";
$css_route = "css/login.css";
$js_route = "js/login.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/header.php';
?>
<!-- uid	
userid
useremail
username
userpasswd
regdate
userimg -->

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
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <h3>SIGNUP</h3>
      <form action="signup_ok.php" class="signup_form" method="POST">
        <label for="userid">아이디</label>
        <div class="d-flex gap-2">
          <input type="text" class="form-control is-valid is-invalid" id="userid" name="userid" placeholder="아이디" aria-label="Userid"
            required />
          <button class="btn btn-dark duplication_btn"><span>중복</span></button>
        </div>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please provide a valid city.</div>
        
        <label for="userpasswd">비밀번호</label>
        <input type="text" class="form-control is-valid " id="userpasswd" name="userpasswd" placeholder="비밀번호"
          aria-label="Userpassword" required />
          <div class="valid-feedback">Looks good!</div>
          
        <label for="userpasswd">비밀번호 확인</label>
        <input type="text" class="form-control" id="userpasswd" name="userpasswd" placeholder="비밀번호 확인"
          aria-label="Userpassword" required />
        <label for="username">이름</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="이름" aria-label="Username"
          required />
        <label for="useremail">이메일</label>
        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="이메일"
          aria-label="Useremail" required />
        <div class="form-check">
          <input id="email" name="email" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            [필수] 개인정보 제공 동의
          </label>
        </div>
        <button class="btn btn-primary dark">회원가입</button>
      </form>
    </div>
  </div>
</main>






<script>

  //아아디 중복확인
  $('.signup_form .duplication_btn').click(function (e) {
    e.preventDefault();
    let userid = $('.userid').val();
    // let useremail = $('.useremail').val();

    let data = {
      userid: userid,
      // useremail: useremail
    }
    $.ajax({
      async: false,
      type: 'POST',
      url: 'signup_validate.php',
      data: data,
      dataType: 'json',
      error: function (error) {
        console.log(error);
      },
      function(returned_data) {
        if (returned_data.cnt > 0) {
          alert('입력하신 아이디는 이미 사용하실 수 없습니다.')
          return false;
        }
      }
    }) //a.jax end

  })
</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>