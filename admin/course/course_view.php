<?php
$title = "강의 상세";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>

<section class="course_view">
  <h2 class="main_tt dark tt_mb">강의 보기</h2>
  <div class="course_list shadow_box">
    <div class="d-flex">
      <div class="view_category">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">프로그래밍</a></li>
            <li class="breadcrumb-item active" aria-current="page">프론트엔드</li>
            <li class="breadcrumb-item active" aria-current="page">Javascript</li>
          </ol>
        </nav>
      </div>
      <img src="/admin/images/course/thumnail.png" alt="강의 썸네일 이미지" class="border">
      <div class="course_info">
        <div>
          <h3 class="course_list_title main_stt d-flex align-items-center">[Javascript] 입문 기초 문법
            <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
            <span class="badge rounded-pill green_bg b-pd">초급</span>
          </h3>
          <p class="base_mt">웹개발자가 기본으로 갖춰야할 자바스크립트 지식, 자바스크립트 문법과 웹 동작 원리를 배워 혼자서도 이것저것 만들어낼 수 있는 진짜 개발자가 되어보세요.
          </p>
        </div>
        <div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>3개월</span></p>
          <p class="price content_stt">89,000원</p>
        </div>
      </div>
    </div>
    <div class="course_status d-flex justify-content-between">
      <ul>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">전체강좌파이썬 개발환경 셋팅 (대학원생말고 개발자 스타일)</a>
        </li>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">내 컴퓨터 말잘듣게 조련시키기 & 파이썬으로 변수와 문자다루기</a>
        </li>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">중고차로 배우는 파이썬 리스트, 딕셔너리 자료 다루기</a>
        </li>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">컴퓨터의 폭주를 막고 싶으면 if 조건문 쓰세요</a>
        </li>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">파이썬 for 반복문은 어려운게 아니라 그냥 코드 복붙해주는게 다임</a>
        </li>
        <li>
          <i class="ti ti-circle-chevron-right"></i>
          <a href="">파이썬 함수문법 def 언제쓰는지 알랴쥼</a>
        </li>
      </ul>
      <div class="d-flex flex-column align-items-end status_wrap">
        <select class="form-select" aria-label="Default select example" id="selectmenu">
          <option selected disabled>상태</option>
          <!-- 추후 value 넣기  -->
          <option value="">활성화</option>
          <option value="">비활성화</option>
        </select>
        <span class="price_btn_wrap">
          <a href="" class="btn btn-primary btn_g">수정</a>
          <button class="btn btn-danger">삭제</button>
        </span>
      </div>
    </div>
  </div>
  <a href="course_list.php" class="btn btn-dark base_mt">돌아가기</a>

</section>


</div><!-- content_wrap -->
</div><!-- wrap -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>