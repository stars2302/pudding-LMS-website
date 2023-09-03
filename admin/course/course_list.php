<?php
$title = "강의 관리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
// name
// cate
// content
// thumbnail
// price
// ismain
// isnew
// isbest
// isrecom
// userid
// reg_date
// due_status
// price_status
// c_total_cnt
// courselist
// rate
// rid

$name = $_GET['name'] ?? '';
$cate = $_GET['cate'] ?? '';
$content = $_GET['content'] ?? '';
$thumbnail = $_GET['thumbnail'] ?? '';
$price = $_GET['price'] ?? '';
$isnew = $_GET['isnew'] ?? '';
$ismain = $_GET['ismain'] ?? '';
$isbest = $_GET['isbest'] ?? '';
$isrecom = $_GET['isrecom'] ?? '';
$userid = $_GET['userid'] ?? '';
$due_status = $_GET['due_status'] ?? '';
$price_status = $_GET['price_status'] ?? '';
$sale_end_date = $_GET['sale_end_date'] ?? '';
$c_total_cnt = $_GET['c_total_cnt'] ?? '';
$courselist = $_GET['courselist'] ?? '';
$rate = $_GET['rate'] ?? '';
$rid = $_GET['rid'] ?? '';

$search_where = '';

// $cates = $cates1.$cate2.$cate3;

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
// if($search_keyword){
//   $search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
//   //제목과 내용에 키워드가 포함된 상품 조회
// }


$sql = "SELECT * FROM courses where 1=1"; // and 컬러명=값 and 컬러명=값 and 컬러명=값 
//$sql = $sql.$search_where;

$sql .= $search_where;
$order = " ORDER BY cid DESC"; //최근순 정렬
//$limit = " limit $statLimit, $endLimit";

// $query = $sql.$order.$limit; //쿼리 문장 조합
$query = $sql . $order;
//var_dump($query);

$result = $mysqli->query($query);

while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
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
        <select class="form-select" aria-label="Default select example" id="cate1">
          <option selected disabled>대분류</option>
          <!-- 추후 value 넣기  -->
          <?php
          foreach ($cate1 as $c) {
            ?>
            <option value="<?php echo $c->cid ?>"><?php echo $c->name ?></option>
          <?php } ?>
          <!-- <option value="">프로그래밍</option>
          <option value="">UI/UX</option> -->
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate2">
          <option selected disabled>중분류</option>
          <!-- 추후 value 넣기  -->
          <option value="">프론트엔드</option>
          <option value="">백엔드</option>
          <option value="">기타</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3">
          <option selected disabled>소분류</option>
          <!-- 추후 value 넣기  -->
          <option value="">HTML</option>
          <option value="">CSS</option>
          <option value="">Javacript</option>
        </select>
      </div>
    </div>
    <div class="d-flex align-items-center level_price">
      <div class="d-flex flex-row">
        <h3 class="b_text01">난이도</h3>
        <span>
          <input type="checkbox" name="level" id="basic" value="basic" class="form-check-input">
          <label for="basic">초급</label>
        </span>
        <span>
          <input type="checkbox" name="level" id="Intermediate" value="Intermediate" class="form-check-input">
          <label for="Intermediate">중급</label>
          <!-- id="flexCheckDefault" -->
        </span>
        <span>
          <input type="checkbox" name="level" id="Advanced" value="Advanced" class="form-check-input">
          <label for="Advanced">고급</label>
        </span>
      </div>
      <div class="d-flex flex-row price_check">
        <h3 class="b_text01">가격</h3>
        <span>
          <input type="checkbox" name="price" id="pay" value="pay" class="form-check-input">
          <label for="pay">유료</label>
        </span>
        <span>
          <input type="checkbox" name="price" id="free" value="free" class="form-check-input">
          <label for="free">무료</label>
        </span>
      </div>
      <div class="d-flex search_bar">
        <label for="search" class="hidden"></label>
        <input type="text" id="search" class="form-control" placeholder="강의명으로 검색하세요" aria-label="Username">
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
    <li class="course_list row shadow_box">
      <div class="col-md-8 d-flex">
        <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
        <div class="course_info">
          <div>
            <h3 class="course_list_title b_text01"><a href="course_view.php?cid=<?= $item->cid ?>"><?= $item->name ?></a>
              <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
              <span class="badge rounded-pill green_bg b-pd">초급</span>
            </h3>
            <p><?= $item->content ?>
            </p>
          </div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>3개월</span></p>
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
            <select class="form-select" aria-label="Default select example" id="selectmenu">
              <option selected disabled>상태</option>
              <!-- 추후 value 넣기  -->
              <option value="">활성화</option>
              <option value="">비활성화</option>
            </select>
            <span class="price_btn_wrap">
              <a href="course_up.php" class="btn btn-primary btn_g">수정</a>
              <button class="btn btn-danger">삭제</button>
            </span>
          </span>
        </div>




      </div>

    </li>
    <?php
    } }          
  ?>
  </ul>
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
<script>
  /* 유림 */
  //강의 가격 천단위, 변환

  // let str_price = $('.price').text();
  // let course_price = ($.number(str_price));
  // $('.price').text(course_price+' 원');



//   let priceList = $('.price');

    
// priceList.each(function() {

//     let str_price = $(this).text();
//     let course_price = ($.number(str_price));
//     console.log('course_price',course_price)
//     console.log('str_price',str_price)

//    $(this).text(course_price+' 원');
// });
  /* 유림 */
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>