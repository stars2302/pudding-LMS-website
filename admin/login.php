<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PUDDING</title>
    <!-- reset css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
      integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- normalize css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!--bootstrap css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
      integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- tabler-icons  -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
    />

    <!-- jquery ui css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
      integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- 스포카 -->
    <link
      href="//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSansNeo.css"
      rel="stylesheet"
      type="text/css"
    />

    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/login.css" />

    <!-- jquery js-->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
      integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <?php
    session_start();
    if(isset($_SESSION['AUID'])){
      if($_SESSION['AUID'] == 'admin'){
        echo "<script>
          alert('이미 로그인 하셨습니다.');
          location.href = '/pudding-LMS-website/admin/index.php';
        </script>";
      }
    }

    $js_route = "js/login.js";
    ?>
  </head>
  <body>
    <!-- DIALOG POPUP -->
    <dialog class="popup">
      <h2 class="content_stt bold">PUDDING - LMS 포트폴리오 사이트(3차 - 관리자페이지)</h2>
      <p>
        본 사이트는 구직용 포트폴리오 사이트이며, 실제로 운영되는 사이트가 아닙니다.
      </p>
      <p>
        프로젝트 주요 내용 : <span class="bold">프론트와 백엔드(php, mysql)를 연동</span>하여 페이지 구현
      </p>

      <hr>

      <div class="info">
        <p><span>제작기간</span> : 2023. 08. 14 - 08. 10</p>
        <p><span>특징</span> : html, css, jQuery, <span class="bold">bootstrap, php, mySql</span></p>
        <p>초보 관리자도 사용할 수 있도록 깔끔하고 직관적인 UI를 활용한 <span class="bold">LMS 관리자 사이트</span></p>
        <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span>기획/디자인 자료</span><i class="ti ti-brand-figma"></i></a>  |  <span>코드</span> : <a href="#" target="_blank" class="git"><span>깃허브</span><i class="ti ti-brand-github"></i></a></p>
        <p><span>구현 완료 페이지</span> : 모든 페이지 조회, 수정, 삭제, 로그인, 로그아웃</p>
      </div>

      <hr>

      <div class="work">
        <p><span>팀원</span> : 이*정, 김*림, 나*영, 박*인, 성*영, 채*석</p>
        <p><span>기획</span> : 전원참가</p>
        <dl>
          <dt><span>- 디자인 및 구현 -</span></dt>
          <dd><span>이*정</span> : 대시보드, 매출관리, 강의평 관리, 회원 관리</dd>
          <dd><span>김*림</span> : 대시보드, 강의 관리</dd>
          <dd><span>나*영</span> : 대시보드, 쿠폰관리</dd>
          <dd><span>박*인</span> : 대시보드, 강의 관리</dd>
          <dd><span>성*영</span> : Q&A</dd>
          <dd><span>채*석</span> : 공지사항</dd>
        </dl>
      </div>

      <hr>

      <div class="close_wrap d-flex justify-content-between">
        <div class="checkbox d-flex align-items-center">
          <input type="checkbox" id="daycheck" class="hidden">
          <label for="daycheck">
            <i class="fa-solid fa-check"></i>
            오늘 하루 안보기
          </label>
        </div>
        <button type="button" id="close" class="border">닫기</button>
      </div>
    </dialog>
    <!-- // DIALOG POPUP -->

    <main>
      <div class="login_box">
        <h1 class="main_tt loginlogo loginpage_logo">
          <a href="#">PUDDING</a>
        </h1>
        <form action="login_ok.php" method="POST">
          <h2 class="hidden">Admin Login</h2>
          <div
            class="input-group d-flex align-items-center base_mg_top shadow_box"
          >
            <label for="userid">id</label>
            <input
              type="text"
              class="form-control"
              name="userid"
              id="userid"
              placeholder="ID : admin"
              aria-label="userid"
              required
            />
          </div>
          <div
            class="input-group d-flex align-items-center base_mg_top shadow_box"
          >
            <label for="password">password</label>
            <input
              type="password"
              class="form-control"
              name="password"
              id="password"
              placeholder="PW : 1111"
              required
            />
          </div>
          <input
            type="submit"
            value="LOGIN"
            class="btn btn-primary main_stt login_btn base_mg_top"
          />
        </form>
      </div>
    </main>
    <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>