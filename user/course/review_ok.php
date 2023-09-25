<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$cid = $_GET['cid'];
$r_idx = $_GET['r_idx'];
$r_page = $_GET['r_page'];
$from = $r_idx*$r_page;

$sql1 = "SELECT r.*, u.username, u.userimg, c.name, w.* FROM review r
JOIN users u ON r.userid = u.userid
JOIN courses c ON c.cid = r.cid
LEFT JOIN review_reply w ON r.rid = w.rid
WHERE r.cid = {$cid} limit {$from},{$r_page}";

$result1 = $mysqli->query($sql1);

while ($card = $result1->fetch_object()) {
$re[] = $card;
}

if(isset($re)){
  foreach($re as $view){
?>
<div class="viewSection3 shadow_box pd_2">
  <div class="review d-flex justify-content-between align-items-center">
    <div class="reviewProfile d-flex gap-3 align-items-center">
      <img src="<?= $view->userimg; ?>" alt="">
      <span class="fw-bold"><?= $view->username; ?></span>
      <span><?= $view->name; ?></span>
      <span><?= date("Y-m-d",strtotime($view->regdate)); ?></span>
    </div>
    <div class="rating" data-rate="<?= $view->rating; ?>">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
    </div>
  </div>
  <div class="reviewBox_1 pd_3">
    <p>
    <?= $view->content; ?>
    </p>
  </div>

  <!-- 답글시작 -->
  <?php
    if(isset($view->r_content)){
  ?>
  <div class="reviewBox_2 pd_3">
    <div class="review d-flex justify-content-between align-items-center pd_4">
      <div class="reviewProfile d-flex gap-3 align-items-center">
        <img src="../course_images/327610-eng.png" alt="">
        <span class="fw-bold">프바오</span>
        <span><?= date("Y-m-d",strtotime($view->r_regdate)); ?></span>
      </div>
    </div>
    <div>
      <p><?= $view->r_content; ?></p>
    </div>
  </div>
  <?php
    }
  ?>
  <!-- 답글 끝 -->

</div>
<?php
    }}
?>