<?php
$title="월별매출통계 관리";
$css_route="sales/css/sales.css";
// $js_route = "sales/js/sales.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';


// 월 옵션 생성 
$months = [
  '01' => '1월',
  '02' => '2월',
  '03' => '3월',
  '04' => '4월',
  '05' => '5월',
  '06' => '6월',
  '07' => '7월',
  '08' => '8월',
  '09' => '9월',
  '10' => '10월',
  '11' => '11월',
  '12' => '12월',
];

// 선택된 월 (기본값은 현재 월)
$selected_month = date('m');

if (isset($_POST['month'])) {
  // 폼에서 선택된 월을 처리
  $selected_month = $_POST['month'];

  // SQL 쿼리 - 선택된 월에 해당하는 payments 데이터 검색
  $sql = "SELECT * FROM payments where  DATE_FORMAT(buy_date, '%m') = '$selected_month' ORDER BY payid ";
      

  $result = $mysqli->query($sql);
  $rsc = array();
  
  while ($rs = $result->fetch_object()) {
      $rsc[] = $rs;
  }
}

// var_dump($rsc);

//bar_chart
// 선택한 월에 해당하는 데이터를 가져오는 SQL 쿼리 작성
$sql = "SELECT name, SUM(total_price) AS total_price_sum
        FROM payments
        WHERE DATE_FORMAT(buy_date, '%m') = '$selected_month'
        GROUP BY name
        ORDER BY total_price_sum DESC";

$result = $mysqli->query($sql);
$chartData = [];

while ($row = $result->fetch_assoc()) {
    $chartData[] = [
        'name' => $row['name'],
        'total_price_sum' => $row['total_price_sum'],
    ];
}

//pie
// 선택한 7월에 가장 많은 금액을 구매한 사용자를 검색하는 SQL 쿼리
$sqlTopBuyers = "SELECT userid, SUM(total_price) AS total_price_sum
                FROM payments
                WHERE DATE_FORMAT(buy_date, '%m') = '07'
                GROUP BY userid
                ORDER BY total_price_sum DESC
                LIMIT 5"; // 상위 5명만 가져오도록 제한

$resultTopBuyers = $mysqli->query($sqlTopBuyers);
$topBuyersData = [];

while ($row = $resultTopBuyers->fetch_assoc()) {
    $topBuyersData[] = [
        'userid' => $row['userid'],
        'total_price_sum' => $row['total_price_sum'],
    ];
}

?>
<!-- top_bar -->
      
      <section>
        <h2 class="main_tt dark">월별매출통계</h2>
    
        <form action="" id="search_form" method="POST">
        <div >
            <div class>
                <select class="form-select cate_select" aria-label="Default select example" id="month" name="month">
                    <?php
                    foreach ($months as $key => $value) {
                        $selected = ($key == $selected_month) ? 'selected' : '';
                        echo "<option value='$key' $selected>$value</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary search_btn">조회</button>
    </form>
          <div class="d-flex justify-content-between chart">
            <div class="chart_container shadow_box">
              <canvas id="pie_chart"></canvas>
             

            </div>
            <div class="chart_container shadow_box">
              <canvas id="bar_chart"></canvas>
            </div>
          </div>
          <div class="d-flex flex-column align-items-center">
          <div class="sales_container shadow_box border">
            <table class="table sales" id="payment_table">
              <thead>
                <tr>
                  <th scope="col" class="col1">사용자ID</th>
                  <th scope="col" class="col2">강의명</th>
                  <th scope="col" class="col3">가격</th>
                  <th scope="col" class="col4">구입날짜</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($rsc)){
                  foreach($rsc as $list){

            
                ?>
                <tr>
                  <td scope="row"><?php echo $list->userid; ?></td>
                  <td><?php echo $list->name; ?></td>
                  <td><?php echo $list->total_price; ?> 원</td>
                  <td><?php echo $list->buy_date; ?></td>
                </tr>
                <?php
                      }
                    }
                ?>
                
              </tbody>
            </table>
            
          </div>
          <nav
      aria-label="Page navigation example"
      class="d-flex justify-content-center pager"
    >
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&lsaquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
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
      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->

<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>

<script>
// PHP데이터-> JavaScript
var chartData = <?php echo json_encode($chartData); ?>;
var chartLabels = chartData.map(item => item.name);
var chartValues = chartData.map(item => item.total_price_sum);

// 막대 그래프 생성
var ctx = document.getElementById('bar_chart').getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: chartLabels,
        datasets: [{
            label: '매출',
            data: chartValues,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
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


// 파이 그래프 데이터 생성
var pieChartLabels = <?php echo json_encode(array_column($topBuyersData, 'userid')); ?>;
var pieChartValues = <?php echo json_encode(array_column($topBuyersData, 'total_price_sum')); ?>;

// 파이 그래프 생성
var ctxPie = document.getElementById('pie_chart').getContext('2d');
var pieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: pieChartLabels,
        datasets: [{
            data: pieChartValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});






</script>

<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
