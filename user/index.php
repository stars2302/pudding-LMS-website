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
    <h2 class="hidden">메인 슬라이드</h2>
    <!-- Swiper -->
    <div class="swiper sec1_slide">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/main/main_slide_01.png" alt="슬라이드 이미지_01"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_02.png" alt="슬라이드 이미지_02"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_03.png" alt="슬라이드 이미지_03"></div>
        <div class="swiper-slide"><img src="images/main/main_slide_04.png" alt="슬라이드 이미지_04"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section class="sec2">
    <h2 class="jua dark sec_tt">어떤 강의를 찾고 있나요?</h2>
    <form action="/pudding-LMS-website/user/course/course_list.php" method="get" class="search">
      <label for="course_search" class="hidden"></label>
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
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'AI'; ?>">
            <img src="images/main/illust.png" alt="illustration">
            <p>AI</p>
          </a>
        </li>
        <li>
          <a href="/pudding-LMS-website/user/course/course_list.php?cate=<?= 'AfterEffect'; ?>">
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
                    <?php
                    if ($item->price_status != "무료") {
                      ?>
                      <div>
                        <span class="content_tt number red">
                          <?= $item->price ?>
                        </span><span>원</span>
                      </div>
                      <?php
                    } else {
                      ?>
                      <div>
                        <span class="content_tt red">무료</span>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                <a href="/pudding-LMS-website/user/course/course_view.php?cid=<?= $item->cid ?>" class="view_btn">상세보기</a>
                <span>
                  <a href="/pudding-LMS-website/user/members/like_course.php?cid=<?= $item->cid ?>" class="card_like">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="32"
                      height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                  </a>
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
                      <?php
                      if ($item->price_status != "무료") {
                        ?>
                        <div>
                          <span class="content_tt number red">
                            <?= $item->price ?>
                          </span><span>원</span>
                        </div>
                        <?php
                      } else {
                        ?>
                        <div>
                          <span class="content_tt red">무료</span>
                        </div>
                        <?php
                      }
                      ?>
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
                      <?php
                      if ($item->price_status != "무료") {
                        ?>
                        <div>
                          <span class="content_tt number red">
                            <?= $item->price ?>
                          </span><span>원</span>
                        </div>
                        <?php
                      } else {
                        ?>
                        <div>
                          <span class="content_tt red">무료</span>
                        </div>
                        <?php
                      }
                      ?>
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
    <div class="d-flex sec7_content" data-aos="fade-up" data-aos-offset="200" data-aos-duration="700">
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
                    <div>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                          <img src="<?= $item->userimg ?>" class="userImg shodow_box" alt="프로필 이미지">
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
                    </div>
                  </div>
                </div>
                <?php
              }
            }
            ?>
          </div>
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
              <div class="swiper-slide d-flex align-items-center justify-content-between">
                <a href="/pudding-LMS-website/user/notice/notice_view.php?ntid=<?= $item->ntid ?>">
                <span>
                  <?= $item->nt_title ?>
                </span><span>
                  <?= $item->nt_regdate ?>
                </span>
                </a>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <a href="/pudding-LMS-website/user/notice/notice.php"><i class="ti ti-circle-plus"></i>더보기</a>
    </div>
  </section>
</main>

<!-- DIALOG POPUP -->
<dialog class="popup">
  <h2 class="content_stt bold">PUDDING - LMS 포트폴리오 사이트(4차 - 유저페이지)</h2>
  <p>
    본 사이트는 구직용 포트폴리오 사이트이며, 실제로 운영되는 사이트가 아닙니다.
  </p>
  <p>
    프로젝트 주요 내용 : <span class="bold">프론트와 백엔드(php, mysql)를 연동</span>하여 페이지 구현
  </p>

  <hr>

  <div class="info">
    <p><span>제작기간</span> : 2023. 09. 08 - 09. 25</p>
    <p><span>특징</span> : html, css, jQuery, <span class="bold">bootstrap, php, mySql</span></p>
    <p>코딩 입문자를 위한 쉽게 떠먹는 <span class="bold">유저 웹 사이트</span></p>
    <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span>기획/디자인 자료</span><i class="ti ti-brand-figma"></i></a>  |  <span>코드</span> : <a href="#" target="_blank" class="git"><span>깃허브</span><i class="ti ti-brand-github"></i></a></p>
    <p><span>구현 완료 페이지</span> : 메인, 강의 클래스, 이벤트(쿠폰게임), 장바구니, 로그인, 회원가입, 마이페이지</p>
  </div>

  <hr>

  <div class="work">
    <p><span>팀원</span> : 이*정, 김*림, 나*영, 박*인, 성*영</p>
    <p><span>기획</span> : 이*정, 김*림, 나*영, 박*인</p>
    <dl>
      <dt><span>- 디자인 및 구현 -</span></dt>
      <dd><span>이*정</span> : 마이페이지(내 강의실, 구매내역, 쿠폰함, 수강평), 카카오 로그인</dd>
      <dd><span>김*림</span> : 메인페이지, 로그인, 회원가입</dd>
      <dd><span>나*영</span> : 장바구니, 이벤트(쿠폰게임)</dd>
      <dd><span>박*인</span> : 강의 클래스</dd>
      <dd><span>성*영 : 기초 틀 디자인, 와이어프레임(구현X)</span></dd>
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
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/user/inc/footer.php';
?>