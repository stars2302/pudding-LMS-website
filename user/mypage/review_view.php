<?php
$title="마이페이지 - 내 수강평 상세";
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
      <h1 class="jua main_tt">내 수강평</h1>
      <div class="d-flex flex-column align-items-end">
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
              <h5 class="b_text02 dark review_date">2023-09-14</h5>
            </div>
            <div class="rating" data-rate="4">
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star"></i>
            </div>
          </div>
          <div class="b_text02 reply_content radius_12">
            <p>REACT를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
              이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
            <!-- <textarea
              name="reply_create"
              id="reply_create"
              rows="10"
            ></textarea> -->
          </div>

          <div class="b_text02 re_reply_content radius_12">
            <div class="d-flex align-items-center">
                <img
                  src="../images/pdata/users/profile_img.png"
                  class="userImg shodow_box"
                  alt="프로필 이미지"
                />
                <h5 class="b_text01 review_user">프바오</h5>
                <h5 class="b_text02 dark review_name">REACT 쇼핑몰 만들기</h5>
              </div>
            <p>REACT를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
              이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
            
          </div>
          <div class="d-flex flex-row justify-content-end reply_btn_wrap">
          </div>
        </div>
      </div>
    <a href="" class="btn btn-dark list_btn">목록보기</a>
    </div>
      <!-- 카드 끝 -->
    </section>
    
   
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

