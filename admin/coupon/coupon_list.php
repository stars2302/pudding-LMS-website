<?php
$title="쿠폰리스트";
$css_route="coupon/css/coupon_list.css";
$js_route = "coupon/js/coupon.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';




//전체 / 활성 / 비활성 쿠폰개수(고정)
$allsql = "SELECT * from coupons where 1=1";
$allrc = $mysqli -> query($allsql);
while($rs = $allrc -> fetch_object()){
  $allrsc[] = $rs;
}

if(isset($allrsc)){
  $coupon_ing = 0;
  $coupon_end = 0;
  for($i = 0; $i<count($allrsc); $i++){
    if($allrsc[$i]->cp_status == 1) {
      $coupon_ing++;
    }
    if($allrsc[$i]->cp_status == 0) {
      $coupon_end++;
    }
  }
}


//필터되어 나타날 쿠폰
$sql = "SELECT * from coupons where 1=1";
$order = ' order by cpid desc';
$sc_where = '';


//쿠폰 활성/비활성 filter 조건
$cp_filter = $_GET['coupon_filter']??'';
$filter_where = '';
var_dump($cp_filter);
if($cp_filter == '-1' || $cp_filter == ''){
  $filter_where .= " 1=1";
  $sc_where .= '';
} else{
  $filter_where .= " cp_status='{$cp_filter}'";
  $sc_where .= ' and'.$filter_where;
}

// var_dump($filter_where);

$search_where = '';
//검색어(필터 상관없이 전체쿠폰에서 검색)
$cp_search = $_GET['search']??'';
var_dump($cp_search);
if($cp_search){
  $search_where .= " cp_name like '%{$cp_search}%'";
  $sc_where = ' and'.$search_where;
  //제목과 내용에 키워드가 포함된 상품 조회
} else{
  $search_where = '';
}
var_dump($search_where);




//----------------------------------------------pagenation 시작
//pagenation 필터 조건문 (필터 없으면 필요없음)
if($cp_filter !== '' && $search_where === ''){
  $pagerwhere = $filter_where;
} else if($cp_search !== '' && $cp_filter === ''){
  $pagerwhere = $search_where;
} else{
  $pagerwhere = ' 1=1';
}
// var_dump($pagerwhere);


//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'coupons'; //pagenation 테이블 명
$pageContentcount = 6; //페이지 당 보여줄 list 개수
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행
$sqlrc = $sql.$sc_where.$order.$limit; //필터 있
// $sqlrc = $sql.$limit; //필터 없
//----------------------------------------------pagenation 끝






// var_dump($sqlrc);
$result = $mysqli -> query($sqlrc);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
}




?>

    <div class="sub_header d-flex justify-content-between align-items-center">
      <h2 class="main_tt">쿠폰관리</h2>
      <form action="" class="d-flex align-items-center coupon_keyword_search">
        <div class="input-group">
          <input
            type="text"
            class="form-control"
            placeholder="쿠폰명을 입력하세요."
            aria-label="쿠폰명을 입력하세요."
            name="search"
          />
        </div>
        <button class="btn btn-dark">검색</button>
      </form>
      <a href="coupon_create.php" class="btn btn-primary">쿠폰등록</a>
    </div><!-- //sub_header -->
  
    <form action="" class="coupon_filter">
      <h2 class="hidden">클릭하여 진행중 또는 종료된 쿠폰을 확인하세요.</h2>
      <div class="coupon_status_search d-flex justify-content-betweenn white_bg align-items-center">
        <div class="filter_1">
          <h3 class="b_text01">총 쿠폰 개수</h3>
          <label for="all" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo count($allrsc);} else{echo '0';} ?></em>개</label>
          <input type="radio" value="-1" class="hidden" id="all" name="coupon_filter">
        </div>
        <div class="filter_2">
          <h3 class="b_text01">활성화 쿠폰 개수</h3>
          <label for="ing" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo $coupon_ing;} else{echo '0';} ?></em>개</label>
          <input type="radio" value="1" class="hidden" id="ing" name="coupon_filter">
        </div>
        <div class="filter_3">
          <h3 class="b_text01">비활성화 쿠폰 개수</h3>
          <label for="end" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo $coupon_end;} else{echo '0';} ?></em>개</label>
          <input type="radio" value="0" class="hidden" id="end" name="coupon_filter">
        </div>
      </div>
      <button class="hidden">필터실행</button>
    </form><!-- coupon_filter -->

    <div class="coupons">
      <h2 class="hidden">쿠폰리스트</h2>
      <ul class="d-flex flex-wrap justify-content-between g-5">
        <?php
        if(isset($rsc)){
          foreach($rsc as $coupon){
        ?>

        <li class="coupon shadow_box border white_bg d-flex" data-cpid="<?= $coupon->cpid ?>">
          <img src="<?= $coupon->cp_image ?>" alt="<?= $coupon->cp_name ?>" class="border">
          <div class="text_box">
            <?php
            if($coupon->cp_status == 1){
              echo '<span class="badge rounded-pill badge_blue b-pd">활성화</span>';
            } else{
              echo '<span class="badge rounded-pill badge_red b-pd">비활성화</span>';
            }
            ?>
            <h3 class="b_text01" title="<?= $coupon->cp_name ?>"><?= $coupon->cp_name ?></h3>
            <p>사용기한 : <?php if($coupon->cp_date == ''){echo '무제한';}else{echo $coupon->cp_date.'개월';} ?></p>
            <p>최소사용금액 : <span class="number"><?= $coupon->cp_limit ?></span>원</p>
            <p><?php if($coupon->cp_type == '정액'){echo '할인액';}else{echo '할인율';} ?> : <span class="number"><?php if($coupon->cp_type == '정액'){echo $coupon->cp_price;}else{echo $coupon->cp_ratio.'%';} ?></span>원</p>
          </div>

          <div class="icons">
            <a href="/pudding-LMS-website/admin/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="ti ti-edit pen_icon"></i></a>
            <a href="/pudding-LMS-website/admin/coupon/coupon_delete_ok.php?cpid=<?= $coupon->cpid ?>" class="del_btn"><i class="ti ti-trash bin_icon"></i></a>
          </div>

          <div class="form-check form-switch cp_status_toggle">
            <input
              class="form-check-input"
              type="checkbox"
              role="switch"
              id="flexSwitchCheckDefault"
              <?php if($coupon->cp_status == 1){echo 'checked';} else{echo '';}?>
            />
            <label class="form-check-label" for="flexSwitchCheckDefault">
            </label>
          </div>
        </li>

        <?php
          }
        }else {
        ?>

        
        <p>등록된 쿠폰이 없습니다.</p>

        <?php
        }
        ?>
      </ul>
    </div>
    

    <!-- ***------------------------- pagination - 시작 -------------------------*** -->
    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination coupon_pager">
        <?php
          if($pageNumber>1 && $block_num > 1 ){
            //이전버튼 활성화
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          } else{
            //이전버튼 비활성화
            echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          }


          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                //필터 있
                echo "<li class=\"page-item active\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                // echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                //필터 있
                echo "<li class=\"page-item\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                // echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }
          }


          if($pageNumber<$total_page && $block_num < $total_block){
            //다음버튼 활성화
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          } else{
            //다음버튼 비활성화
            echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";

          }
        ?>
      </ul>
    </nav>
    <!-- ***------------------------- pagination - 끝 -------------------------*** -->
  </div><!-- //content_wrap -->
</div><!-- //wrap -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>