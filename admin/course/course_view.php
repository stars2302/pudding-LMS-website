<?php
$title = "강의 상세";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

  
$cid = $_GET['cid'];
  
$sql = "SELECT * FROM courses where cid={$cid}";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();

// lid
// cid
// name
// content
// thumbnail
// link
// add_image
// $lsql = "SELECT c.cid, l.cid , l.u
// from courses c 
// JOIN lecture l
// on c.cid = l.cid 
// where c.status = 2 and uc.status = 1 and uc.userid = '{$_SESSION['UID']}' and uc.use_max_date >= now() ";

$imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
$result = $mysqli -> query($imgsql);

while($is = $result -> fetch_object()){
  $addImgs[]=$is;
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
          <h3 class="course_list_title main_stt d-flex align-items-center"><?= $rs->name; ?>
            <span class="badge rounded-pill blue_bg b-pd">프론트엔드</span>
            <span class="badge rounded-pill green_bg b-pd"><?= $rs->level; ?></span>
          </h3>
          <p class="base_mt"><?= $rs->content; ?></p>
        </div>
        <div>
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span><?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span></p>
          <p class="price content_stt"><?= $rs->price; ?></p>
        </div>
      </div>
    </div>
    <div class="course_status d-flex justify-content-between">
      <div class="d-flex flex-column align-items-end status_wrap">
        <span class="price_btn_wrap">
          <a href="course_update.php?cid=<?=$rs->cid ?>" class="btn btn-primary btn_g">수정</a>
          <button class="btn btn-danger">삭제</button>
        </span>
      </div>
    </div>
    <hr>
    <div class="you_upload mt-5">
        <div class="youtube">
          <div class="row justify-content-center">
            <div class="col-3 youtube_thumb">
              <P>강의썸네일</P>
            </div>
            <div class="col-3 youtube_name">
              <P>강의명</P>
            </div>
            <div class="col-6 youtube_url">
              <P>강의url</P>
            </div>
          </div>
        </div>
        <div class="youtube_link c_mb">
          <div class="row justify-content-center">
            <?php
              if(isset($addImgs)){
              foreach($addImgs as $ai){
            ?>  
            <div class="col-3 youtube_thumb">
              <img src="<?= $ai -> youtube_thumb?>" alt="섬네일">
            </div>
            <div class="col-3 youtube_name">
              <span><?= $ai -> youtube_name?></span>
            </div>
            <div class="col-6 youtube_url">
              <a href="<?= $ai -> youtube_url?>">강의영상 바로가기</a>
            </div>
            <?php
                }
              }
              ?>
          </div>
        </div>
      </div>
  </div>
  <a href="course_list.php" class="btn btn-dark base_mt">돌아가기</a>

</section>


</div><!-- content_wrap -->
</div><!-- wrap -->
<script>
  /* 유림 */
  //강의 가격 천단위, 변환
  // let str_price = $('.course_list .price').text();
  // let course_price = ($.number(str_price));
  // $('.course_list .price').text(course_price+' 원');

  let priceList = $('.price');

  priceList.each(function() {
    let str_price = $(this).text();
    let course_price = ($.number(str_price));
    $(this).text(course_price+' 원');
  });



  /* 유림 */
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>