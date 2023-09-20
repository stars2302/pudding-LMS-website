<?php
$title = "회원가입";
$css_route = "css/login.css";
$js_route = "js/signup.js";
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
          <div class="swiper-slide"><img src="/pudding-LMS-website/user/images/login/signup_slide_01.png" alt="푸딩 프로모션">
          </div>
          <div class="swiper-slide"><img src="/pudding-LMS-website/user/images/login/signup_slide_02.png" alt="푸딩 프로모션">
          </div>
          <div class="swiper-slide"><img src="/pudding-LMS-website/user/images/login/signup_slide_03.png" alt="푸딩 프로모션">
          </div>
          <div class="swiper-slide"><img src="/pudding-LMS-website/user/images/login/signup_slide_04.png" alt="푸딩 프로모션">
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <h3>SIGNUP</h3>
      <form action="signup_ok.php" class="signup_form needs-validation" method="POST" novalidate
        enctype="multipart/form-data">
        <!-- <form action="" class="signup_form needs-validation" method="POST" novalidate enctype="multipart/form-data"> -->
        <!-- <input type="hidden" name="userid" class="userid"> -->
        <label for="userid">아이디</label>
        <div class="d-flex gap-2 justify-content-between">
          <div class="id_valid_wrap">
            <input type="text" class="form-control userid " id="userid" name="userid" placeholder="아이디"
              aria-label="Userid" required />
            <div class="invalid-feedback">사용불가한 아이디입니다. </div>
            <div class="valid-feedback">사용가능한 아이디입니다.</div>
          </div>
          <button type="button" class="btn btn-dark duplication_btn"><span>중복</span></button>
        </div>


        <label for="userpasswd">비밀번호</label>
        <input type="password" class="form-control userpasswd" id="userpasswd" name="userpasswd" placeholder="비밀번호"
          aria-label="Userpassword" required />
        <div class="invalid-feedback">6~20글자, 영문자, 숫자, 특수문자 조합 필수입니다.</div>
        <div class="valid-feedback">사용가능한 비밀번호입니다.</div>

        <label for="userpasswd_check">비밀번호 확인</label>
        <input type="password" class="form-control" id="userpasswd_check" name="userpasswd_check" placeholder="비밀번호 확인"
          aria-label="Userpassword" required />
        <div class="invalid-feedback">비밀번호가 일치하지 않습니다.</div>
        <!-- <div class="valid-feedback">비밀번호 일치</div> -->
        <div class="valid-feedback"></div>

        <label for="username">이름</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="이름" aria-label="Username"
          required />

        <label for="useremail">이메일</label>
        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="이메일"
          aria-label="Useremail" required />
        <div class="invalid-feedback">이메일을 올바르게 입력해주세요.</div>

        <div class="file_input">
          <label for="userimg" class="form-label">프로필 이미지</label>
          <input type="file" class="form-control" name="userimg" id="userimg">
        </div>

        <div class="form-check">
          <input id="email" name="email" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            [필수] 개인정보 제공 동의
          </label>
        </div>
        <button class="btn btn-primary dark" id="signup_btn">회원가입</button>
      </form>
    </div>
  </div>
</main>






<script>



  //아이디 중복확인
  $userid = $('.userid');
  $('.signup_form .duplication_btn').click(function (e) {
    e.preventDefault();
    let userid = $userid.val();

    let data = {
      userid: userid,
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
      success: function (return_data) {
        if (return_data.cnt > 0) {
          $userid.removeClass('is-valid');
          $userid.addClass('is-invalid');
          return false;
        }
        else {
          $userid.removeClass('is-invalid');
          $userid.addClass('is-valid');
        }
      }
    }) //ajax end
  })  //아이디 중복확인 end


  //비밀번호 규칙 확인
  // input 요소의 값이 변경될 때 실행
  let userpw = $('.userpasswd');
  let pwcheck = $('#userpasswd_check');
  let username = $('#username');

  pwcheck.removeClass('is-valid');
  pwcheck.removeClass('is-invalid');
  username.removeClass('is-valid');
  username.removeClass('is-invalid');


  userpw.on('input', function () {
    let pwValue = $(this).val();
    // let pwValue = userpw.val();


    // 정규식 패턴: 6글자 이상 20글자 미만, 영문자, 숫자, 특수문자 조합
    var pwRule = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,20}$/;
    if (pwRule.test(pwValue)) {
      userpw.removeClass('is-invalid');
      userpw.addClass('is-valid');
    } else {
      userpw.removeClass('is-valid');
      userpw.addClass('is-invalid');
    }
  });

  //비밀번호 입력 확인
  // let pwcheck = $('#userpasswd_check');
  pwValue = userpw.val();

  $('#userpasswd_check').on('input', function () {
    let password = $('.userpasswd').val();
    let confirmPassword = $(this).val();

    if (password === confirmPassword) {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
      // $(this).siblings('.valid-feedback').text(`비밀번호 일치`);
      $(this).addClass('is-valid');


    } else {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    }
  });

  //이름 입력 여부 확인
  // let username = $('#username');
  username.on('input', function () {
    let nameValue = $(this).val();
    if (nameValue != '') {
      username.addClass('is-valid');
    }
  });


  //이메일 

  let useremail = $('#useremail');
  useremail.on('input', function () {
    let emailValue = $(this).val();

    // 정규식 패턴: 이메일 형식
    var emailRule = /^[a-zA-Z0-9+-\_.]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    if (emailRule.test(emailValue)) {
      useremail.removeClass('is-invalid');
      useremail.addClass('is-valid');
    } else {
      useremail.removeClass('is-valid');
      useremail.addClass('is-invalid');
    }
  });

  //회원가입
  $('#signup_btn').click(function (e) {
    e.preventDefault();
    // let userid = $('.userid').val();
    // let useremail = $('useremail').val();
    // let userpasswd = $('.userpasswd').val();
    // let username = $('username').val();

    // let data = {
    //   userid: userid,
    //   useremail: useremail,
    //   userpasswd: userpasswd,
    //   username: username
    // }
    // $.ajax({
    //   async: false,
    //   type: 'post',
    //   url: 'signup_validate.php',
    //   data: data,
    //   dataType: 'json',
    //   error: function (error) {
    //     console.log(error);
    //   },
    //   success: function (returned_data) {
    //     if (returned_data.cnt > 0) {
    //       alert('입력한 아이디 또는 이메일은 이미 가입된 정보입니다.');
    //       return false;
    //     } else {
    $('.signup_form').submit();
    //     }
    //   }
    // })
  })
</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>