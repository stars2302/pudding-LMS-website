<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <!-- materialize css -->
    <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    /> -->
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

    <!-- fontawesome css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
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
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.min.css" />
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.structure.css" />
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="css/review.css" />
    <title>pudding LMS site</title>
  </head>
  <body>
    <div class="wrap">
      <header>
        <div class="inner_header content_tt d-flex justify-content-between align-items-center flex-column">
          <h1 class="adminlogo"><a href="#">로고</a></h1>
          <nav>
            <ul class="d-flex justify-content-between flex-column">
              <li><a href="" class="icon"><i class="ti ti-home"></i><span>대시보드</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-chalkboard"></i><span>강의 관리</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-coins"></i><span>매출 관리</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-ticket"></i><span>쿠폰 관리</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-brand-hipchat"></i><span>강의평 관리</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-clipboard-text"></i><span>공지사항</span></a></li>
              <li><a href="" class="icon"><i class="ti ti-zoom-question"></i><span>Q&A</span></a></li>
            </ul>
          </nav>
          <div class="profile d-flex justify-content-between align-items-center border">
            <img src="../images/profile_img.png" alt="">
            <h2 class="content_stt">프바오</h2>
            <p>admins</p>
          </div>
          <a href="" class="btn btn-primary  primary_btn logout b_text01">로그아웃</a>
        </div>
      </header>
    
      <div class="content_wrap">
        <div class="top_bar d-flex justify-content-end align-items-center">
          <div class="red_bell_wrap">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-bell-filled"
              width="68"
              height="68"
              viewBox="0 0 28 28"
              stroke-width="2"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path
                d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z"
                stroke-width="0"
                fill="currentColor"
              ></path>
              <path
                d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z"
                stroke-width="0"
                fill="currentColor"
              ></path>
            </svg>
            <div class="red_bell">1</div>
          </div>
          <div class="profile">
            <img src="../images/profile_img.png" alt="">
          </div>
        </div><!-- top_bar -->
        <section>
        
          <h2 class="main_tt dark title-mg">수강평 관리</h2>

          <div class="card_container shadow_box border">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="images/user_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user">강바오</h5>
                <h5 class="b_text01 dark review_name"><span>강의명: </span>REACT 쇼핑몰 만들기</h5>
              </div>
              <div >
                <div class="rating" data-rate="4">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>	
                </div>
              </div>
           
            </div>
            <div class="b_text02 review_content border">
              <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
              <p>2023-08-21</p>
            </div>
            <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div>
            <div class="d-flex flex-row justify-content-end reply_btn">
              <button class="btn btn-dark b_text01">댓글 달기</button>
            </div>
              
          </div>
          <!-- 카드 끝 -->
          
          <div class="card_container shadow_box border">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="images/user_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user">강바오</h5>
                <h5 class="b_text01 dark review_name">REACT 쇼핑몰 만들기</h5>
              </div>
              <div >
                <div class="rating" data-rate="4">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>	
                </div>
              </div>
           
            </div>
            <div class="b_text02 review_content border">
              <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
              <p>2023-08-21</p>
            </div>
            <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div>
            <div class="d-flex flex-row justify-content-end reply_btn">
              <button class="btn btn-dark b_text01">댓글 달기</button>
            </div>
              
          </div>
          <!-- 카드 끝 -->
          
          <div class="card_container shadow_box border">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="images/user_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user">강바오</h5>
                <h5 class="b_text01 dark review_name">REACT 쇼핑몰 만들기</h5>
              </div>
              <div >
                <div class="rating" data-rate="4">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>	
                </div>
              </div>
           
            </div>
            <div class="b_text02 review_content border">
              <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
              <p>2023-08-21</p>
            </div>
            <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div>
            <div class="d-flex flex-row justify-content-end reply_btn">
              <button class="btn btn-dark b_text01">댓글 달기</button>
            </div>
              
          </div>
          <!-- 카드 끝 -->
          <!-- 페이지네이션 -->
          <nav
          aria-label="Page navigation example"
          class="d-flex justify-content-center pager"
        >
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- 페이지네이션 끝 -->
        </section>
          
    
    <!-- jquery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
      integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- jqueryui js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
      integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- bootstrap js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
      integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
      integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- fontawesome js  -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- modernizr js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      referrerpolicy="no-referrer"
    ></script>
    <!-- materialize css -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/common.js"></script>
    <script src="js/review.js"></script>
  </body>
</html>
