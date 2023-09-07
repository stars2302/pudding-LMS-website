<?php
$title = "강의 상세";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


$cid = $_GET['cid'];

$sql = "SELECT * FROM courses where cid={$cid}";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

$imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
$result = $mysqli->query($imgsql);

while ($is = $result->fetch_object()) {
  $addImgs[] = $is;
}

// $sql2 = "SELECT * FROM product_options where cid={$cid}";
// $result2 = $mysqli -> query($sql2);
//$rs2 = $result2 -> fetch_object();

// while($rs2 = $result2 -> fetch_object()){
//   $options[]=$rs2;
// }

// $sql3 = "SELECT * FROM product_image_table where cid={$cid}";
// $result3 = $mysqli -> query($sql3);
// //$rs2 = $result2 -> fetch_object();

// while($rs3 = $result3 -> fetch_object()){
//   $addImgs[]=$rs3;
// }

?>

<section class="course_view">
  <h2 class="main_tt dark tt_mb">강의 보기</h2>
  <div class="course_list shadow_box">
    <div class="d-flex">
      <div class="view_category">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <!-- 카테고리 대.중.소 구분 출력 -->
            <?php
            $cateString = $rs->cate;
            $parts = explode('/', $cateString);

            $big_cate = $parts[0];
            $md_cate = $parts[1];
            $sm_cate = $parts[2];
            ?>
            <li class="breadcrumb-item"><a href="#"><?= $big_cate ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $md_cate ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $sm_cate ?></li>
          </ol>
        </nav>
      </div>
      <img src="<?= $rs->thumbnail; ?>" alt="강의 썸네일 이미지" class="border">
      <div class="course_info">
        <div>
          <h3 class="course_list_title main_stt d-flex align-items-center">
            <?= $rs->name; ?>
            <span class="badge rounded-pill blue_bg b-pd">
              <?php
              //뱃지 키워드 
              if (isset($rs->cate)) {
                $categoryText = $rs->cate;
                $parts = explode('/', $categoryText);
                $lastPart = end($parts);

                echo $lastPart;
              }
              ?>
            </span>
            <span class="badge rounded-pill b-pd
            <?php
            // 뱃지 컬러
            $levelBadge = $rs->level;
            if ($levelBadge === '초급') {
              echo 'yellow_bg';
            } else if ($levelBadge === '중급') {
              echo 'green_bg';
            } else {
              echo 'red_bg';
            }
            ?>
            ">
              <?= $rs->level; ?>
            </span>
          </h3>
          <p class="base_mt">
            <?= $rs->content; ?>
          </p>
        </div>
        <div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span><?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span></p>
          <span class="price main_stt number"><?= $rs->price; ?></span>
          <span>원</span>
        </div>
      </div>
    </div>
    <div class="course_status d-flex justify-content-between">
      <div class="d-flex flex-column align-items-end status_wrap">
        <span class="price_btn_wrap mb-3">
          <a href="course_update.php?cid=<?=$rs->cid ?>" class="btn btn-primary btn_g">수정</a>
          <a href="course_delete.php?cid=<?=$rs->cid ?>" class="del_btn btn btn-danger btn_g">삭제</a>
        </span>
      </div>
    </div>
    <div class="you_upload mt-3">
      <div class="youtubeTitleBox">
        <div class="d-flex gap-3 justify-content-center">
          <div class="youtubeNameBox">
            <P>강의명</P>
          </div>
          <div class="youtubeUrlBox">
            <P>강의url</P>
          </div>
        </div>
      </div>
      <div class="youtube_link">
          <?php
          if (isset($addImgs)) {
            foreach ($addImgs as $ai) {
              ?>
          <div class="youtube_con d-flex gap-3 justify-content-center">
            <div class="d-flex gap-3 youtubeViewcon">
              <div class="youtubeViewthumb">
                <img src="<?= $ai->youtube_thumb ?>" alt="썸네일">
              </div>
              <div class="youtubeViewname">
                <span>
                  <?= $ai->youtube_name ?>
                </span>
              </div>
            </div>
            <div class="youtubeViewurl">
              <a href="<?= $ai->youtube_url ?>" target="blank" class="btn btn-outline-secondary">강의영상 바로가기</a>
            </div>
          </div>
              <?php
            }
          }
          ?>
      </div>
    </div>
  </div>
  <div class="c_button">
    <a href="course_list.php" class="btn btn-dark base_mt back_btn">돌아가기</a>
  </div>
</section>
</div><!-- content_wrap -->
</div><!-- wrap -->
<script>
  //강의 가격 천단위, 변환
  // let str_price = $('.course_list .price').text();
  // let course_price = ($.number(str_price));
  // $('.course_list .price').text(course_price+' 원');

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