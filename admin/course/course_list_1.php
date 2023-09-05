<?php
$title = "강의 관리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/category_func.php';

$cates1 = $_GET['cate1'] ?? '';
$cate2 = $_GET['cate2'] ?? '';
$cate3 = $_GET['cate3'] ?? '';
$level = $_GET['level'];
$due_status = $_GET['due_status'];
$due_status = $_GET['due_status'];


$search_where = '';
$cates = $cate1.$cate2.$cate3;
$levels = $level1.$level1.$level1;
$price_statuss = $price_status1.$price_status2;

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




$cates = $cates1.$cate2.$cate3;

if ($cate) {
  $search_where .= " and cate like '{$cate}%'";
}
if ($ismain) {
  $search_where .= " and ismain = 1";
}
if ($isnew) {
  $search_where .= " and isnew = 1";
}
if ($isbest) {
  $search_where .= " and isbest = 1";
}
if ($isrecom) {
  $search_where .= " and isrecom = 1";
}
if ($sale_end_date) {
  $search_where .= " and sale_end_date >= '$sale_end_date'";
  //판매 종료일이 지나지 않은 상품 조회
}
if($search_keyword){
  $search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
  //제목과 내용에 키워드가 포함된 상품 조회
}




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
//킵

//킵2 cht
// $cate = $_GET['cate'] ?? '';

// $sql = "SELECT * FROM courses where 1=1"; // and color name=value and color name=value and color name=value
// $sql .= $search_where;
// $order = "ORDER BY cid DESC";
//킵2 cht
//  $cid = $_POST['cid'] ?? '';
//  //$cate = $_GET['cate'] ?? '';

// $catesql = "SELECT * FROM courses where cid = {$cid}"; 
// $cateresult = $mysqli->query($catesql);

// $crsc = []; 

// while ($caters = $cateresult->fetch_object()) {
//     $crsc[] = $caters;
// }
// echo  $crsc;

// foreach ($crsc as $course) {
//     $parts = explode('/', $course->cate);

//     foreach ($parts as $part) {
//         echo $part . '<br>';
//     }
// }




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
            <option value="<?= $c->cateid ?>" data-cate="<?= $c->name; ?>"><?= $c->name; ?></option>
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
  <ul>
  <?php
    if(isset($rsc)){
      foreach($rsc as $item){            
  ?>
    <li class="course_list row shadow_box mt-3">
      <div class="col-md-8 d-flex">
        <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
        <div class="course_info">
          <div>
            <h3 class="course_list_title b_text01"><a href="course_view.php?cid=<?= $item->cid ?>"><?= $item->name ?></a>
              <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
              <span class="badge rounded-pill green_bg b-pd"><?=$item->level ?></span>
            </h3>
            <p><?= $item->content ?>
            </p>
          </div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span><?=$item->due ?></span></p>
        </div>
      </div>
      <div class="col-md-4">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">프로그래밍</a></li>
            <li class="breadcrumb-item active" aria-current="page">프론트엔드</li>
            <li class="breadcrumb-item active" aria-current="page">Javascript</li>
          </ol>
        </nav>

        <div class="d-flex align-items-end status_box">
          <span class="price content_stt"><?= $item->price ?></span>
          <span class="d-flex flex-column align-items-end status_wrap">
            <select name="status[<?=$item->cid ?>]" id="status[<?= $item->cid ?>]"  class="form-select" aria-label="Default select example" id="selectmenu">
              <option selected disabled>상태</option>
              <!-- 추후 value 넣기  -->
              <option value="1"  <?php if($item->act=="활성") {echo "selected"; } ?>>활성화</option>
              <option value="0" <?php if($item->act=="비활성") {echo "selected"; } ?>>비활성화</option>
            </select>
            <span class="price_btn_wrap">
              <a href="course_update.php?cid=<?=$item->cid ?>" class="btn btn-primary btn_g">수정</a>
              <a href="course_delete.php?cid=<?=$item->cid ?>" class="btn btn-danger btn_g">삭제</a>
            </span>
          </span>
        </div>
      </div>

    </li>
    <?php
    } }          
  ?>
  </ul>
  <a href="clist_update.php" class="btn btn-primary btn_g">일괄수정</a>
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

<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>

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