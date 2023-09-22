<?php
$title="공지사항";
$css_route="notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';


$ntid = $_GET['ntid'];

$sql = "UPDATE notice SET nt_read_cnt = nt_read_cnt +1  WHERE ntid='{$ntid}'";
$result = $mysqli -> query($sql);

$sql2 = "SELECT * FROM notice WHERE ntid='{$ntid}'";
$result2 = $mysqli->query($sql2);
$sqlarr = $result2 -> fetch_assoc();
// $hit = $sqlarr['nt_read_cnt'] +1 ;
?>

<div class="container">
  <section>
    <div class="notice_view shadow_box justify-content-between radius_5 white_bg">
      <div class="notice_title_box d-flex justify-content-between align-items-center">
        <h2 class="content_tt thead_tt"> <?= $sqlarr['nt_title'];?></h2>
        <div class="notice_info d-flex">
          <span>작성일</span>
          <span><?= $sqlarr['nt_regdate']?></span>
          <span>조회수</span>
          <span><?= $sqlarr['nt_read_cnt']?></span>
        </div>
      </div>
      <div class="content">
        <?= $sqlarr['nt_content'] ?>
      </div>
    </div>
    <div class="notice_button d-flex justify-content-end">
      <a href="/pudding-LMS-website/user/notice/notice.php" class="btn btn-dark">목록가기</a>
    </div>
  </section> 
</div>



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>