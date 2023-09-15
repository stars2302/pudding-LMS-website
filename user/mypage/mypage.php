<?php
$title="마이페이지 - 내 강의실";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
          <ul>
            <li class="content_stt link_tag"><a href="#">내 강의실</a></li>
            <li class="content_stt"><a href="#">구매내역</a></li>
            <li class="content_stt"><a href="#">쿠폰함</a></li>
            <li class="content_stt"><a href="#">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">김유림님 안녕하세요!</h1>
      <div class="d-flex">
        <div class="d-flex profile_box radius_5">
          <img src="../images/pdata/users/image1.jpg" alt="프로필이미지" />
          <div>
            <h6 class="b_text02">김유림</h6>
            <h6 class="b_text02">yuraming@pudding.com</h6>
          </div>
          <a href="#"><i class="ti ti-settings"></i></a>
        </div>

        <div
          class="d-flex justify-content-center align-items-center pudding_box radius_5"
        >
          <h6 class="content_tt d-flex align-items-center">
            푸딩과 함께 <span>200</span>일째 달리는 중!<i
              class="ti ti-flame"
            ></i>
          </h6>
        </div>
      </div>
    </section>
    <section class="course_wrap">
      <h1 class="jua main_tt">내 강의실</h1>
      <ul>
        <li class="course_list row shadow_box">
          <input type="hidden" name="cid[]" value="" />
          <div class="col-md-8 d-flex">
            <img
              src="../images/pdata/users/js.png"
              alt="강의 썸네일 이미지"
              class="border"
            />
            <div class="course_info">
              <div>
                <h3 class="course_list_title b_text01">
                  <a href="">자바스크립트와 함께 하는 수업</a>
                  <span class="badge level_badge green_bg rounded-pill b-pd"
                    >초급</span
                  >
                  <span class="badge rounded-pill blue_bg b-pd">
                    프론트엔드
                  </span>
                </h3>
                <p>
                  순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰
                  검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다. 순수
                  자바 스크...
                </p>
              </div>
              <p class="duration">
                <i class="ti ti-calendar-event"></i><span>수강기간</span>
                <span>|</span><span>3개월</span>
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-end">
            <a href="" class="btn btn-dark">강의보기</a>
          </div>
        </li>
        <li class="course_list row shadow_box">
          <input type="hidden" name="cid[]" value="" />
          <div class="col-md-8 d-flex">
            <img
              src="../images/pdata/users/js.png"
              alt="강의 썸네일 이미지"
              class="border"
            />
            <div class="course_info">
              <div>
                <h3 class="course_list_title b_text01">
                  <a href="">자바스크립트와 함께 하는 수업</a>
                  <span class="badge level_badge green_bg rounded-pill b-pd"
                    >초급</span
                  >
                  <span class="badge rounded-pill blue_bg b-pd">
                    프론트엔드
                  </span>
                </h3>
                <p>
                  순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰
                  검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다. 순수
                  자바 스크...
                </p>
              </div>
              <p class="duration">
                <i class="ti ti-calendar-event"></i><span>수강기간</span>
                <span>|</span><span>3개월</span>
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-end">
            <a href="" class="btn btn-dark">강의보기</a>
          </div>
        </li>
        <li class="course_list row shadow_box">
          <input type="hidden" name="cid[]" value="" />
          <div class="col-md-8 d-flex">
            <img
              src="../images/pdata/users/js.png"
              alt="강의 썸네일 이미지"
              class="border"
            />
            <div class="course_info">
              <div>
                <h3 class="course_list_title b_text01">
                  <a href="">자바스크립트와 함께 하는 수업</a>
                  <span class="badge level_badge green_bg rounded-pill b-pd"
                    >초급</span
                  >
                  <span class="badge rounded-pill blue_bg b-pd">
                    프론트엔드
                  </span>
                </h3>
                <p>
                  순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰
                  검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다. 순수
                  자바 스크...
                </p>
              </div>
              <p class="duration">
                <i class="ti ti-calendar-event"></i><span>수강기간</span>
                <span>|</span><span>3개월</span>
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-end">
            <a href="" class="btn btn-dark">강의보기</a>
          </div>
        </li>
      </ul>
    </section>
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

