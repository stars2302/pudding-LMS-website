<?php
$title = "강의 관리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';


$name = $_GET['name'] ?? '';
$cates1 = $_GET['cate1'] ?? '';
$cate2 = $_GET['cate2'] ?? '';
$cate3 = $_GET['cate3'] ?? '';
$price_status1 = $_GET['price_status1'] ?? '';
$price_status2 = $_GET['price_status2'] ?? '';
$level1 = $_GET['level1'] ?? '';
$level2 = $_GET['level2'] ?? '';
$level3 = $_GET['level3'] ?? '';
$act = $_GET['act'] ?? '';

// $content = $_GET['content'] ?? '';
// $thumbnail = $_GET['thumbnail'] ?? '';

// $due = $_GET['due'] ?? '';


// $userid = $_GET['userid'] ?? '';
// $due_status = $_GET['due_status'] ?? '';


$search_where = '';
$cates = $cates1 . $cate2 . $cate3;
$levels = $level1 . $level1 . $level1;
$price_statuss = $price_status1 . $price_status2;

if ($cates) {
  $search_where .= " and cate like '%{$cates}%'";
}
if ($levels) {
  $search_where .= " and level like '%{$levels}%'";
}
if ($price_statuss) {
  $search_where .= " and price_status like '%{$price_statuss}%'";
}
if ($name) {
  $search_where .= " and name like '%{$name}%'";
}





// // if($search_keyword){
// //   $search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
// //   //제목과 내용에 키워드가 포함된 상품 조회
// // }



$sql2 = "SELECT * FROM courses where 1=1"; // and 컬러명=값 and 컬러명=값 and 컬러명=값 
$sql2 .= $search_where;
//var_dump($sql2);
$order = " ORDER BY cid DESC"; //최근순 정렬
//$limit = " limit $statLimit, $endLimit";

// $query = $sql.$order.$limit; //쿼리 문장 조합
$query2 = $sql2 . $order;

$result2 = $mysqli->query($query2);

while ($rs2 = $result2->fetch_object()) {
  $rsc2[] = $rs2;
}

?>

<section>
  <h2 class="main_tt dark">강의 관리</h2>
  <div class="link_btn">
    <a href="course_create.php" class="btn btn-dark">신규 강의 등록</a>
    <a href="category.php" class="btn btn-dark">카테고리 관리</a>
  </div>
  <form action="" class="course_sort">
    <div class="row">
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>

          <?php
          foreach ($cate1 as $c) {
            ?>
            <option value="<?php echo $c->cateid ?>" data-cate="<?= $c->name; ?>"><?php echo $c->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
          <option selected disabled>중분류</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
        </select>
      </div>
    </div>
    <div class="d-flex align-items-center level_price">
      <div class="d-flex flex-row">
        <h3 class="b_text01">난이도</h3>
        <span>
          <input type="checkbox" name="level1" id="basic" value="초급" class="form-check-input">
          <label for="basic">초급</label>
        </span>
        <span>
          <input type="checkbox" name="level2" id="Intermediate" value="중급" class="form-check-input">
          <label for="Intermediate">중급</label>
        </span>
        <span>
          <input type="checkbox" name="level3" id="Advanced" value="고급" class="form-check-input">
          <label for="Advanced">고급</label>
        </span>
      </div>
      <div class="d-flex flex-row price_check">
        <h3 class="b_text01">가격</h3>
        <span>
          <input type="checkbox" name="price1" id="pay" value="유료" class="form-check-input">
          <label for="pay">유료</label>
        </span>
        <span>
          <input type="checkbox" name="price2" id="free" value="무료" class="form-check-input">
          <label for="free">무료</label>
        </span>
      </div>
      <div class="d-flex search_bar">
        <label for="search" class="hidden"></label>
        <input type="text" name="name" id="search" class="form-control" placeholder="강의명으로 검색하세요" aria-label="Username">
        <button class="btn btn-primary">검색</button>
      </div>
    </div>
  </form>

  <!-- 리스트 -->
  <form action="clist_update.php" method="POST">
    <ul>
      <?php
      if (isset($rsc2)) {
        foreach ($rsc2 as $item) {
          $cateString = $item->cate;
          $parts = explode('/', $cateString);

          $big_cate = $parts[0];
          $md_cate = $parts[1];
          $sm_cate = $parts[2];
          ?>
          <li class="course_list row shadow_box">
            <input type="hidden" name="cid[]" value="<?php echo $item->cid ?>">
            <div class="col-md-8 d-flex">
              <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
              <div class="course_info">
                <div>
                  <h3 class="course_list_title b_text01"><a href="course_view.php?cid=<?= $item->cid ?>"><?= $item->name ?></a>
                    <span class="badge rounded-pill blue_bg b-pd">
                      <?php
                      //뱃지 키워드 
                      if (isset($item->cate)) {
                        $categoryText = $item->cate;
                        $parts = explode('/', $categoryText); // Split the string by '/'
                        $lastPart = end($parts); // Get the last element in the array
                  
                        echo $lastPart; // Output: "javascript"
                      }
                      ?>
                    </span>
                    <span class="badge level_badge rounded-pill b-pd
                <?php
                //  뱃지컬러
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
                      <?= $item->level ?>
                    </span>
                  </h3>
                  <p>
                    <?= $item->content ?>
                  </p>
                </div>
                <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>
                    <?php if ($item->due == '') {
                      echo '무제한';
                    } else {
                      echo $item->due;
                    }
                    ; ?>
                  </span></p>
              </div>
            </div>
            <div class="col-md-4">
              <nav
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">
                      <?= $big_cate ?>
                    </a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?= $md_cate ?>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?= $sm_cate ?>
                  </li>

                </ol>
              </nav>

              <div class="d-flex align-items-end status_box">
                  <span class="col price content_stt number">
                    <?= $item->price?> 
                  </span>
                <span class="d-flex flex-column align-items-end status_wrap">
                  <select name="act[<?= $item->cid ?>]" id="act[<?= $item->cid ?>]" class="form-select"
                    aria-label="Default select example" id="selectmenu">
                    <option selected disabled>상태</option>
                    <!-- 추후 value 넣기  -->
                    <option value="활성" <?php if ($item->act == "활성") {
                      echo "selected";
                    } ?>>활성</option>
                    <option value="비활성" <?php if ($item->act == "비활성") {
                      echo "selected";
                    } ?>>비활성</option>
                  </select>
                  <span class="price_btn_wrap">
                    <a href="course_update.php?cid=<?= $item->cid ?>" class="btn btn-primary btn_g">수정</a>
                    <a href="course_delete.php?cid=<?= $item->cid ?>" class="btn btn-danger">삭제</a>
                  </span>
                </span>
              </div>
            </div>
          </li>
          <?php
        }
      } else {
        ?>
        <p colspan="10"> 검색 결과 없습니다 </p>
        <?php
      }
      ?>
    </ul>
    <button class="btn btn-primary btn_g">일괄수정</button>
  </form>


  <!-- pagination -->
  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</section>


</div><!-- content_wrap -->
</div><!-- wrap -->

<script src="js/makeoption.js"></script>

<script>

  $('input[type="checkbox"]').click(function () {
    let $this = $(this);
    if ($this.prop('checked')) {//체크해서 활성되면
      $this.val('1');
    } else {
      $this.val('0');
    }
  });

  //강의 가격 천단위, 변환
  let priceList = $('.price');

  priceList.each(function () {
    let str_price = $(this).text();
    let course_price = ($.number(str_price));
    $(this).text(course_price + ' 원');
  });

  // green_bg

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>