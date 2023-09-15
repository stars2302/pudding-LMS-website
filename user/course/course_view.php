<?php
$title="강의 상세";
$css_route="course/css/user_course.css";
$js_route = "course/js/user_course.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>
    <main>
      <div class="container">
        <div class="viewSetion_1 shadow_box">
          <div class="d-flex gap-5">
            <div>
              <img src="../course_images/327610-eng.png" alt="" />
            </div>
            <div
              class="viewTitleWrap d-flex flex-column justify-content-between"
            >
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
              <div
                class="viewPriceWrap d-flex justify-content-between align-items-end"
              >
                <div>
                  <div>
                    <i class="ti ti-calendar-event"></i>
                    <span>수강기간 3개월</span>
                  </div>
                  <div><span class="main_stt">30000</span><span>원</span></div>
                </div>
                <div>
                  <div class="viewBtn mb-2">
                    <button class="btn preview btn-dark">미리보기</button>
                  </div>
                  <div class="viewBtn">
                    <button class="btn btn-primary dark">장바구니 담기</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pd_3">
            <p class="content_stt fw-bold">강의소개</p>
            <p>
              제이쿼리(jQuery) 는 웹페이지에 역동적인 움직임이나 기능을 더해주는
              자바스크립트(javascript) 라이브러리 입니다. 기존 자바스크립트에섬
              몇줄에 걸쳐서 가능했던 기능들은 단지 한줄로도 가능하게 할수
              있을만큼 쉽고, 빠르고, 간편합니다.
            </p>
          </div>
        </div>
        <div class="d-flex justify-content-center gap-3 pd_1">
          <div class="viewBtn_1">
            <button class="viewB_1 active">강의목록</button>
          </div>
          <div class="viewBtn_1">
            <button class="viewB_2">수강평</button>
          </div>
        </div>
        <div class="viewWrap_1">
          <div class="pd_2">
            <h2 class="jua">강의목록</h2>
          </div>
          <div class="viewSection2 shadow_box">
            <div
              class="viewList d-flex justify-content-between align-items-center"
            >
              <div class="d-flex align-items-center">
                <div class="viewImg">
                  <img src="../course_images/327610-eng.png" alt="" />
                </div>
                <div>
                  <span>제이쿼리 문장 구성법과 선택자</span>
                </div>
              </div>
              <div>
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
                <div>
                  <span>
                    제이쿼리 문장 구성법과 선택자 제이쿼리 문장 구성법과 선택자
                  </span>
                </div>
              </div>
              <div>
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
                <div>
                  <span>
                    제이쿼리 문장 구성법과 선택자 제이쿼리 문장 구성법과 선택자
                    제이쿼리 문장
                  </span>
                </div>
              </div>
              <div>
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
                <div>
                  <span>
                    제이쿼리 문장 구성법과 선택자 제이쿼리 문장 구성법과 선택자
                  </span>
                </div>
              </div>
              <div>
                <a href=""><i class="fa-regular fa-circle-play"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="viewWrap_2">
          <div class="pd_2">
            <h2 class="jua">강의평</h2>
          </div>
          <div>
            <p>전체 리뷰 90건</p>
          </div>
          <div class="viewSection3 shadow_box pd_2">
            <div
              class="review d-flex justify-content-between align-items-center"
            >
              <div class="reviewProfile d-flex gap-3 align-items-center">
                <img src="../course_images/327610-eng.png" alt="" />
                <span class="fw-bold">강바오</span>
                <span>PHP BASIC 강의</span>
                <span>2023-08-21</span>
              </div>
              <div class="rating" data-rate="3">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="reviewBox_1 pd_3">
              <p>
                PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무
                친절하게 많은 예시를 들어 설명해주셔서 이해하기 쉬었습니다.
                기본기를 정리하는데 아주 좋은 강의였습니다.
              </p>
            </div>
            <div class="reviewBox_2 pd_3">
              <div
                class="review d-flex justify-content-between align-items-center pd_4"
              >
                <div class="reviewProfile d-flex gap-3 align-items-center">
                  <img src="../course_images/327610-eng.png" alt="" />
                  <span class="fw-bold">프바오</span>
                  <span>2023-08-21</span>
                </div>
              </div>
              <div>
                <p>
                  안녕하세요! 사이트 관리자 프바오입니다. 강바오님의 수강평으로
                  인한 응원으로 많은 보람을 느낍니다. 앞으로도 게시판을 만드는
                  중급 php를 들으셔도 많은도움을 받을수 있을것이라 생각됩니다!
                  앞으로도 즐거운 코딩 함께해요!
                </p>
              </div>
            </div>
          </div>
          <div class="viewSection3 shadow_box">
            <div
              class="review d-flex justify-content-between align-items-center"
            >
              <div class="reviewProfile d-flex gap-3 align-items-center">
                <img src="../course_images/327610-eng.png" alt="" />
                <span class="fw-bold">강바오</span>
                <span>PHP BASIC 강의</span>
                <span>2023-08-21</span>
              </div>
              <div class="rating" data-rate="3">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="reviewBox_1 pd_3">
              <p>
                PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무
                친절하게 많은 예시를 들어 설명해주셔서 이해하기 쉬었습니다.
                기본기를 정리하는데 아주 좋은 강의였습니다.
              </p>
            </div>
            <div class="reviewBox_2 pd_3">
              <div
                class="review d-flex justify-content-between align-items-center pd_4"
              >
                <div class="reviewProfile d-flex gap-3 align-items-center">
                  <img src="../course_images/327610-eng.png" alt="" />
                  <span class="fw-bold">프바오</span>
                  <span>2023-08-21</span>
                </div>
              </div>
              <div>
                <p>
                  안녕하세요! 사이트 관리자 프바오입니다. 강바오님의 수강평으로
                  인한 응원으로 많은 보람을 느낍니다. 앞으로도 게시판을 만드는
                  중급 php를 들으셔도 많은도움을 받을수 있을것이라 생각됩니다!
                  앞으로도 즐거운 코딩 함께해요!
                </p>
              </div>
            </div>
          </div>
          <div class="viewSection3Btn">
            <button class="btn btn-dark">더보기</button>
          </div>
        </div>
      </div>
    </main>


    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
