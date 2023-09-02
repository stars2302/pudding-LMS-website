<?php
$title="월별매출통계 관리";
$css_route="sales/css/sales.css";
$js_route = "sales/js/sales.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

$sql ="SELECT p.*, c.name,c.price, u.username  FROM payments p
JOIN users u ON u.uid = p.uid
JOIN courses c ON c.cid = p.cid
ORDER BY p.payid DESC";

$result = $mysqli-> query($sql);
while($rs = $result->fetch_object()){
  $rsc[]=$rs;
}
// var_dump($rsc);
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
                  <td><?php echo $list->price; ?> 원</td>
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


<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
