<?php
$title="강의리스트";
$css_route="course/css/user_course.css";
$js_route = "course/js/user_course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

//main페이지 검색 
$c_where = '';
if (isset($_GET['course_search'])) {
  $key = $_GET['course_search'];
  $c_where = " and name LIKE '%$key%' OR cate LIKE '%$key%' OR level LIKE '%$key%'";
};
if (isset($_GET['catename'])) {
  $keycate = $_GET['catename'];
  $c_where = " and cate LIKE '%$keycate'";
};


$sql = "SELECT * from courses where 1=1 " ;
$order = ' order by cid desc';

$cate = $_GET['cate']??'';
$level = $_GET['level']??'';
$pay = $_GET['pay']??'';
$param = '';

$cate_where = '';
$filter_where = '';
$fil_where = '';


//카테고리 조회
if($cate != ''){
  if($cate == '프론트엔드'){
    $c_where .= " and cate LIKE '%{$cate}%'";
  }else if($cate == '백엔드'){
    $c_where .= " and cate LIKE '%{$cate}%'";
  }else if($cate == '디자인'){
    $c_where .= " and cate LIKE '%{$cate}%'";
  }else{
    $c_where .= "";
  }
}else{
  $c_where .= "";
}

//난이도 조회
if($level != ''){
  if($level == '초급'){
    $c_where .= " and level LIKE '%{$level}%'";
  }else if($level == '중급'){
    $c_where .= " and level LIKE '%{$level}%'";
  }else if($level == '고급'){
    $c_where .= " and level LIKE '%{$level}%'";
  }
}else{
  $c_where .= "";
}

//가격 조회
if($pay != ''){
  $c_where .= " and price_status='{$pay}'";
  // $param .="&price_status='{$pay}'";
}else{
  $c_where .= "";
}


//검색
$search_where = '';
$search = $_GET['search']??'';

if($search){
  $search_where .= "and name like '%{$search}%'";
} else{
  $search_where = '';
}
$c_where .= $search_where;


// $sqlrc = $sql.$c_where.$order; 
if(!isset($pagerwhere)){
  $pagerwhere = " 1=1";
}

$sql2 = "SELECT COUNT(*) as count from courses where 1=1 ".$c_where;

$result4 = $mysqli->query($sql2);

$rs = $result4->fetch_object();
$sales_page = $rs->count;


//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'courses'; //pagenation 테이블 명
$pageContentcount = 9; //페이지 당 보여줄 list 개수


include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행
$sqlrc = $sql.$c_where.$order.$limit; //필터 있

// $sqlrc = $sql.$c_where.$course_keyword.$cate_keyword.$order.$limit;
//----------------------------------------------pagenation 끝


// var_dump($sqlrc);
$result = $mysqli -> query($sqlrc);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
}

?>
    <main>
      <div class="container">
        <div class="section1 d-flex justify-content-between pd_2 pd_5">
          <div class="courseBigTitle jua">
            <h1>강의리스트</h1>
          </div>
          <form action="#" class="d-flex gap-3">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="강의명으로 검색"
                name="search"
              >
            </div>
            <div class="searchBtn">
              <button class="btn btn-primary dark">검색</button>
            </div>
          </form>
        </div>
        <div class="mainSection d-flex gap-5">
          <form action="#" id="filter-form" class="courseCheckBox mb-5" method="GET">
            <!-- <input type="hidden" name="cate-array" id="cate-array" value=""> -->
            <div class="checkBox_1 mb-3">
              <h6>카테고리</h6>
              <hr class="mt-4">
              <div class="form-check mt-5">
                <label class="form-check-label" for="total"> 전체선택 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="전체선택"
                  name="cate"
                  id="total"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="frontend">
                  프론트엔드
                </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="프론트엔드"
                  name="cate"
                  id="frontend"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="backend"> 백엔드 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="백엔드"
                  name="cate"
                  id="backend"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="design"> 디자인 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="디자인"
                  name="cate"
                  id="design"
                >
              </div>
            </div>
            <div class="checkBox_2 mb-3">
              <h6>난이도</h6>
              <hr class="mt-4">
              <div class="form-check mt-5">
                <label class="form-check-label" for="level1"> 초급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="초급"
                  name="level"
                  id="level1"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level2"> 중급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="중급"
                  name="level"
                  id="level2"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level3"> 고급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="고급"
                  name="level"
                  id="level3"
                >
              </div>
            </div>
            <div class="checkBox_3">
              <h6>가격</h6>
              <hr class="mt-4">
              <div class="form-check mt-5">
                <label class="form-check-label" for="free"> 무료 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="무료"
                  name="pay"
                  id="free"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="pay"> 유료 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="유료"
                  name="pay"
                  id="pay"
                >
              </div>
            </div>
            <button id="filter-submit-btn" class="btn btn-primary dark">필터실행</button>
          </form>
          <div class="courseList">
            <div class="row mb-5">
              <?php
                if(isset($rsc)){
                  foreach($rsc as $item){
              ?>        
              <div class="col-12 col-sm-6 col-md-4 courseBox shadow_box"  onclick="location.href='course_view.php?cid=<?= $item->cid ?>'">
                <div class="imgBox">
                  <img
                    src="<?= $item -> thumbnail?>"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  >
                </div>
                <div class="contentBox d-flex flex-column justify-content-between">
                  <div>
                    <div class="d-flex gap-1">
                      <span class="badge rounded-pill blue_bg b-pd">
                        <?php
                          if (isset($item->cate)) {
                            $categoryText = $item->cate;
                            
                            $parts = explode('/', $categoryText);
                            $lastPart = $parts[1];
  
                            echo $lastPart;
                          }
                          // var_dump($parts);
                        ?>
                      </span>
                      <span class="badge rounded-pill b-pd
                        <?php
                          $levelBadge = $item->level;
                          if ($levelBadge === '초급') {
                            echo 'yellow_bg';
                          } else if ($levelBadge === '중급') {
                            echo 'green_bg';
                          } else {
                            echo 'red_bg';
                          }
                        ?>
                        ">
                        <?= $item->level; ?>
                      </span>
                    </div>
                    <div class="courseName fw-bold">
                      <?= $item->name?>
                    </div>
                  </div>
                  <div class="contentTM d-flex flex-column align-items-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 <?= $item->due?></span>
                    </div>

                    <!-- 무료표시하기 -->
                    <?php
                    if($item->price_status != "무료"){
                    ?>
                      <div>
                        <span class="content_tt number"><?= $item->price?></span><span>원</span>
                      </div>
                    <?php
                    }else{
                    ?>
                      <div>
                        <span class="content_tt">무료</span>
                      </div>
                    <?php 
                    } 
                    ?>
                    <!-- 무료표시 끝 -->
                  </div>
                </div>
              </div>
              <?php
                }
              }else{
              ?> 
                <p>검색결과가 없습니다.</p>
              <?php
              }
              ?>
            </div>
            <script>
              let currentUrl = window.location.href;
              let url = currentUrl.replace('#', '');
            </script>
            <?php
              $url = "<script>document.write(currentUrl);</script>" ;
            ?>

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
                        echo "<li class=\"page-item active\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                    }else{
                        echo "<li class=\"page-item\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
    
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
        </div>
      </div>
    </main>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

