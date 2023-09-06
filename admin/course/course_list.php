<?php
$title = "강의 관리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';


//체크박스 선택후 버튼 누르면 할일 꼭 하기
//확인바람


$name = $_GET['name'] ?? '';
$level1 = $_GET['level1'] ?? '';
$level2 = $_GET['level2'] ?? '';
$level3 = $_GET['level3'] ?? '';
$act = $_GET['act'] ?? '';

$search_where = '';

//카테고리 조회
if (isset($_GET['cate1'])) {
  $cates1 = $_GET['cate1'];
  $query11 = "SELECT name FROM category WHERE cateid='" . $cates1 . " '";
  $result11 = $mysqli->query($query11);
  $rs11 = $result11->fetch_object();
  $cates1 = $rs11->name;
} else {
  $cates1 = '';
}
if (isset($_GET['cate2'])) {
  $cate2 = $_GET['cate2'];
  $query22 = "SELECT name FROM category WHERE cateid='" . $cate2 . " '";
  $result22 = $mysqli->query($query22);
  $rs22 = $result22->fetch_object();
  $cate2 = $rs22->name;
  $cate2 = "/" . $cate2;
} else {
  $cate2 = '';
}
if (isset($_GET['cate3'])) {
  $cate3 = $_GET['cate3'];
  $query33 = "SELECT name FROM category WHERE cateid='" . $cate3 . " '";
  $result33 = $mysqli->query($query33);
  $rs33 = $result33->fetch_object();
  $cate3 = $rs33->name;
  $cate3 = "/" . $cate3;
} else {
  $cate3 = '';
}


//난이도 조회
// if (isset($_GET['level1'])) {
//   $level1 = $_GET['level1'];
//   //$search_where .= " and level like '%{$level1}%'";
//   $search_where .= " and level like '%{$level1}%'";
// } else {
//   $level1 = '';
// }
// if (isset($_GET['level2'])) {
//   $level2 = $_GET['level2'];
//   $search_where .= " and level like '%{$level2}%'";
//  //$search_where .= " OR level like '%{$level2}%'";
// } else {
//   $level2 = '';
// }
// if (isset($_GET['level3'])) {
//   $level3 = $_GET['level3'];
//   $search_where .= " and level like '%{$level3}%'";
//   //$search_where .= " OR level like '%{$level3}%'";
// } else {
//   $level3 = '';
// }


if (isset($_GET['level1'])) {
  $level1 = $_GET['level1'];
  $search_where .= " and level LIKE '%{$level1}%'";
  if (isset($_GET['level2'])) {
    $level2 = $_GET['level2'];
    $search_where .= " or level LIKE '%{$level2}%'";
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " or level LIKE '%{$level3}%'";
    } else{
      $search_where ;
    }
  } else{
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " or level LIKE '%{$level3}%'";
    } else{
      $search_where ;
    }
  }
} else {
  $level1 = '';
  // $search_where .= " and level LIKE '%{$level1}%'";
  if (isset($_GET['level2'])) {
    $level2 = $_GET['level2'];
    $search_where .= " and level LIKE '%{$level2}%'";
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " or level LIKE '%{$level3}%'";
    }else{
      $search_where .= " and level LIKE '%{$level2}%'";
    }
  }else{
    if(isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " and level LIKE '%{$level3}%'";
    }
  }
}

// if (isset($_GET['level2'])) {
//   $level2 = $_GET['level2'];
//   if (isset($_GET['level2']) && isset($_GET['level1'])) {
//     $level2 = $_GET['level2'];
//     // $search_where .= " OR";
//     $search_where .= " or level LIKE '%{$level2}%'";
//     if (!isset($_GET['level1'])) {
//       $level2 = $_GET['level2'];
//       $search_where .= " and level LIKE '%{$level2}%'";
//     }
//   }
// } else {
//   $level2 = '';
// }
// if (isset($_GET['level3'])) {
//   $level3 = $_GET['level3'];
//   if (isset($_GET['level3']) && ((isset($_GET['level1']) || isset($_GET['level2'])))) {
//     $search_where .= " or level LIKE '%{$level3}%'";
//     if (isset($_GET['level3']) && (!isset($_GET['level1']) && !isset($_GET['level2']))) {
//       $level3 = $_GET['level3'];
//       $search_where .= " and level LIKE '%{$level3}%'";
//     }
//   }
// } else {
//   $level3 = '';
// }





//가격 조회
// if (isset($_GET['price_status'])) {
//   $price_status1 = $_GET['price1'];
//   $search_where .= " and price_status like '%{$price_status1}%'";
// } else {
//   $price_status1 = '';
// }
// if (isset($_GET['price2'])) {
//   $price_status2 = $_GET['price2'];
//   $search_where .= " and price_status like '%{$price_status2}%'";
// } else {
//   $price_status2 = '';
// }
if (isset($_GET['price_status'])) {
  $price_status = $_GET['price_status'];
  $search_where .= " and price_status like '%{$price_status}%'";
} 

// $search_where = '';
$cates = $cates1 . $cate2 . $cate3;
// $levels = $level1 . $level2 . $level3;




if ($cates) {
  $search_where .= " and cate like '%{$cates}%'";
}

// if ($levels) {
//   $search_where .= " and level like '%{$levels}%'";

// }


//강의명검색
if ($name) {
  $search_where .= " and name like '%{$name}%'";
}

$sqlct = "SELECT COUNT(*) as count FROM courses where 1=1".$search_where;
$sqlctrc = $mysqli->query($sqlct);
while ($rs = $sqlctrc->fetch_object()) {
  $sqlctArr[] = $rs;
}
$sales_page = $sqlctArr[0]->count;

//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'coupons'; //pagenation 테이블 명
$pageContentcount = 6; //페이지 당 보여줄 list 개수
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행

//$sqlrc = $sql.$limit; //필터 없
//----------------------------------------------pagenation 끝


$sql2 = "SELECT * FROM courses where 1=1"; // and 컬러명=값 and 컬러명=값 and 컬러명=값 
$sql2 .= $search_where;
$order = " ORDER BY cid DESC"; //최근순 정렬
$query2 = $sql2.$order.$limit; //필터 있
//$limit = " limit $statLimit, $endLimit";

// $query = $sql.$order.$limit; //쿼리 문장 조합
// $query2 = $sql2 . $order;

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
          <input type="radio" name="price_status" id="pay" value="유료" class="form-check-input">
          <label for="pay">유료</label>
        </span>
        <span>
          <input type="radio" name="price_status" id="free" value="무료" class="form-check-input">
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
  <form action="clist_save.php" method="POST" class="course_list_wrap">
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
                        $parts = explode('/', $categoryText);
                        $lastPart = end($parts);

                        echo $lastPart;
                      }
                      ?>
                    </span>
                    <span class="badge level_badge rounded-pill b-pd
                <?php
                // 뱃지컬러
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
                <span class="price content_stt">
                  <?= $item->price ?><span> 원</span>
                </span>
                <span class="d-flex flex-column align-items-end status_wrap">
                  <select name="act[<?= $item->cid ?>]" id="act[<?= $item->cid ?>]" class="form-select"
                    aria-label="Default select example" id="selectmenu">
                    <option selected disabled>상태</option>
                    <option value="활성" <?php if ($item->act == "활성") {
                      echo "selected";
                    } ?>>활성</option>
                    <option value="비활성" <?php if ($item->act == "비활성") {
                      echo "selected";
                    } ?>>비활성</option>
                  </select>
                  <span class="price_btn_wrap">
                    <a href="course_update.php?cid=<?= $item->cid ?>" class="btn btn-primary btn_g">수정</a>
                    <button class="btn btn-danger">삭제</button>
                  </span>
                </span>
              </div>
            </div>
          </li>
          <?php
        }
      } else {
        ?>
        <p colspan="10"> 검색 결과가 없습니다. </p>
        <?php
      }
      ?>
    </ul>
    <button class="btn btn-primary btn_g all_modify_btn">변경 일괄 수정</button>
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
  // $('input[type="checkbox"]').click(function () {
  //   let $this = $(this);
  //   if ($this.prop('checked')) {//체크해서 활성되면
  //     $this.val('1');
  //   } else {
  //     $this.val('0');
  //   }
  // });

  //강의 가격 천단위, 변환
  let priceList = $('.price');

  priceList.each(function () {
    let str_price = $(this).text();
    let course_price = ($.number(str_price));
    $(this).text(course_price + ' 원');
  });

</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>