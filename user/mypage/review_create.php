<?php
$title="마이페이지 - 내 수강평 작성";
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
          <li class="content_stt link_tag"><a href="/pudding-LMS-website/user/mypage/mypage.php">내 강의실</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/buypage.php">구매내역</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/couponpage.php">쿠폰함</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/review_list.php">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">수강평 작성</h1>
      <div class="card_container radius_5">
        <div class="b_text02">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <img
                src="../images/pdata/users/image1.jpg"
                class="userImg shodow_box"
                alt="프로필 이미지"
              />
              <h5 class="b_text01 review_user">김유림</h5>
              <h5 class="b_text02 dark review_name">REACT 쇼핑몰 만들기</h5>
            </div>
            <div class="rate_wrap">
              <select class="form-control" id="rate" name="rate[]">
                <option value="1">
                  &#xf005; &#xf006; &#xf006; &#xf006; &#xf006;
                </option>
                <option value="2">
                  &#xf005; &#xf005; &#xf006; &#xf006; &#xf006;
                </option>
                <option value="3">
                  &#xf005; &#xf005; &#xf005; &#xf006; &#xf006;
                </option>
                <option value="4">
                  &#xf005; &#xf005; &#xf005; &#xf005; &#xf006;
                </option>
                <option value="5">
                  &#xf005; &#xf005; &#xf005; &#xf005; &#xf005;
                </option>
              </select>
            </div>
          </div>
          <div class="b_text02 c_reply_content border">
            <!-- <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
              이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p> -->
            <textarea
              name="reply_create"
              id="reply_create" 
              rows="10"
            ></textarea>
          </div>
          <div class="d-flex flex-row justify-content-end reply_btn_wrap">
            <button class="btn btn-primary dark b_text01 reply_done">등록</button>
            <button class="btn btn-dark b_text01 reply">취소</button>
          </div>
        </div>
      </div>
      <!-- 카드 끝 -->
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

