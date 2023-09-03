<?php
$title="월별매출통계 관리";
$css_route="sales/css/sales.css";
$js_route = "sales/js/sales.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

// $sql ="SELECT p.*, c.name,c.price_status, u.username  FROM payments p
// JOIN users u ON u.uid = p.uid
// JOIN courses c ON c.cid = p.cid
// ORDER BY p.payid DESC";

// $result = $mysqli-> query($sql);
// while($rs = $result->fetch_object()){
//   $rsc[]=$rs;
// }
// var_dump($rsc);


// 현재월, 전월 
$current_month = date('Y-m');
$last_month = date('Y-m', strtotime('-1 month'));

// 현재 월과 전 월 데이터를 가져오는 SQL 쿼리 작성
$current_month_sales_query = "SELECT SUM(total_price) AS current_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$current_month'";
$last_month_sales_query = "SELECT SUM(total_price) AS last_month_sales FROM payments WHERE DATE_FORMAT(regdate, '%Y-%m') = '$last_month'";

$current_month_result = $mysqli->query($current_month_sales_query);
$last_month_result = $mysqli->query($last_month_sales_query);

// 데이터를 배열로 추출
$current_month_sales = $current_month_result->fetch_assoc();
$last_month_sales = $last_month_result->fetch_assoc();

var_dump($current_month_sales);

// JavaScript로 데이터를 전달하기 위한 JSON 형식으로 데이터 구성
$sales_data = array(
    'current_month_sales' => $current_month_sales['current_month_sales'],
    'last_month_sales' => $last_month_sales['last_month_sales']
);
$sales_data_json = json_encode($sales_data);

var_dump($sales_data_json);



?>
<!-- top_bar -->
      
      <section>
        <h2 class="main_tt dark">월별매출통계</h2>
    
        <form action="" class="sales_sort">
          <div class="row">
            <div class="col-md-4">
              <select
                class="form-select"
                aria-label="Default select example"
                id="cate1"
              >
                <option selected disabled>대분류</option>
                <!-- 추후 value 넣기  -->
                <option value="">프로그래밍</option>
                <option value="">UI/UX</option>
              </select>
            </div>
            <div class="col-md-4">
              <select
                class="form-select"
                aria-label="Default select example"
                id="cate2"
              >
                <option selected disabled>중분류</option>
                <!-- 추후 value 넣기  -->
                <option value="">프론트엔드</option>
                <option value="">백엔드</option>
                <option value="">기타</option>
              </select>
            </div>
            <div class="col-md-4">
              <select
                class="form-select"
                aria-label="Default select example"
                id="cate3"
              >
                <option selected disabled>소분류</option>
                <!-- 추후 value 넣기  -->
                <option value="">HTML</option>
                <option value="">CSS</option>
                <option value="">Javacript</option>
              </select>
            </div>
          </div>
          </form>
          <div class="d-flex justify-content-between chart">
            <div class="chart_container shadow_box">
              <canvas id="line-chart"></canvas>
            </div>
            <div class="chart_container shadow_box">
              <canvas id="bar_chart"></canvas>
            </div>
          </div>
          <div class="d-flex flex-column align-items-center">
          <div class="sales_container shadow_box border">
            <table class="table sales">
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
                  <td scope="row"><?php echo $list->username; ?></td>
                  <td><?php echo $list->name; ?></td>
                  <td><?php echo $list->price_status; ?> 원</td>
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
<script>
  
var salesData = <?php echo $sales_data_json; ?>;

var ctx = document.getElementById('line-chart').getContext('2d');
var lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['전 월', '현재 월'],
        datasets: [{
            label: '월별 매출',
            data: [ salesData.last_month_sales, salesData.current_month_sales],
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

</script>

<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
