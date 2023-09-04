<?php
$title="대시보드";
 $css_route="css/index.css";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


//총 수강생 수
$userc = "SELECT COUNT(*) as cnt FROM users";
$userrc = $mysqli -> query($userc);
$usercount = $userrc->fetch_object();
// var_dump($usercount->cnt);

//활성화 쿠폰 수
$cpc = "SELECT COUNT(*) as cnt FROM coupons where cp_status=1";
$cprc = $mysqli -> query($cpc);
$couponcount = $cprc->fetch_object();
// var_dump($couponcount->cnt);

//총 강의 수
$csc = "SELECT COUNT(*) as cnt FROM courses";
$csrc = $mysqli -> query($csc);
$coursecount = $csrc->fetch_object();
// var_dump($coursecount->cnt);

//월별 신규 수강자
$newuc = "SELECT COUNT(*) as cnt FROM users where DATE_FORMAT(now(), '%m')=DATE_FORMAT(regdate, '%m')";
$newurc = $mysqli -> query($newuc);
$newusercount = $newurc->fetch_object();
// var_dump($newusercount->cnt);

//"SELECT * FROM payments where  DATE_FORMAT(buy_date, '%m') = '$selected_month' ORDER BY payid ";

?>
   

        
        <section class="dashboard_wrap">
          <h2 class="main_tt dark tt_mb">대시보드</h2>
          <div class="row">
            <div class="col-md-8 content_box sales border shadow">
              <h2 class="primary_bg"><i class="ti ti-chalkboard"></i><span><?= date('n') ?></span>월 매출 베스트 강좌 순위</h2>
                <ul class="sales_lank d-flex gap-4 justify-content-center align-content-center">
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_7.png" alt="강의 이미지">
                      <span class="badge rounded-pill red_bg b-pd">1위</span>
                      <h3>도전! HTML, CSS</h3>
                      <p>매출액 : <span class="number">8,000,000</span>원</p>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_8.png" alt="강의 이미지">
                      <span class="badge rounded-pill blue_bg b-pd">2위</span>
                      <h3>Javascript의 이해</h3>
                      <p>매출액 : <span class="number">6,000,000</span>원</p>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_3.png" alt="강의 이미지">
                      <span class="badge rounded-pill green_bg b-pd">3위</span>
                      <h3>UX/UI 마스터</h3>
                      <p>매출액 : <span class="number">3,000,000</span>원</p>
                    </div>
                  </li>
                </ul>
            </div>
            <div class="col-md-4 total_values">
              <div class="content_box border shadow d-flex ">
                <div class="col-md-6" >
                  <h2 class="blue_bg white"><i class="ti ti-users"></i>총 수강생</h2>
                  <p><span><?= $usercount->cnt ?></span>명</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-users-plus"></i><span class="people"><?= date('n') ?></span>월 신규</h2>
                  <p><span><?= $newusercount->cnt ?></span>명</p>
                </div>
              </div>
              <div class="content_box border shadow d-flex ">
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-ticket"></i>활성화 쿠폰</h2>
                  <p><span><?= $couponcount->cnt ?></span>개</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-device-desktop"></i>총 강의</h2>
                  <p><span><?= $coursecount->cnt ?></span>개</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-8 content_box border shadow">
                <h2 class="red_bg white"><i class="ti ti-coins icon_coin"></i>월별 수익 현황</h2>
                <div class="monthly_wrap">
                  <canvas id="monthly_chart" ></canvas>
                </div>  
              </div>
            <div class="col-md-4">
              <div class="content_box border shadow">
                <h2 class="yellow_bg white"><i class="ti ti-category"></i>카테고리 비율</h2>
                <div class="category_wrap">
                  <canvas id="category_chart" ></canvas>
                </div>
            </div>
           </div>
          </div>
        </section>

      </div><!-- content_wrap -->
    </div><!-- wrap -->
  
<?php
$js_route = "js/index.js";
 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>