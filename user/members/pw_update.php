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

$uid = $_GET['uid'];

?>
<main class="pudding_bg">
  <div class="radius_12 white_bg login_box d-flex">
    <div class="col-md-6 d-flex align-items-center">
      <img src="/pudding-LMS-website/user/images/login/login.png" alt="로그인 이미지" />
    </div>
    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
      <h3>비밀번호 변경</h3>
      <form action="pw_update_ok.php?uid=<?= $uid ?>" method="POST">
        <label for="userpasswd" class="hidden"></label>
        <input type="password" class="form-control" id="userpasswd" name="userpasswd" placeholder="새 비밀번호"
          aria-label="Userid" />
        <div class="invalid-feedback">6~20글자, 영문자, 숫자, 특수문자 조합 필수입니다.</div>
        <div class="valid-feedback">사용가능한 비밀번호입니다.</div>

        <label for="userpasswdcheck" class="hidden"></label>
        <input type="password" class="form-control" id="userpasswdcheck" name="userpasswdcheck" placeholder="새 비밀번호 변경"
          aria-label="Userpassword" />
        <div class="invalid-feedback">비밀번호가 일치하지 않습니다.</div>

        <button class="btn btn-primary dark">확인</button>
      </form>
    </div>
  </div>
</main>

<script>

  
  //비밀번호 규칙 확인
  //input 요소의 값이 변경될 때 실행
  let userpw = $('#userpasswd');

  userpw.on('input', function () {
    let pwValue = $(this).val();

    // 정규식 패턴 : 6글자 이상 20글자 미만, 영문자, 숫자, 특수문자 조합
    var pwRule = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,20}$/;
    if (pwRule.test(pwValue)) {
      userpw.removeClass('is-invalid');
      userpw.addClass('is-valid');
    } else {
      userpw.removeClass('is-valid');
      userpw.addClass('is-invalid');
    }
  });

  //비밀번호 일치 여부 확인
  let pwcheck = $('#userpasswdcheck');
  pwValue = userpw.val();

  pwcheck.on('input', function () {
    let password = $('#userpasswd').val();
    let confirmPassword = $(this).val();

    if (password === confirmPassword) {
      pwcheck.removeClass('is-invalid');
      pwcheck.addClass('is-valid');
    } else {
      pwcheck.removeClass('is-valid');
      pwcheck.addClass('is-invalid');
    }
  });

</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>