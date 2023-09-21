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
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
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
                <label for="username">이름</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="이름">
                <label for="useremail">이메일</label>
                <input type="email" class="form-control" name="useremail" id="useremail" placeholder="이메일">
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
                <label for="username">이름</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="이름">
                <label for="userid">아이디</label>
                <input type="text" class="form-control" name="userid" id="userid" placeholder="아이디">
                <label for="useremail">이메일</label>
                <input type="email" class="form-control" name="useremail" id="useremail" placeholder="이메일">
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


  var key = getCookie('idsave');
  $('#userid').val(key);


  // if ($('#userid').val() != "") {               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
  //   $('#flexCheckDefault').attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
  // }
  // $('#flexCheckDefault').change(function () { // 체크박스에 변화가 있다면,
  //   if ($('#flexCheckDefault').is(":checked")) { // ID 저장하기 체크했을 때,
  //     setCookie("key", $("#userid").val(), 2); // 하루 동안 쿠키 보관
  //   } else { // ID 저장하기 체크 해제 시,
  //     deleteCookie("key");
  //   }
  // });

    $('.login_form button').click(function () {
      if ($('#flexCheckDefault').checked) {
        let saveIdValue = $('#userid').val();
      setCookie('idSave', saveIdValue, 7);
      } else {
        setCookie('idSave', saveIdValue, 7);
      }


    }); //로그인 폼 클릭시 할일 end

    


  });




  // var key = getCookie('idSave'); 
  // if(key!=""){
  //   $("#userid").val(key); 
  // }
   
  // if($("#userid").val() != ""){ 
  //   $("#flexCheckDefault").attr("checked", true); 
  // }
   
  // $("#flexCheckDefault").change(function(){ 
  //   if($("#flexCheckDefault").is(":checked")){ 
  //     setCookie('idSave', $("#userid").val(), 7); 
  //   }else{ 
  //     deleteCookie('idSave');
  //   }
  // });
   
  // $("#userid").keyup(function(){ 
  //   if($("#flexCheckDefault").is(":checked")){
  //     setCookie('idSave', $("#userid").val(), 7); 
  //   }
  // });

//킵시작

  // var key = getCookie('idsave'); 
  // if(key!=""){
  //   $("#userid").val(key); 
  // }

  // if($("#userid").val() != ""){ 
  //   $("#saveId").attr("checked", true); 
  // }

  // $("#saveId").change(function(){ 
  //   if($("#saveId").is(":checked")){ 
  //     setCookie('admin', $("#userid").val(), 7); 
  //   }else{ 
  //     deleteCookie('admin');
  //   }
  // });

  // $("#userid").keyup(function(){ 
  //   if($("#saveId").is(":checked")){
  //     setCookie('admin', $("#userid").val(), 7); 
  //   }
  // });
//킵 엔드

 



  // //저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
  // var key = getCookie('idsave');
  // $('#userid').val(key);


  // if ($('#userid').val() != "") {               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
  //   $('#flexCheckDefault').attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
  // }
  // $('#flexCheckDefault').change(function () { // 체크박스에 변화가 있다면,
  //   if ($('#flexCheckDefault').is(":checked")) { // ID 저장하기 체크했을 때,
  //     setCookie("key", $("#userid").val(), 2); // 하루 동안 쿠키 보관
  //   } else { // ID 저장하기 체크 해제 시,
  //     deleteCookie("key");
  //   }
  // });

  // // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
  // $("#id").keyup(function () { // ID 입력 칸에 ID를 입력할 때,
  //   if ($("#idsave").is(":checked")) { // ID 저장하기를 체크한 상태라면,
  //     setCookie("key", $("#userid").val(), 2); // 7일 동안 쿠키 보관
  //   }
  // });


  // //쿠키 함수 
  // function setCookie(cookieName, value, exdays) {
  //   var exdate = new Date();
  //   exdate.setDate(exdate.getDate() + exdays);
  //   var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
  //   document.cookie = cookieName + "=" + cookieValue;
  // }

  // function deleteCookie(cookieName) {
  //   var expireDate = new Date();
  //   expireDate.setDate(expireDate.getDate() - 1);
  //   document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
  // }

  // function getCookie(cookieName) {
  //   cookieName = cookieName + '=';
  //   var cookieData = document.cookie;
  //   var start = cookieData.indexOf(cookieName);
  //   var cookieValue = '';
  //   if (start != -1) {
  //     start += cookieName.length;
  //     var end = cookieData.indexOf(';', start);
  //     if (end == -1) end = cookieData.length;
  //     cookieValue = cookieData.substring(start, end);
  //   }
  //   return unescape(cookieValue);
  // }
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