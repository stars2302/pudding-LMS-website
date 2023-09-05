<?php
$title="대시보드";
 $css_route="css/index.css";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


// 현재월, 전월 
$current_month = date('Y-m');
$last_month = date('Y-m', strtotime('-1 month'));
$last_month2 = date('Y-m', strtotime('-2 months'));
var_dump($last_month2);

// 현재 월과 전 월 sql
$current_month_sales_query = "SELECT SUM(total_price) AS current_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$current_month'";
$last_month_sales_query = "SELECT SUM(total_price) AS last_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month'";
$last_month2_sales_query = "SELECT SUM(total_price) AS last_month_sales2 FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month2'";


$current_month_result = $mysqli->query($current_month_sales_query);
$last_month_result = $mysqli->query($last_month_sales_query);
$last_month2_result = $mysqli->query($last_month2_sales_query);


$current_month_sales = $current_month_result->fetch_assoc();
$last_month_sales = $last_month_result->fetch_assoc();
$last_month2_sales = $last_month2_result ->fetch_assoc();

// var_dump($last_month2_sales);

//json 형식으로 바꾸기
$sales_data = array(
    'current_month_sales' => $current_month_sales['current_month_sales'],
    'last_month_sales' => $last_month_sales['last_month_sales'],
    'last_month2_sales' => $last_month2_sales['last_month_sales2'],
);
$sales_data_json = json_encode($sales_data);

// var_dump($sales_data_json);

$sql ="SELECT * FROM notice order by ntid desc limit 0,4";
$result = $mysqli-> query($sql);
while($rs = $result->fetch_object()){
  $rscn[]=$rs;
}

var_dump($rscn);


?>
   

        
        <section class="dashboard_wrap">
          <h2 class="main_tt dark tt_mb">대시보드</h2>
          <div class="row">
            <div class="col-md-8 content_box sales border shadow">
              <h2 class="primary_bg"><i class="ti ti-chalkboard"></i>월별 매출 베스트 강좌 순위</h2>
                <ul class="sales_lank d-flex gap-4 justify-content-center align-content-center">
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_7.png" alt="강의 이미지">
                      <span class="badge rounded-pill red_bg b-pd">1위</span>
                      <h3>도전! HTML, CSS</h3>
                      <p>8월 매출액 : 8,000,000원</p>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_8.png" alt="강의 이미지">
                      <span class="badge rounded-pill blue_bg b-pd">2위</span>
                      <h3>Javascript의 이해</h3>
                      <p>8월 매출액 : 6,000,000원</p>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex flex-column">
                      <img src="/pudding-LMS-website/admin/images/course/thumbnail_3.png" alt="강의 이미지">
                      <span class="badge rounded-pill green_bg b-pd">3위</span>
                      <h3>UX/UI 마스터</h3>
                      <p>8월 매출액 : 3,000,000원</p>
                    </div>
                  </li>
                </ul>
            </div>
            <div class="col-md-4 total_values">
              <div class="content_box border shadow d-flex ">
                <div class="col-md-6" >
                  <h2 class="blue_bg white"><i class="ti ti-users"></i>총 수강생</h2>
                  <p><span>157</span>명</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-users-plus"></i>총 수강생</h2>
                  <p><span>7</span>명</p>
                </div>
              </div>
              <div class="content_box border shadow d-flex ">
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-ticket"></i>진행중 쿠폰</h2>
                  <p><span>6</span>개</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-device-desktop"></i>총 강의</h2>
                  <p><span>10</span>개</p>
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
                <h2 class="yellow_bg white"><i class="ti ti-category"></i>공지사항(최근순)</h2>
                <?php
                if(isset($rscn)){
                  foreach($rscn as $nlist){
                
                ?>
                
                <div class="">
                  <p><a href="/pudding-LMS-website/admin/notice/notice_list.php?ntid=<?php echo $nlist->ntid ?>"><?php echo $nlist->nt_title ?></a></p>
                </div>
                <?php
                  }
                }
                ?>
            </div>
           </div>
          </div>
        </section>

      </div><!-- content_wrap -->
    </div><!-- wrap -->

<script>

//차트1 시작  
var salesData = <?php echo $sales_data_json; ?>;

var ctx = document.getElementById('monthly_chart').getContext('2d');
var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['7월','8월', '9월'],
        datasets: [{
            label: '월별 매출',
            data: [  salesData.last_month2_sales, salesData.last_month_sales, salesData.current_month_sales],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'


            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

//차트 1끝

</script>
  
<?php
$js_route = "js/index.js";
 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>