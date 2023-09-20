<?php
$title="월별매출통계 관리";
$css_route="sales/css/sales.css";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

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

$selected_month = isset($_GET['month']) ? $_GET['month'] : date('m');

$rsc = [];
$sales_page;
if (isset($_GET['month'])) {
  $selected_month = $_GET['month'];
  $sql = "SELECT COUNT(*) as count FROM payments WHERE DATE_FORMAT(regdate, '%m') = '$selected_month'";

  $result = $mysqli->query($sql);
  $rsc = [];
  
  while ($rs = $result->fetch_object()) {
      $rsc[] = $rs;
  }
  $sales_page = $rsc[0]->count;
}


$sql = "SELECT payid, userid, name, total_price, regdate FROM payments WHERE DATE_FORMAT(regdate, '%m') = '$selected_month' order by regdate desc";


$pagenationTarget = 'payments'; 
$pageContentcount = 10; 

if (!isset($pagerwhere)) {
  $pagerwhere = ' DATE_FORMAT(regdate, \'%m\') = \'' . $selected_month . '\'';
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; 

$sqlrc = $sql . $limit; 
$result = $mysqli->query($sqlrc); 

$rscc = [];

while ($rs = $result->fetch_object()) {
    $rscc[] = $rs;
}


//bar_chart
$sql = "SELECT name, SUM(total_price) AS total_price_sum
        FROM payments
        WHERE DATE_FORMAT(regdate, '%m') = '$selected_month'
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

//pie_chart
$sqlTopBuyers = "SELECT userid, SUM(total_price) AS total_price_sum
                FROM payments
                WHERE DATE_FORMAT(regdate, '%m') = '07'
                GROUP BY userid
                ORDER BY total_price_sum DESC
                LIMIT 5"; 

$resultTopBuyers = $mysqli->query($sqlTopBuyers);
$topBuyersData = [];

while ($row = $resultTopBuyers->fetch_assoc()) {
    $topBuyersData[] = [
        'userid' => $row['userid'],
        'total_price_sum' => $row['total_price_sum'],
    ];
}


function getMonthlyData($selected_month) {
  global $mysqli; 
  $rsc = []; 
  $sql = "SELECT * FROM payments where  DATE_FORMAT(regdate, '%m') = '$selected_month' ORDER BY payid ";
  $result = $mysqli->query($sql);
  while ($rs = $result->fetch_object()) {
      $rsc[] = $rs;
  }
  return $rsc; 
}

?>      
  <section>
    <h2 class="main_tt dark">월별매출통계</h2>
    <form action="#" id="search_form" >
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
    
<?php

if (isset($_GET['month']) || empty($_GET)) {
    $rsc = getMonthlyData($selected_month);
}
?>
          <div class="d-flex justify-content-between chart">
            <div class="chart_box shadow_box">
              <h5>가장 많이 구입한 userid</h5>
              <div class="chart_container">
              <canvas id="pie_chart"></canvas>
            </div>
          </div>
          <div class="chart_box shadow_box">
          <h5>선택한 달의 소분류별 매출 순위</h5>
            <div class="chart_container">
              <canvas id="bar_chart" style="height:80%"></canvas>
            </div>
          </div>
          
          </div>
          <div class="d-flex flex-column align-items-center">
          <div class="sales_container shadow_box border">
            <table class="table sales" id="payment_table">
              <thead>
                <tr>
                  <th scope="col" class="col1">회원ID</th>
                  <th scope="col" class="col2">강의소분류명</th>
                  <th scope="col" class="col3">가격</th>
                  <th scope="col" class="col4">구입날짜</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($rscc)){
                  foreach($rscc as $list){
                ?>
                <tr>
                  <td><?php echo $list->userid; ?></td>
                  <td><?php echo $list->name; ?></td>
                  <td><span class="number"><?php echo number_format($list->total_price); ?></span><span>원</span></td>
                  <td><?= date('Y-m-d', strtotime($list -> regdate)) ;?></td>
                </tr>
                <?php
                      }
                    }
                ?>
                
              </tbody>
            </table>
            
          </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination coupon_pager">
        <?php
          if($pageNumber>1 && $block_num > 1 ){
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          }


          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\"><a href=\"?month=$selected_month&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?month=$selected_month&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }
          }


          if($pageNumber<$total_page && $block_num < $total_block){
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";

          }
        ?>
      </ul>
    </nav>
        </div>
      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->

<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>

<script>

var chartData = <?php echo json_encode($chartData); ?>;
var chartLabels = chartData.map(item => item.name);
var chartValues = chartData.map(item => item.total_price_sum);


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



var pieChartLabels = <?php echo json_encode(array_column($topBuyersData, 'userid')); ?>;
var pieChartValues = <?php echo json_encode(array_column($topBuyersData, 'total_price_sum')); ?>;


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
        height:200,
    }
});






</script>

<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
