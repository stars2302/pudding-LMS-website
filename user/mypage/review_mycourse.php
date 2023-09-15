<?php
$title="마이페이지 - 내 수강평";
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
    <section class="content_wrap_course">
      <h2 class="jua pd_2">내강의실</h2>
      <div class="viewSetion_1 shadow_box pd_2">
        <div class="d-flex gap-5">
          <div>
            <img src="../course_images/327610-eng.png" alt="" />
          </div>
          <div class="viewTitleWrap d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between">
                <div>
                  <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                  <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                </div>
                <div class="viewCate d-flex gap-2">
                  <p>프로그래밍</p>
                  <span>></span>
                  <p>프론트엔드</p>
                  <span>></span>
                  <p>Javascript</p>
                </div>
              </div>
              <p class="content_tt">테레비보다 재미있는 제이쿼리(jQuery)</p>
            </div>
            <div>
              <i class="ti ti-calendar-event"></i>
              <span>수강기간 3개월</span>
              <div><span class="main_stt">30000</span><span>원</span></div>
            </div>
          </div>
        </div>
        <div class="pd_3">
          <p class="content_stt fw-bold">강의소개</p>
          <p>
            제이쿼리(jQuery) 는 웹페이지에 역동적인 움직임이나 기능을 더해주는
            자바스크립트(javascript) 라이브러리 입니다. 기존 자바스크립트에섬
            몇줄에 걸쳐서 가능했던 기능들은 단지 한줄로도 가능하게 할수 있을만큼
            쉽고, 빠르고, 간편합니다.
          </p>
        </div>
      </div>
      <div class="viewWrap_1">
        <h2 class="jua pd_2">강의목록</h2>
        <div class="viewSection2 shadow_box">
          <div
            class="viewList d-flex justify-content-between align-items-center"
          >
            <div class="d-flex align-items-center">
              <div class="viewImg">
                <img src="../course_images/327610-eng.png" alt="" />
              </div>
              <span>제이쿼리 문장 구성법과 선택자</span>
            </div>
            <div class="d-flex gap-5 align-items-center">
              <div class="d-flex gap-1">
                <span>진행률: </span>
                <span>100%</span>
                <span>/</span>
                <span>강의 완료</span>
              </div>
              <a href=""><i class="fa-regular fa-circle-play"></i></a>
            </div>
          </div>
          <div
            class="viewList d-flex justify-content-between align-items-center"
          >
            <div class="d-flex align-items-center">
              <div class="viewImg">
                <img src="../course_images/327610-eng.png" alt="" />
              </div>
              <span>제이쿼리 문장 구성법과 선택자</span>
            </div>
            <div class="d-flex gap-5 align-items-center">
              <div class="d-flex gap-1">
                <span>진행률: </span>
                <span>100%</span>
                <span>/</span>
                <span>강의 완료</span>
              </div>
              <a href=""><i class="fa-regular fa-circle-play"></i></a>
            </div>
          </div>
          <div
            class="viewList d-flex justify-content-between align-items-center"
          >
            <div class="d-flex align-items-center">
              <div class="viewImg">
                <img src="../course_images/327610-eng.png" alt="" />
              </div>
              <span>제이쿼리 문장 구성법과 선택자</span>
            </div>
            <div class="d-flex gap-5 align-items-center">
              <div class="d-flex gap-1">
                <span>진행률: </span>
                <span>100%</span>
                <span>/</span>
                <span>강의 완료</span>
              </div>
              <a href=""><i class="fa-regular fa-circle-play"></i></a>
            </div>
          </div>
          <div
            class="viewList d-flex justify-content-between align-items-center"
          >
            <div class="d-flex align-items-center">
              <div class="viewImg">
                <img src="../course_images/327610-eng.png" alt="" />
              </div>
              <span>제이쿼리 문장 구성법과 선택자</span>
            </div>
            <div class="d-flex gap-5 align-items-center">
              <div class="d-flex gap-1">
                <span>진행률: </span>
                <span>100%</span>
                <span>/</span>
                <span>강의 완료</span>
              </div>
              <a href=""><i class="fa-regular fa-circle-play"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <nav
      aria-label="Page navigation example"
      class="d-flex justify-content-center pager user_pager"
    >
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&lsaquo;</span>
          </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
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
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

