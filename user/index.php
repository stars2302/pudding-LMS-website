<?php
$title = "홈";
$css_route = "css/index.css";
$js_route = "js/index.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/header.php';

// 인기 강의
$sql = "SELECT * FROM `courses` WHERE isbest = 1 LIMIT 0,5";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}

// 추천 강의
$rc_sql = "SELECT * FROM `courses` WHERE isrecom = 1";
$rc_result = $mysqli->query($rc_sql);
while ($rc_rs = $rc_result->fetch_object()) {
  $rc_rsc[] = $rc_rs;
}

// 신규 강의
$new_sql = "SELECT * FROM `courses` WHERE isnew = 1";
$new_result = $mysqli->query($new_sql);
while ($new_rs = $new_result->fetch_object()) {
  $new_rsc[] = $new_rs;
}

// 수강평
$rvsql = "SELECT r.*, u.username, u.userimg ,c.name FROM review r
        JOIN users u ON r.userid = u.userid
        JOIN courses c ON c.cid = r.cid
        ORDER BY r.rid DESC LIMIT 0, 6";
  
$rvrsc = array();
$ntrsc = array();
$rvresult = $mysqli->query($rvsql);
while ($rvrs = $rvresult->fetch_object()) {
  $rvrsc[] = $rvrs;
}

// 공지사항
$ntsql = "SELECT * FROM notice ORDER BY ntid DESC LIMIT 0, 10";
$ntresult = $mysqli->query($ntsql);
while ($ntrs = $ntresult->fetch_object()) {
  $ntrsc[] = $ntrs;
}


?>
<main>
  <section class="sec1">
    <!-- Swiper -->
    <div class="swiper sec1_slide">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/main/main_slide_01.png" alt="슬라이드 이미지_01"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_02.png" alt="슬라이드 이미지_02"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_03.png" alt="슬라이드 이미지_03"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section class="sec2">
    <h2 class="jua dark sec_tt">어떤 강의를 찾고 있나요?</h2>
    <form action="/pudding-LMS-website/user/members/search_course_list.php" method="get" class="search">
      <label for="course_search" type="hidden"></label>
      <input type="text" id="course_search" name="course_search" placeholder="필요한 강의를 찾아보세요.">
      <button type="submit"><i class="ti ti-search"></i></button>
    </form>
    <div class="category_box radius_12">
      <ul>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'HTML'; ?>">
            <img src="images/main/html.png" alt="HTML">
            <p>HTML</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'CSS'; ?>">
            <img src="images/main/css.png" alt="CSS">
            <p>CSS</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'Javascript'; ?>">
            <img src="images/main/js.png" alt="Javascript">
            <p>Javascript</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'PHP'; ?>">
            <img src="images/main/php.png" alt="PHP">
            <p>PHP</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'React'; ?>">
            <img src="images/main/react.png" alt="React">
            <p>React</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'SQL'; ?>">
            <img src="images/main/mysql.png" alt="SQL">
            <p>SQL</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'Python'; ?>">
            <img src="images/main/phython.png" alt="Python">
            <p>Python</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'Figma'; ?>">
            <img src="images/main/figma.png" alt="Figma">
            <p>Figma</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'PS'; ?>">
            <img src="images/main/psd.png" alt="PS">
            <p>PS</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'fter Effect'; ?>">
            <img src="images/main/illust.png" alt="illustration">
            <p>AI</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'After Effect'; ?>">
            <img src="images/main/ae.png" alt="After Effect">
            <p>After Effect</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'InDesign'; ?>">
            <img src="images/main/indei.png" alt="InDesign">
            <p>InDesign</p>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <section class="sec3 container">
    <h2 class="jua dark sec_tt">푸딩 인기 BEST!</h2>
    <div class="card_wrap">
      <ul class="d-flex">
        <?php
        if (isset($rsc)) {
          foreach ($rsc as $item) {
            ?>
            <li>
              <div class="card">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php
                    $strTitle = $item->name;
                    $strTitle = mb_strimwidth($strTitle, 0, 26, "...", "utf-8");
                    echo $strTitle;
                    ?>
                  </h5>
                  <div class="card-text">
                    <p class="duration_wrap">
                      <i class="ti ti-calendar-event"></i>수강기간
                      <span class="duration">
                        <?php if ($item->due == '') {
                          echo '무제한';
                        } else {
                          echo $item->due;
                        }
                        ?>
                      </span>
                    </p>
                    <p class=""><span class="price number">
                        <?= $item->price ?>
                      </span><span>원</span></p>
                  </div>
                </div>
              </div>
              <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                <a href="/pudding-LMS-website/user/course/course_view.php?cid=<?= $item->cid ?>" class="view_btn">상세보기</a>
                <span>
                  <!-- <a href="#"><i class="ti ti-heart"></i></a> -->
                  <a href="/pudding-LMS-website/user/members/like_course.php?cid=<?= $item->cid ?>" class="card_like">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="32"
                      height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                  </a>
                  <!-- <a href="#"><i class="ti ti-basket"></i></a> -->
                  <a href="/pudding-LMS-website/user/members/add_cart.php?cid=<?= $item->cid ?>" class="card_cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="32"
                      height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                      <path
                        d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                      <path d="M17 10l-2 -6" />
                      <path d="M7 10l2 -6" />
                    </svg>
                  </a>
                </span>
              </div>
            </li>
            <?php
          }
        }
        ?>
      </ul>
    </div>
  </section>
  <section class="sec4 container">
    <h2 class="jua dark sec_tt">푸딩 추천 강의</h2>
    <!-- Swiper -->
    <div class="page_wrap">
      <div class="swiper recom_slide">
        <div class="swiper-wrapper">
          <?php
          if (isset($rc_rsc)) {
            foreach ($rc_rsc as $item) {
              ?>
              <div class="swiper-slide">
                <div class="card">
                  <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                  <div class="card-body">
                    <div class="badge_wrap">
                      <span class="badge rounded-pill b-pd
                      <?php
                      // 뱃지컬러
                      $levelBadge = $item->level;
                      if ($levelBadge === '초급') {
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                      </span>
                      <span class="badge rounded-pill green_bg b-pd">
                        <?php
                        //뱃지 키워드 
                        if (isset($item->cate)) {
                          $categoryText = $item->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);
                          echo $lastPart;
                        }
                        ?>
                      </span>
                    </div>
                    <h5 class="card-title">
                      <?php
                      $strTitle = $item->name;
                      $strTitle = mb_strimwidth($strTitle, 0, 32, "...", "utf-8");
                      echo $strTitle;
                      ?>
                    </h5>
                    <div class="card-text">
                      <p class=""><i class="ti ti-calendar-event"></i>수강기간
                        <span class="duration">
                          <?php if ($item->due == '') {
                            echo '무제한';
                          } else {
                            echo $item->due;
                          }
                          ?>
                        </span>
                      </p>
                      <p class=""><span class="price number">
                          <?= $item->price ?>
                        </span><span>원</span></p>
                    </div>
                  </div>
                </div>
                <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                  <a href="/pudding-LMS-website/user/course/course_view.php?cid=<?= $item->cid ?>" class="view_btn">상세보기</a>
                  <span>
                    <a href="/pudding-LMS-website/user/members/like_course.php?cid=<?= $item->cid ?>" class="card_like">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                    </a>
                    <a href="/pudding-LMS-website/user/members/add_cart.php?cid=<?= $item->cid ?>" class="card_cart">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path
                          d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                        <path d="M17 10l-2 -6" />
                        <path d="M7 10l2 -6" />
                      </svg>
                    </a>
                  </span>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="swiper-button-next recom_next"></div>
      <div class="swiper-button-prev recom_prev"></div>
    </div>
  </section>
  <section class="sec5 container">
    <h2 class="jua dark sec_tt">푸딩 신규 강의</h2>
    <!-- Swiper -->
    <div class="page_wrap">
      <div class="swiper new_slide">
        <div class="swiper-wrapper">
          <?php
          if (isset($new_rsc)) {
            foreach ($new_rsc as $item) {
              ?>
              <div class="swiper-slide">
                <div class="card">
                  <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                  <div class="card-body">
                    <div class="badge_wrap">
                      <span class="badge rounded-pill b-pd
                      <?php
                      // 뱃지컬러
                      $levelBadge = $item->level;
                      if ($levelBadge === '초급') {
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                      </span>
                      <span class="badge rounded-pill green_bg b-pd">
                        <?php
                        //뱃지 키워드 
                        if (isset($item->cate)) {
                          $categoryText = $item->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);
                          echo $lastPart;
                        }
                        ?>
                      </span>
                    </div>
                    <h5 class="card-title">
                      <?php
                      $strTitle = $item->name;
                      $strTitle = mb_strimwidth($strTitle, 0, 36, "...", "utf-8");
                      echo $strTitle;
                      ?>
                    </h5>
                    <div class="card-text">
                      <p class=""><i class="ti ti-calendar-event"></i>수강기간
                        <span class="duration">
                          <?php if ($item->due == '') {
                            echo '무제한';
                          } else {
                            echo $item->due;
                          }
                          ?>
                        </span>
                      </p>
                      <p class=""><span class="price number">
                          <?= $item->price ?>
                        </span><span>원</span></p>
                    </div>
                  </div>
                </div>
                <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                  <a href="/pudding-LMS-website/user/course/course_view.php?cid=<?= $item->cid ?>" class="view_btn">상세보기</a>
                  <span>
                    <a href="/pudding-LMS-website/user/members/like_course.php?cid=<?= $item->cid ?>" class="card_like">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                    </a>
                    <a href="/pudding-LMS-website/user/members/add_cart.php?cid=<?= $item->cid ?>" class="card_cart">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path
                          d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                        <path d="M17 10l-2 -6" />
                        <path d="M7 10l2 -6" />
                      </svg>
                    </a>
                  </span>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="swiper-button-next new_next"></div>
      <div class="swiper-button-prev new_prev"></div>
    </div>
  </section>
  <section class="sec6">
    <a href="/pudding-LMS-website/user/banner/banner.php">
      <img src="images/main/coupon_banner.png" alt="쿠폰 배너">
    </a>
  </section>
  <section class="sec7 container">
    <h2 class="jua dark">Why the PUDDING?</h2>
    <h3 class="jua">왜 푸딩을 선택할까?</h3>
    <div class="d-flex sec7_content" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1500">
      <div class="sec7_box">
        <h4>쉽게 떠 먹는 코딩</h4>
        <p>
          입문자도 쉽게 이해할 수 있는 코딩 강의!<br>
          꼭 필요한 내용만 알차게 학습할 수 있어요.<br>
          코딩을 푸딩처럼 쉽게 떠먹어 볼까요?<br>
        </p>
        <img src="images/main/sec7_01.png" alt="쉽게 떠 먹는 코딩 이미지">
      </div>
      <div class="sec7_box">
        <h4>쉽게 떠 먹는 사이트</h4>
        <p>
          쉽고 빠르게 나에게 꼭 맞는 강의를 알고 싶다면!<br>
          단조로운 영상 위주의 강의보다 재밌고<br>
          능동적으로 배울 수 있어요.<br>
          게다가 모바일 기기에서도 실습 가능!<br>
        </p>
        <img src="images/main/sec7_02.png" alt="쉽게 떠 먹는 사이트">
      </div>
    </div>
  </section>
  <section class="sec8 pudding_bg dark">
    <div class="container d-flex">
      <div class=col-6>
        <h2><span>541,113</span> 명이</h2>
        <h2>푸딩과 함께합니다</h2>
        <p class="pudding_is">
          PUDDING은 강의평점과 후기를 투명하게 공개합니다.<br>
          타 사이트들은 성과를 높이기 위해 특정 후기만 노출 하거나,<br>
          아예 숨겨버리는 경우가 많습니다.<br>
          그러나 PUDDING은 강의에 실 사용자들의 후기, 학생수 등 정보를<br>
          투명하게 공개합니다.<br>
          투명한 신뢰성이 여러분들에게 더 좋은 컨텐츠와 교육의 질을<br>
          높여 드릴 것을 약속 드립니다.<br>
        </p>
      </div>
      <div class=col-6>
        <div class="swiper review_slide">
          <div class="swiper-wrapper">
            <?php
            if (isset($rvrsc)) {
              foreach ($rvrsc as $item) {
                ?>
                <div class="swiper-slide d-flex align-items-center justify-content-between">
                  <div class="review_wrap radius_12 white_bg">
                    <!-- <div> -->
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center">
                        <img src="<?= $item->userimg ?>" class="userImg shodow_box" alt="프로필 이미지" />
                        <p class="review_user">
                          <?= $item->username ?>
                        </p>
                        <p class="review_name">
                          <?php
                          $strTitle = $item->name;
                          $strTitle = mb_strimwidth($strTitle, 0, 36, "...", "utf-8");
                          echo $strTitle;
                          ?>

                        </p>
                        <p class="review_date">
                          <?= $item->regdate ?>
                        </p>
                      </div>
                      <div class="rating" data-rate="<?= $item->rating ?>">
                        <i class="ti ti-star-filled"></i>
                        <i class="ti ti-star-filled"></i>
                        <i class="ti ti-star-filled"></i>
                        <i class="ti ti-star-filled"></i>
                        <i class="ti ti-star"></i>
                      </div>
                    </div>
                    <div class="b_text02 reply_content radius_5 light_blue_bg">
                      <p>
                        <?= $item->content ?>
                      </p>
                    </div>
                    <div class="d-flex flex-row justify-content-end reply_btn_wrap">
                    </div>
                    <!-- </div> -->
                  </div>
                </div>
                <?php
              }
            }
            ?>
          </div>
        </div>

      </div>
  </section>
  <section class="sec9 dark">
    <div class="container d-flex align-items-center justify-content-center">
      <h2>공지사항</h2>
      <div class="swiper notice_slide">
        <div class="swiper-wrapper">
          <?php
          if (isset($ntrsc)) {
            foreach ($ntrsc as $item) {
              ?>
              <div class="swiper-slide d-flex align-items-center justify-content-between"><span>
                  <?= $item->nt_title ?>
                </span><span>
                  <?= $item->nt_regdate ?>
                </span></div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <a href="#"><i class="ti ti-circle-plus"></i>더보기</a>
    </div>


  </section>
</main>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>