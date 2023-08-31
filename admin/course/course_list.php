<?php
$title = "강의 관리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>

<section>
  <h2 class="main_tt dark">강의 관리</h2>
  <div class="link_btn">
    <a href="course_create.php" class="btn btn-dark">신규 강의 등록</a>
    <a href="category.php" class="btn btn-dark">카테고리 관리</a>
  </div>
  <form action="" class="course_sort">
    <div class="row">
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate1">
          <option selected disabled>대분류</option>
          <!-- 추후 value 넣기  -->
          <option value="">프로그래밍</option>
          <option value="">UI/UX</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate2">
          <option selected disabled>중분류</option>
          <!-- 추후 value 넣기  -->
          <option value="">프론트엔드</option>
          <option value="">백엔드</option>
          <option value="">기타</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3">
          <option selected disabled>소분류</option>
          <!-- 추후 value 넣기  -->
          <option value="">HTML</option>
          <option value="">CSS</option>
          <option value="">Javacript</option>
        </select>
      </div>
    </div>
    <div class="d-flex align-items-center level_price">
      <div class="d-flex flex-row">
        <h3 class="b_text01">난이도</h3>
        <span>
          <input type="checkbox" name="level" id="basic" value="basic" class="form-check-input">
          <label for="basic">초급</label>
        </span>
        <span>
          <input type="checkbox" name="level" id="Intermediate" value="Intermediate" class="form-check-input">
          <label for="Intermediate">중급</label>
          <!-- id="flexCheckDefault" -->
        </span>
        <span>
          <input type="checkbox" name="level" id="Advanced" value="Advanced" class="form-check-input">
          <label for="Advanced">고급</label>
        </span>
      </div>
      <div class="d-flex flex-row price_check">
        <h3 class="b_text01">가격</h3>
        <span>
          <input type="checkbox" name="price" id="pay" value="pay" class="form-check-input">
          <label for="pay">유료</label>
        </span>
        <span>
          <input type="checkbox" name="price" id="free" value="free" class="form-check-input">
          <label for="free">무료</label>
        </span>
      </div>
      <div class="d-flex search_bar">
        <label for="search" class="hidden"></label>
        <input type="text" id="search" class="form-control" placeholder="강의명으로 검색하세요" aria-label="Username">
        <button class="btn btn-primary">검색</button>
      </div>
    </div>
  </form>

  <!-- 리스트 -->
  <ul>
    <li class="course_list row shadow_box">
      <div class="col-md-8 d-flex">
        <img src="/admin/images/course/thumnail.png" alt="강의 썸네일 이미지" class="border">
        <div class="course_info">
          <div>
            <h3 class="course_list_title b_text01">[Javascript] 입문 기초 문법
              <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
              <span class="badge rounded-pill green_bg b-pd">초급</span>
            </h3>
            <p>웹개발자가 기본으로 갖춰야할 자바스크립트 지식, 자바스크립트 문법과 웹 동작 원리를 배워 혼자서도 이것저것 만들어낼 수 있는 진짜 개발자가 되어보세요.
            </p>
          </div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>3개월</span></p>
        </div>
      </div>
      <div class="col-md-4">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">프로그래밍</a></li>
            <li class="breadcrumb-item active" aria-current="page">프론트엔드</li>
            <li class="breadcrumb-item active" aria-current="page">Javascript</li>
          </ol>
        </nav>

        <div class="d-flex align-items-end status_box">
          <span class="price content_stt">89,000원</span>
          <span class="d-flex flex-column align-items-end status_wrap">
            <select class="form-select" aria-label="Default select example" id="selectmenu">
              <option selected disabled>상태</option>
              <!-- 추후 value 넣기  -->
              <option value="">활성화</option>
              <option value="">비활성화</option>
            </select>
            <span class="price_btn_wrap">
              <a href="course_up.php" class="btn btn-primary btn_g">수정</a>
              <button class="btn btn-danger">삭제</button>
            </span>
          </span>
        </div>




      </div>

    </li>
  </ul>
  <!-- pagination -->
  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</section>


</div><!-- content_wrap -->
</div><!-- wrap -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>