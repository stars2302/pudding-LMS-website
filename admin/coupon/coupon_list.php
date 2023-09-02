<?php
$title="쿠폰리스트";
$css_route="coupon/css/coupon_list.css";
$js_route = "coupon/js/coupon.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

$sql = "SELECT * from coupons where 1=1";
$order = ' order by cpid desc';
$sc_where = '';


$cp_filter = $_GET['cp_status']??'';
var_dump($cp_filter);
if($cp_filter == '-1' || $cp_filter == ''){
  $sc_where .= '';
} else{
  $sc_where .= " and cp_status='{$cp_filter}'";
}
$sqlrc = $sql.$sc_where.$order;
var_dump($sqlrc);
$result = $mysqli -> query($sqlrc);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
}

$coupon_ing = 0;
$coupon_end = 0;
for($i = 0; $i<count($rsc); $i++){
  if($rsc[$i]->cp_status == 1) {
    $coupon_ing++;
  }
  if($rsc[$i]->cp_status == 0) {
    $coupon_end++;
  }
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
          />
        </div>
        <button class="btn btn-dark">검색</button>
      </form>
      <a href="coupon_create.php" class="btn btn-primary">쿠폰등록</a>
    </div><!-- //sub_header -->

    <div class="coupon_filter">
      <h2 class="hidden">클릭하여 진행중 또는 종료된 쿠폰을 확인하세요.</h2>
      <div class="coupon_status_search d-flex justify-content-betweenn white_bg align-items-center">
        <div class="filter_1">
          <h3 class="b_text01">총 쿠폰 개수</h3>
          <a href="/pudding-LMS-website/admin/coupon/coupon_list.php?cp_status=<?php echo '-1'?>" class="b_text02"><em class="main_tt"><?= count($rsc) ?></em>개</a>
        </div>
        <div class="filter_2">
          <h3 class="b_text01">활성화 쿠폰 개수</h3>
          <a href="/pudding-LMS-website/admin/coupon/coupon_list.php?cp_status=<?php echo '1'?>" class="b_text02"><em class="main_tt"><?= $coupon_ing ?></em>개</a>
        </div>
        <div class="filter_3">
          <h3 class="b_text01">비활성화 쿠폰 개수</h3>
          <a href="/pudding-LMS-website/admin/coupon/coupon_list.php?cp_status=<?php echo '0'?>" class="b_text02"><em class="main_tt"><?= $coupon_end ?></em>개</a>
        </div>
      </div>
    </div><!-- coupon_filter -->

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
            <h3 class="b_text01"><?= $coupon->cp_name ?></h3>
            <p>사용기한 : <?php if($coupon->cp_date == ''){echo '무제한';}else{echo $coupon->cp_date.'개월';} ?></p>
            <p>최소사용금액 : <?= $coupon->cp_limit ?>원</p>
            <p class="number"><?php if($coupon->cp_type == '정액'){echo '할인액';}else{echo '할인율';} ?> : <?php if($coupon->cp_type == '정액'){echo $coupon->cp_price.'원';}else{echo $coupon->cp_ratio.'%';} ?></p>
          </div>

          <div class="icons">
            <a href="/pudding-LMS-website/admin/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
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

    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&lsaquo;</span>
          </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
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
  </div><!-- //content_wrap -->
</div><!-- //wrap -->
<script>
  $('.number').change(function(){
      $(this).number( true );
    });
    $('.number').number(true);
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>