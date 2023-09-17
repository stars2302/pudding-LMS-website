<?php
$title="홈";
$css_route="css/index.css";
$js_route = "js/index.js";

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';


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
      <form action="" class="search">
        <label for="course_search" type="hidden"></label>
        <input type="text" id="course_search" placeholder="필요한 강의를 찾아보세요.">
        <button><i class="ti ti-search"></i></button>
      </form>
      <div class="category_box radius_12">
        <ul>
          <li>
            <a href="">
              <img src="images/main/html.png" alt="HTML">
              <p>HTML</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/css.png" alt="CSS">
              <p>CSS</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/js.png" alt="Javascript">
              <p>Javascript</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/php.png" alt="PHP">
              <p>PHP</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/react.png" alt="React">
              <p>React</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/mysql.png" alt="SQL">
              <p>SQL</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/phython.png" alt="Python">
              <p>Python</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/figma.png" alt="Figma">
              <p>Figma</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/psd.png" alt="PS">
              <p>PS</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/illust.png" alt="illustration">
              <p>AI</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="images/main/ae.png" alt="After Effect">
              <p>After Effect</p>
            </a>
          </li>
          <li>
            <a href="">
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
          <li>
            <div class="card" style="width: 18rem;">
              <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
              <div class="card-body">
                <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
                <div class="card-text">
                  <p class="duration_wrap"><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                  <p class=""><span class="price">10,000</span><span>원</span></p>
                </div>
              </div>
            </div>
            <div class="view_wrap">
              <a href="#" class="view_btn">상세보기</button>
              <a href="#"><i class="ti ti-heart"></i></a>
              <a href="#"><i class="ti ti-basket"></i></a>
            </div>
          </li>
          <li>
            <div class="card" style="width: 18rem;">
              <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
              <div class="card-body">
                <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
                <div class="card-text">
                  <p class="duration_wrap"><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                  <p class=""><span class="price">10,000</span><span>원</span></p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="card" style="width: 18rem;">
              <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
              <div class="card-body">
                <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
                <div class="card-text">
                  <p class="duration_wrap"><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                  <p class=""><span class="price">10,000</span><span>원</span></p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="card" style="width: 18rem;">
              <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
              <div class="card-body">
                <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
                <div class="card-text">
                  <p class="duration_wrap"><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                  <p class=""><span class="price">10,000</span><span>원</span></p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="card" style="width: 18rem;">
              <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
              <div class="card-body">
                <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
                <div class="card-text">
                  <p class="duration_wrap"><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                  <p class=""><span class="price">10,000</span><span>원</span></p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <section class="sec4 container">
      <h2 class="jua dark sec_tt">푸딩 추천 강의</h2>
      <!-- Swiper -->
      <div class="page_wrap">
        <div class="swiper recom_slide">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인1</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인2</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인3</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인3</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>
    <section class="sec5 container">
      <h2 class="jua dark sec_tt">푸딩 신규 강의</h2>
      <!-- Swiper -->
      <div class="page_wrap">
        <div class="swiper new_slide">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인1</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인2</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인3</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill blue_bg b-pd">고급</span>
                    <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
                  </div>
                  <h5 class="card-title">실무 자바 개발을 위한 디자인3</h5>
                  <div class="card-text">
                    <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
                    <p class=""><span class="price">10,000</span><span>원</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>
    <section class="sec6">
      <img src="images/main/coupon_banner.png" alt="쿠폰 배너">
    </section>
    <section class="sec7 container">
      <h2 class="jua dark">Why the PUDDING?</h2>
      <h3 class="jua">왜 푸딩을 선택할까?</h3>
      <div class="d-flex sec7_content" data-aos="fade-up"  data-aos-offset="200"   data-aos-duration="1500">
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
      <div class="container">
        <h2><span>541,113</span> 명이</h2>
        <h2>푸딩과 함께합니다</h2>
        <p>
          PUDDING은 강의평점과 후기를 투명하게 공개합니다.<br>
          타 사이트들은 성과를 높이기 위해 특정 후기만 노출 하거나,<br>
          아예 숨겨버리는 경우가 많습니다.<br>
          그러나 PUDDING은 강의에 실 사용자들의 후기, 학생수 등 정보를<br>
          투명하게 공개합니다.<br>
          투명한 신뢰성이 여러분들에게 더 좋은 컨텐츠와 교육의 질을<br>
          높여 드릴 것을 약속 드립니다.<br>
        </p>
      </div>
    </section>
    <section class="sec9 dark">
      <div class="container d-flex align-items-center justify-content-center">
        <h2>공지사항</h2>
        <div class="swiper notice_slide">
          <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
          </div>
        </div>
        <a href="#"><i class="ti ti-circle-plus"></i>더보기</a>
      </div>


    </section>
  </main>

  <!-- <li>
    <div class="card" style="width: 18rem;">
      <img src="images/main/thumbnail.png" class="card-img-top" alt="강의 썸네일">
      <div class="card-body">
        <div>
          <span class="badge rounded-pill blue_bg b-pd">고급</span>
          <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
        </div>
        <h5 class="card-title">실무 자바 개발을 위한 디자인</h5>
        <div class="card-text">
          <p class=""><i class="ti ti-calendar-event"></i>수강기간<span class="duration">3개월</span></p>
          <p class=""><span class="price">10,000</span><span>원</span></p>
        </div>
      </div>
    </div>
  </li> -->
  <aside class="main_btn">
    <div class="history_btn">
      <a href="">
        <img src="images/clock-history.png" alt="">
      </a>
    </div>
    <div class="top_btn">
      <a href="">
        <img src="images/top_btn.png" alt="">
      </a>
    </div>
  </aside>
  <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
