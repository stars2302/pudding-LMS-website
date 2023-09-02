<?php
$title="쿠폰등록";
$css_route="coupon/css/coupon_create.css";
$js_route = "coupon/js/coupon.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';
?>


    <div class="sub_header d-flex justify-content-between align-items-center">
      <h2 class="main_tt">쿠폰등록</h2>
    </div><!-- //sub_header -->

    <form action="coupon_create_ok.php" class="coupon_create_form" method="POST" enctype="multipart/form-data">
      <fieldset class="coupon_info d-flex">
        <legend class="hidden">쿠폰정보</legend>
        <div class="thumbnail">
          <input type="hidden" id="imgSRC" name="imgSRC" val="">
          <input type="file" class="hidden" name="cp_image" id="thumbnail" required>
          <div class="show_thumb border"></div>
          <button type="button" class="btn primary_bg btn-primary thumb_btn">사진등록</button>
        </div>
        <div class="coupon_info_box d-flex flex-column">
          <div class="info_top">
            <div class="field coupon_name input-group">
              <label for="coupon_name" class="content_tt">쿠폰명</label>
              <input type="text" name="cp_name" id="coupon_name" class="form-control"
                placeholder="쿠폰명을 입력하세요." required>
            </div>
          </div>

          <div class="info_bottom d-flex">
            <div class="field coupon_min_price input-group d-flex align-items-center">
              <label for="coupon_limit" class="content_tt">최소사용금액</label>
              <input type="number" name="cp_limit" id="coupon_limit" class="form-control number"
                placeholder="10,000" min="10000" max="1000000" step="1000" required>원
            </div>
            <div class="field coupon_status">
              <h3 class="content_tt">상태</h3>
              <div class="coupon_status_check d-flex">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_1" checked value="1">
                  <label class="form-check-label b_text01" for="coupon_status_1">활성화</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_0" value="0">
                  <label class="form-check-label b_text01" for="coupon_status_0">비활성화</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="coupon_option d-flex">
        <legend class="hidden">쿠폰옵션</legend>
        <div class="coupon_sale">
          <h3 class="content_tt">할인</h3>
          <div class="coupon_sale_check">
            <div class="form-check d-flex align-items-center">
              <input class="form-check-input number" type="radio" name="cp_type" id="coupon_sale_1" checked value="정액">
              <label class="form-check-label b_text01" for="coupon_sale_1">할인가</label>
              <input type="number" name="cp_price" id="cp_price" class="form-control input number"
              placeholder="1,000" min="1000" max="1000000" step="1000">원
            </div>
            <div class="form-check d-flex align-items-center">
              <input class="form-check-input" type="radio" name="cp_type" id="coupon_sale_0" value="정률">
              <label class="form-check-label b_text01" for="coupon_sale_0">할인율</label>
              <input type="number" name="cp_ratio" id="cp_ratio" class="form-control input"
              placeholder="10" min="5" max="100" step="5">%
            </div>
          </div>
        </div>
          
        <div class="coupon_limit_date">
          <h3 class="content_tt">사용기한</h3>
          <div class="coupon_limit_date_check">
            <div class="form-check d-flex align-items-center">
              <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_1" checked>
              <label class="form-check-label b_text01" for="coupon_limit_date_1">무제한</label>
            </div>
            <div class="form-check d-flex align-items-center">
              <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_0">
              <label class="form-check-label b_text01" for="coupon_limit_date_0">제한</label>
              <div class="col period_select2">
                <select class="form-select" name="cp_date" aria-label="Default select example" disabled>
                  <option value="1" selected>1개월</option>
                  <option value="2">2개월</option>
                  <option value="3">3개월</option>
                  <option value="6">6개월</option>
                  <option value="12">12개월</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="submit_btns d-flex justify-content-end">
        <button class="btn btn-primary coupon_submit_btn">등록 완료</button>
        <button class="btn btn-dark" type="button">등록 취소</button>
      </div>
    </form>
  </div><!-- //content_wrap -->
</div><!-- //wrap -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>