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

?>
<!-- top_bar -->
      
      <section>
        <h2 class="main_tt dark">월별매출통계</h2>
    
        <form action="" id="search_form" method="POST">
        <div class="row">
            <div class="col-md-2">
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
              <canvas id="line-chart"></canvas>
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






</script>

<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
