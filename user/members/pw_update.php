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
        <input type="text" class="form-control" id="userpasswd" name="userpasswd" placeholder="새 비밀번호"
          aria-label="Userid" />
        <label for="userpasswdcheck" class="hidden"></label>
        <input type="text" class="form-control" id="userpasswdcheck" name="userpasswdcheck" placeholder="새 비밀번호 변경"
          aria-label="Userpassword" />
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
          비밀번호 불일치
        </div>
        <div class="valid-feedback">
          비밀번호 일치
        </div>

        <button class="btn btn-primary dark">확인</button>
      </form>
    </div>
  </div>
</main>

<script>
  // 비밀번호 확인
  function isSame() {

    let pw = $('#userpasswd');
    let pwCheck = $('#userpasswdcheck');

    // if (pw.length < 6 || pw.length > 16) {
    //   window.alert('비밀번호는 6글자 이상, 16글자 이하만 이용 가능합니다.');
    //   document.getElementById('pw').value = document.getElementById('pwCheck').value = '';
    //   document.getElementById('same').innerHTML = '';
    // }
    if (pw.value != '' && pwCheck.value != '') {
      if (pw.value == pwCheck.value) {
        // document.getElementById('same').innerHTML = '비밀번호가 일치합니다.';
        // document.getElementById('same').style.color = 'blue';
        $('#userpasswdcheck').classList.remove('is-invalid');
        $('#userpasswdcheck').classList.add('is-valid');

      } else {
        $('#userpasswdcheck').classList.remove('is-valid');
        $('#userpasswdcheck').classList.add('is-invalid');
      }
    }

  }
  isSame();
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>