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

<main class="pudding_bg">
  <div class="radius_12 white_bg login_box d-flex">
    <div class="col-md-6 d-flex align-items-center">
      <img src="/pudding-LMS-website/user/images/login/login.png" alt="로그인 이미지" />
    </div>
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <h2>
        Welcome to <img src="/pudding-LMS-website/user/images/logo.png" alt="푸딩로고이미지" /> !
      </h2>
      <h3>LOGIN</h3>
      <form action="login_ok.php" method="POST" class="login_form">
        <label for="userid" class="hidden"></label>
        <input type="text" class="form-control" id="userid" name="userid" placeholder="아이디" aria-label="Userid" />
        <label for="userpasswd" class="hidden"></label>
        <input type="password" class="form-control" id="userpasswd" name="userpasswd" placeholder="비밀번호"
          aria-label="Userpassword" />
        <button class="btn btn-primary dark">로그인</button>
        <div class="form-check d-flex justify-content-end login_check gap-2">
          <input class="form-check-input" type="checkbox" value="" id="idsave" name="idsave" />
          <label class="form-check-label" for="flexCheckDefault">
            아이디 저장
          </label>
        </div>
        <button type="button" onclick="loginWithKakao()">
          <img src="https://k.kakaocdn.net/14/dn/btroDszwNrM/I6efHub1SN5KCJqLm1Ovx1/o.jpg">
        </button>
        <div class="id_pw d-flex justify-content-center">
          <a href="/pudding-LMS-website/user/members/signup.php">회원가입 </a>
          <button type="button" class="" data-bs-toggle="modal" data-bs-target="#find_id">아이디 찾기</button>
          <button type="button" class="" data-bs-toggle="modal" data-bs-target="#find_pw">비밀번호 찾기</button>
        </div>
      </form>

      <!-- 아이디 찾기 Modal -->
      <div class="modal fade" id="find_id" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">아이디 찾기</h5>
            </div>
            <div class="modal-body">
              <form action="find_id.php" method="POST" id="find_id_form">
                <label for="username_id">이름</label>
                <input type="text" class="form-control" name="username" id="username_id" placeholder="이름">
                <label for="useremail_id">이메일</label>
                <input type="email" class="form-control" name="useremail" id="useremail_id" placeholder="이메일">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
              <button type="button" class="btn btn-primary" id="find_id_confirm_btn">확인</button>
            </div>
          </div>
        </div>
      </div>

      <!-- 비밀번호 찾기 Modal -->
      <div class="modal fade" id="find_pw" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">비밀번호 찾기</h5>
            </div>
            <div class="modal-body">
              <form action="find_pw.php" method="POST" id="find_pw_form">
                <label for="username_pw">이름</label>
                <input type="text" class="form-control" name="username" id="username_pw" placeholder="이름">
                <label for="userid_pw">아이디</label>
                <input type="text" class="form-control" name="userid" id="userid_pw" placeholder="아이디">
                <label for="useremail_pw">이메일</label>
                <input type="email" class="form-control" name="useremail" id="useremail_pw" placeholder="이메일">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
              <button type="button" class="btn btn-primary" id="find_pw_confirm_btn">확인</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<script>
  $(document).ready(function () {
    // 확인 버튼을 클릭할 때 폼을 제출
    $("#find_id_confirm_btn").click(function () {
      $("#find_id_form").submit();
    });
    $("#find_pw_confirm_btn").click(function () {
      $("#find_pw_form").submit();
    });

    // 쿠키 설정 함수
    function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + value + expires + "; path=/";
    }

    // 쿠키 가져오기 함수
    function getCookie(name) {
      var nameEQ = name + "=";
      var cookies = document.cookie.split(";");
      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == " ") {
          cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) == 0) {
          return cookie.substring(nameEQ.length, cookie.length);
        }
      }
      return null;
    }

    // 쿠키 삭제 함수
    function deleteCookie(name) {
      document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    var key = getCookie('SaveId');
    if (key != "") {
      $("#userid").val(key);
    }

    if ($("#userid").val() != "") {
      $("#idsave").attr("checked", true);
    }

    $("#idsave").change(function () {
      if ($("#idsave").is(":checked")) {
        setCookie('SaveId', $("#userid").val(), 7);
      } else {
        deleteCookie('SaveId');
      }
    });

    $("#userid").keyup(function () {
      if ($("#idsave").is(":checked")) {
        setCookie('SaveId', $("#userid").val(), 7);
      }
    });
  });

</script>

<script>
  Kakao.init('');

  function loginWithKakao() {
    Kakao.Auth.authorize({
      redirectUri: 'http://localhost/pudding-LMS-website/user/members/kakao_oauth.php',
    });
  }

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>