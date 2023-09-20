<?php
$title="대시보드";
 $css_route="css/index.css";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


//line chart
// 현재월, 전월 
$current_month = date('Y-m');
$last_month = date('Y-m', strtotime('-1 month'));
$last_month2 = date('Y-m', strtotime('-2 months'));
$last_month3 = date('Y-m', strtotime('-3 months'));
$last_month4 = date('Y-m', strtotime('-4 months'));
$last_month5 = date('Y-m', strtotime('-5 months'));


// 현재 월과 전 월 sql
$current_month_sales_query = "SELECT SUM(total_price) AS current_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$current_month'";
$last_month_sales_query = "SELECT SUM(total_price) AS last_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month'";
$last_month2_sales_query = "SELECT SUM(total_price) AS last_month_sales2 FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month2'";
$last_month3_sales_query = "SELECT SUM(total_price) AS last_month_sales3 FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month3'";
$last_month4_sales_query = "SELECT SUM(total_price) AS last_month_sales4 FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month4'";
$last_month5_sales_query = "SELECT SUM(total_price) AS last_month_sales5 FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month5'";



$current_month_result = $mysqli->query($current_month_sales_query);
$last_month_result = $mysqli->query($last_month_sales_query);
$last_month2_result = $mysqli->query($last_month2_sales_query);
$last_month3_result = $mysqli->query($last_month3_sales_query);
$last_month4_result = $mysqli->query($last_month4_sales_query);
$last_month5_result = $mysqli->query($last_month5_sales_query);



$current_month_sales = $current_month_result->fetch_assoc();
$last_month_sales = $last_month_result->fetch_assoc();
$last_month2_sales = $last_month2_result ->fetch_assoc();
$last_month3_sales = $last_month3_result ->fetch_assoc();
$last_month4_sales = $last_month4_result ->fetch_assoc();
$last_month5_sales = $last_month5_result ->fetch_assoc();


$sales_data = array(
    'current_month_sales' => $current_month_sales['current_month_sales'],
    'last_month_sales' => $last_month_sales['last_month_sales'],
    'last_month2_sales' => $last_month2_sales['last_month_sales2'],
    'last_month3_sales' => $last_month3_sales['last_month_sales3'],
    'last_month4_sales' => $last_month4_sales['last_month_sales4'],
    'last_month5_sales' => $last_month5_sales['last_month_sales5'],
);
$sales_data_json = json_encode($sales_data);



$sql ="SELECT * FROM notice order by ntid desc limit 0,6";
$result = $mysqli-> query($sql);
while($rs = $result->fetch_object()){
  $rscn[]=$rs;
}



//총 수강생 수
$userc = "SELECT COUNT(*) as cnt FROM users";
$userrc = $mysqli -> query($userc);
$usercount = $userrc->fetch_object();


//활성화 쿠폰 수
$cpc = "SELECT COUNT(*) as cnt FROM coupons where cp_status=1";
$cprc = $mysqli -> query($cpc);
$couponcount = $cprc->fetch_object();


//총 강의 수
$csc = "SELECT COUNT(*) as cnt FROM courses";
$csrc = $mysqli -> query($csc);
$coursecount = $csrc->fetch_object();

// var_dump($coursecount);
//월별 신규 수강자
$newuc = "SELECT COUNT(*) as cnt FROM users where DATE_FORMAT(now(), '%m')=DATE_FORMAT(regdate, '%m')";
$newurc = $mysqli -> query($newuc);
$newusercount = $newurc->fetch_object();

// var_dump($newusercount);


//월별 매출
$monthsql = "SELECT  c.name ,c.thumbnail, SUM(p.total_price) AS total_price_sum
        FROM payments p
        INNER JOIN courses c ON p.cid = c.cid
        WHERE DATE_FORMAT(p.regdate, '%m') = DATE_FORMAT(NOW(), '%m')
        GROUP BY p.cid
        ORDER BY total_price_sum DESC
        limit 0,3;";

$result = $mysqli->query($monthsql);
while($rs = $result -> fetch_object()){
  $monthlate[] = $rs;
}



?>
   

        
        <section class="dashboard_wrap">
          <h2 class="main_tt dark tt_mb">대시보드</h2>
          <div class="row">
            <div class="col-md-8 content_box sales border shadow">
              <h2 class="primary_bg"><i class="ti ti-chalkboard"></i><span><?= date('n') ?></span>월 매출 베스트 강좌 순위</h2>
                <ul class="sales_lank d-flex gap-4 justify-content-center align-content-center">
                  <?php
                  if(isset($monthlate)){
                    $i = 1;
                    foreach($monthlate as $late){
                      $colorarr = ['red_bg','blue_bg','green_bg'];
                  ?>
                  <li>
                    <div class="d-flex flex-column">
                      <img src="<?= $late->thumbnail ?>" alt="<?= $late->name ?>">
                      <span class="badge rounded-pill <?= $colorarr[$i-1] ?> b-pd"><?= $i ?>위</span>
                      <h3 title="<?= $late->name ?>"><a href="/pudding-LMS-website/admin/sales/sales_list.php" class="link"><?= $late->name ?></a></h3>
                      <p>매출액 : <span class="number"><?= $late->total_price_sum ?></span>원</p>
                    </div>
                  </li>
                  <?php
                    $i+=1;
                    }
                  }
                  ?>
                </ul>
            </div>
            <div class="col-md-4 total_values">
              <div class="content_box border shadow d-flex">
                <div class="col-md-6" >
                  <h2 class="blue_bg white"><i class="ti ti-users"></i>총 수강생</h2>
                  <p><a href="/pudding-LMS-website/admin/users/users_list.php" class="link"><span><?= $usercount->cnt ?></span></a>명</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-users-plus"></i><span class="people"><?= date('n') ?></span>월 신규</h2>
                  <p><a href="/pudding-LMS-website/admin/users/users_list.php" class="link"><span><?= $newusercount->cnt ?></span></a>명</p>
                </div>
              </div>
              <div class="content_box border shadow d-flex ">
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-ticket"></i>활성화 쿠폰</h2>
                  <p><a href="/pudding-LMS-website/admin/coupon/coupon_list.php" class="link"><span><?= $couponcount->cnt ?></span></a>개</p>
                </div>
                <div class="col-md-6">
                  <h2 class="blue_bg white"><i class="ti ti-device-desktop"></i>총 강의</h2>
                  <p><a href="/pudding-LMS-website/admin/course/course_list.php" class="link"><span><?= $coursecount->cnt ?></span></a>개</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-8 content_box border shadow chart">
                <h2 class="red_bg white"><i class="ti ti-coins icon_coin"></i>월별 수익 현황</h2>
                <div class="monthly_wrap">
                  <canvas id="monthly_chart"></canvas>
                </div>  
              </div>
            <div class="col-md-4">
              <div class="content_box border shadow notice">
                <h2 class="yellow_bg white"><i class="ti ti-category"></i>공지사항(최근순)</h2>
                <?php
             
                if(isset($rscn)){
                  foreach($rscn as $nlist){
            
                ?>
                
                <div class="noti_con">
                  <p title="<?php echo $nlist->nt_title ?>"><a href="/pudding-LMS-website/admin/notice/notice_view.php?ntid=<?php echo $nlist->ntid ?>"><?php echo $nlist->nt_title ?></a></p>

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

//차트  
var salesData = <?php echo $sales_data_json; ?>;

var ctx = document.getElementById('monthly_chart').getContext('2d');
var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['5월','6월','7월','8월','9월'],
        datasets: [{
            label: '월별 매출',
            data: [  salesData.last_month4_sales,salesData.last_month3_sales,salesData.last_month2_sales, salesData.last_month_sales, salesData.current_month_sales],
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
      maintainAspectRatio: false,
  scales: {
    y: {
      stacked: true,
      grid: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    },
    x: {
      grid: {
        display: false
      }
    }
  }
    }
});



</script>
  
<?php
$js_route = "js/index.js";
 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>