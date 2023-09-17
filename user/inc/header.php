<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="apple-touch-icon" sizes="57x57"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16"
    href="/pudding-LMS-website/admin/images/pudding_favicon.ico/favicon-16x16.png">
  <link rel="manifest" href="/pudding-LMS-website/admin/images/pudding_favicon.ico/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- reset css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
    integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- normalize css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--bootstrap css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
    integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- tabler-icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
  <!-- jquery ui css -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
    integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- nice select css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
  <!-- Noto Sans KR -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap"
    rel="stylesheet" />
  <!-- swiper -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.css"
    integrity="sha512-EDXaYrpumQKF+Ic8nuEsgJWBwMOhgwWvNINclFu91nx5VR4MeZ5xlUvyRaYQJTMImwbXSeDjtZMtTs8EB65Z0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="css/jqueryui/jquery-ui.theme.min.css" />
  <link rel="stylesheet" href="/pudding-LMS-website/user/css/common.css" />
  <link rel="stylesheet" href="/pudding-LMS-website/user/<?php if (isset($css_route)) {
    echo $css_route;
  } else {
    echo 'css/index.css';
  }
  ; ?>">

  <title>
    <?php if (isset($title)) {
      echo $title;
    } else {
      echo 'home';
    }
    ; ?> - PUDDING
  </title>

  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <header class="">
    <div class="container d-flex align-items-center">
      <a href="/pudding-LMS-website/user/index.php">
        <h1 class="logo">로고</h1>
      </a>
      <!-- <h1 class="logo"><a href="/pudding-LMS-website/user/index.php">로고</a></h1> -->
      <nav>
        <ul class="d-flex">
          <li><a href="/pudding-LMS-website/user/course/course_list.php">강의 클래스</a></li>
          <li><a href="">이벤트</a></li>
          <li><a href="">커뮤니티</a></li>
          <!-- <li><a href="">ABOUT US</a></li> -->
        </ul>
      </nav>
      <div>
        <a href="/pudding-LMS-website/user/cart/cart.php" class="icon cart">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M0 5C0 4.73478 0.105357 4.48043 0.292893 4.29289C0.48043 4.10536 0.734784 4 1 4H4C4.22306 4.00006 4.4397 4.0747 4.61546 4.21205C4.79122 4.3494 4.91602 4.54157 4.97 4.758L5.78 8H29C29.1519 8.00004 29.3018 8.03469 29.4383 8.10131C29.5748 8.16792 29.6943 8.26477 29.7878 8.38448C29.8813 8.50419 29.9463 8.64363 29.9779 8.79222C30.0095 8.9408 30.0068 9.09462 29.97 9.242L26.97 21.242C26.916 21.4584 26.7912 21.6506 26.6155 21.788C26.4397 21.9253 26.2231 21.9999 26 22H8C7.77694 21.9999 7.5603 21.9253 7.38454 21.788C7.20878 21.6506 7.08398 21.4584 7.03 21.242L3.22 6H1C0.734784 6 0.48043 5.89464 0.292893 5.70711C0.105357 5.51957 0 5.26522 0 5ZM6.28 10L8.78 20H25.22L27.72 10H6.28ZM10 26C9.46957 26 8.96086 26.2107 8.58579 26.5858C8.21071 26.9609 8 27.4696 8 28C8 28.5304 8.21071 29.0391 8.58579 29.4142C8.96086 29.7893 9.46957 30 10 30C10.5304 30 11.0391 29.7893 11.4142 29.4142C11.7893 29.0391 12 28.5304 12 28C12 27.4696 11.7893 26.9609 11.4142 26.5858C11.0391 26.2107 10.5304 26 10 26ZM6 28C6 26.9391 6.42143 25.9217 7.17157 25.1716C7.92172 24.4214 8.93913 24 10 24C11.0609 24 12.0783 24.4214 12.8284 25.1716C13.5786 25.9217 14 26.9391 14 28C14 29.0609 13.5786 30.0783 12.8284 30.8284C12.0783 31.5786 11.0609 32 10 32C8.93913 32 7.92172 31.5786 7.17157 30.8284C6.42143 30.0783 6 29.0609 6 28ZM24 26C23.4696 26 22.9609 26.2107 22.5858 26.5858C22.2107 26.9609 22 27.4696 22 28C22 28.5304 22.2107 29.0391 22.5858 29.4142C22.9609 29.7893 23.4696 30 24 30C24.5304 30 25.0391 29.7893 25.4142 29.4142C25.7893 29.0391 26 28.5304 26 28C26 27.4696 25.7893 26.9609 25.4142 26.5858C25.0391 26.2107 24.5304 26 24 26ZM20 28C20 26.9391 20.4214 25.9217 21.1716 25.1716C21.9217 24.4214 22.9391 24 24 24C25.0609 24 26.0783 24.4214 26.8284 25.1716C27.5786 25.9217 28 26.9391 28 28C28 29.0609 27.5786 30.0783 26.8284 30.8284C26.0783 31.5786 25.0609 32 24 32C22.9391 32 21.9217 31.5786 21.1716 30.8284C20.4214 30.0783 20 29.0609 20 28Z"
              fill="#1E2226" />
          </svg>
        </a>
        <a href="/pudding-LMS-website/user/mypage/mypage.php" class="icon mypage">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M20 10C20 11.0609 19.5786 12.0783 18.8284 12.8284C18.0783 13.5786 17.0609 14 16 14C14.9391 14 13.9217 13.5786 13.1716 12.8284C12.4214 12.0783 12 11.0609 12 10C12 8.93913 12.4214 7.92172 13.1716 7.17157C13.9217 6.42143 14.9391 6 16 6C17.0609 6 18.0783 6.42143 18.8284 7.17157C19.5786 7.92172 20 8.93913 20 10ZM16 16C17.5913 16 19.1174 15.3679 20.2426 14.2426C21.3679 13.1174 22 11.5913 22 10C22 8.4087 21.3679 6.88258 20.2426 5.75736C19.1174 4.63214 17.5913 4 16 4C14.4087 4 12.8826 4.63214 11.7574 5.75736C10.6321 6.88258 10 8.4087 10 10C10 11.5913 10.6321 13.1174 11.7574 14.2426C12.8826 15.3679 14.4087 16 16 16ZM28 26C28 28 26 28 26 28H6C6 28 4 28 4 26C4 24 6 18 16 18C26 18 28 24 28 26ZM26 25.992C25.998 25.5 25.692 24.02 24.336 22.664C23.032 21.36 20.578 20 16 20C11.42 20 8.968 21.36 7.664 22.664C6.308 24.02 6.004 25.5 6 25.992H26Z"
              fill="#1E2226" />
          </svg>
        </a>
        <?php
        //세션 있으면, 회원이름, 로그아웃 버튼
        if (isset($_SESSION['UID'])) {
          ?>
          <span>
            <?= $_SESSION['UNAME']; ?>님
          </span>
          <a href="/pudding-LMS-website/user/logout.php" class="btn btn-dark">로그아웃</a>
          <!-- <p><a href="logout.php">Logout</a></p>     -->

          <?php
          //세션 없으면, 로그인, 회원가입 버튼
        } else {
          ?>
          <a href="/pudding-LMS-website/user/login.php" class="btn btn-dark">로그인</a>
          <a href="/pudding-LMS-website/user/signup.php" class="btn btn-primary dark">회원가입</a>
          <?php
        }
        ?>
      </div>
    </div>
  </header>