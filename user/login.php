<?php
$title = "로그인";
$css_route = "css/login.css";
$js_route = "js/login.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/header.php';

if (isset($_SESSION['UID'])) {
  echo "<script>
      alert('이미 로그인 하셨습니다.');
      location.href = '/pudding-LMS-website/user/index.php';
    </script>";
}
?>


<!-- uid	
userid
useremail
username
userpasswd
regdate
userimg -->

<main class="pudding_bg">
  <div class="radius_12 white_bg login_box d-flex">
    <div class="col-md-6 d-flex align-items-center">
      <img src="images/login/login.png" alt="" />
    </div>
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <h2>
        Welcome to <img src="images/logo.png" alt="푸딩로고이미지"/> !
      </h2>
      <h3>LOGIN</h3>
      <form action="login_ok.php" method="POST">
        <label for="userid" class="hidden"></label>
        <input type="text" class="form-control" id="userid" name="userid" placeholder="아이디" aria-label="Userid" />
        <label for="userpasswd" class="hidden"></label>
        <input type="text" class="form-control" id="userpasswd" name="userpasswd" placeholder="비밀번호"
          aria-label="Userpassword" />
        <button class="btn btn-primary dark">로그인</button>
        <button type="button" onclick="loginWithKakao()">
          <img src="https://k.kakaocdn.net/14/dn/btroDszwNrM/I6efHub1SN5KCJqLm1Ovx1/o.jpg">
        </button>
        <div class="form-check d-flex justify-content-end login_check gap-2">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            아이디 저장
          </label>
        </div>
        <div class="id_pw d-flex justify-content-center">
          <a href="/pudding-LMS-website/user/signup.php">회원가입</a>
          <a href="#">아이디 찾기</a>
          <a href="#">비밀번호 찾기</a>
        </div>
      </form>
    </div>
  </div>
</main>
<script>
Kakao.init('');

function loginWithKakao() {
    Kakao.Auth.authorize({
        redirectUri: 'http://localhost/pudding-LMS-website/user/kakao_oauth.php', // 앞서 등록한 Redirect URI
    });
}

</script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>