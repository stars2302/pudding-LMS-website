<?php
$title="장바구니";
$css_route="cart/css/cart.css";
$js_route = "cart/js/cart.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>


    <div class="cart_container container">
      <h2 class="jua main_tt">장바구니</h2>
      <!-- <div class="row"> -->

      
        <div class="cartOpBtns d-flex justify-content-between col-8">
          <div class="form-check all_check d-flex align-items-center">
            <input class="form-check-input" type="checkbox" value="" id="all_check" checked>
            <label class="form-check-label" for="all_check">
              전체선택
            </label>
            <span>|<span class="select_count">0</span>개 (총 <span class="all_count">0</span>개)</span>
          </div>
          <button class="btn btn-primary dark select_del">선택삭제</button>
        </div>
      <!-- </div> -->

      <div class="d-flex justify-content-between">
        <ul class="cart_item_container col-8 d-flex flex-column">
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item1" checked>
            <label class="form-check-label" for="cart_item1"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <div class="descript">
                <p>순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              </div>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item2" checked>
            <label class="form-check-label" for="cart_item2"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item3" checked>
            <label class="form-check-label" for="cart_item3"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item4" checked>
            <label class="form-check-label" for="cart_item4"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item5" checked>
            <label class="form-check-label" for="cart_item5"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item6" checked>
            <label class="form-check-label" for="cart_item6"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item7" checked>
            <label class="form-check-label" for="cart_item7"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item8">
            <label class="form-check-label" for="cart_item8"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,100</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item10" checked>
            <label class="form-check-label" for="cart_item10"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span class="number">10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item9" >
            <label class="form-check-label" for="cart_item9"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span>10,000</span>원</span>
          </li>
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item11" checked>
            <label class="form-check-label" for="cart_item11"></label>
            <img src="images/item1.png" alt="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3>[Javascript] 입문 기초 문법</h3>
                <span class="badge rounded-pill blue_bg b-pd">입문</span>
                <span class="badge rounded-pill green_bg b-pd">프론트엔드</span>
              </div>
              <p class="descript">순수 자바스크립트와 VueJS라는 UI Library를 이용하여 쇼핑몰 검색 페이지를 만들어 보며 VueJS 개발 학습을 진행합니다</p>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span>12</span>개월
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            <span class="price content_tt"><span>10,000</span>원</span>
          </li>
        </ul>
        <div class="form_container col-4">
          <form class="payment radius_12 shadow_box">
            <h3 class="content_stt">결제정보</h3>
            <h4 class="demoHeaders style_pd b_text02">쿠폰선택</h4>
            <select class="selectmenu coupon_select">
              <option value="" disabled selected class="default">보유하고 있는 쿠폰</option>
              <option value="1" data-discount="10000" data-type="정액" data-limit="100000">회원가입 쿠폰</option>
              <option value="2" data-discount="10000" data-type="정액" data-limit="50000">추천인 할인 쿠폰</option>
              <option value="3" data-discount="20" data-type="정률" data-limit="70000">★여름방학 맞이 푸딩과 함께★</option>
              <option value="4" data-discount="10" data-type="정률" data-limit="100000">복귀 유저 쿠폰Wellcomeback! 돌아오신것을 환영합니다~</option>
            </select>
            <hr>
            <div class="payment_info d-flex justify-content-between">
              <p>상품 수 :</p><p><span class="cart_count number">0</span>개</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>상품금액 :</p><p><span class="cart_total_price number">0</span>원</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>할인가 :</p><p>- <span class="cart_discount number">0원</span></p>
            </div>
            <hr>
            <div class="payment_total d-flex justify-content-between align-items-center">
              <p class="b_text01">총 결제금액</p><p class="content_tt"><span class="cart_pay_price number">0</span>원</p>
            </div>
            <button class="btn btn-primary dark submit_btn">구매하기</button>
          </form>
        </div>
      </div>
    </div>

    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>


