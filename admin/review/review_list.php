<?php
$title="수강평 관리";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

$pagenationTarget = 'review'; 
$pageContentcount = 3; 

if(!isset($pagerwhere)){
  $pagerwhere = ' 1=1';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; 

$sql = "SELECT r.*, u.username, u.userimg ,c.name FROM review r
        JOIN users u ON r.userid = u.userid
        JOIN courses c ON c.cid = r.cid

        ORDER BY r.rid DESC";

$sqlrc = $sql.$limit; 

$result = $mysqli-> query($sqlrc);
while($rs = $result->fetch_object()){
  $rsc[]=$rs;
}

?>
  <section>
      <h2 class="main_tt dark title-mg">수강평 관리</h2>
      <?php
        if(isset($rsc)){
         foreach ($rsc as $card) {
          $replyCntSql = "SELECT COUNT(*) AS reply_cnt FROM review_reply WHERE rid = {$card->rid}";
          $replyCntResult = $mysqli->query($replyCntSql);
          $replyCnt = $replyCntResult->fetch_object()->reply_cnt;
      ?>
        <div class="card_container shadow_box border" data-id="<?= $card -> rid; ?>">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <img src="<?php echo $card->userimg ?>" class="userImg shodow_box" alt="프로필 이미지">
              <h5 class="b_text01 dark review_user"><?php echo $card->username ?></h5>
              <h5 class="b_text01 dark review_name"><span>강의명: </span><?php echo $card->name ?></h5>
            </div>
              <div >
                <div class="rating" data-rate="<?php echo $card->rating; ?>">
                <?php
                  for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $card->rating) {
                          echo '<i class="ti ti-star-filled"></i>';
                      } else {
                          echo '<i class="ti ti-star-filled not_star"></i>';
                      }
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="b_text02 review_content border">
              <p><?php echo $card->content ?></p>
              <p><?php echo $card->regdate ?></p>
            </div>
            <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div>
            <div class="d-flex flex-row justify-content-end align-items-center reply_btn">
            <?php if ($replyCnt > 0) { ?>
                    <a href="review_reply_view.php?rid=<?= $card->rid; ?>&userid=<?= $card->userid; ?>&cid=<?= $card->cid; ?>" class="btn btn-dark b_text01 ">댓글 보기</a>
                <?php } else { ?>
                    <a href="review_reply_create.php?rid=<?= $card->rid; ?>&userid=<?= $card->userid; ?>&cid=<?= $card->cid; ?>" class="btn btn-primary b_text01 ">댓글 달기</a>
                <?php } ?>
            </div>
          </div>
          <?php
              }
            }
           ?>   
    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination coupon_pager">
        <?php
          if($pageNumber>1 && $block_num > 1 ){
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          }

          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                 echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                 echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }
          }

          if($pageNumber<$total_page && $block_num < $total_block){
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          }
        ?>
      </ul>
    </nav>
    </section>
  </div>
</div>
  <script>
  $(document).ready(function() {
  let cardContainer = $(".card_container");
  $(".review_del a.icon").on("click", function(e) {
  e.preventDefault();
  let rId = $(this).closest(".card_container").attr("data-id");

  let data ={
    rid: rId
  }

  if (confirm("삭제하시겠습니까?")) {
      $.ajax({
          type: 'POST',
          url: 'review_delete_ok.php',
          data: data,
          dataType: 'json',
          success: function(data) {
              if (data.result === 'ok') {
                  alert('리뷰가 삭제되었습니다.');
                  location.href="http://pudding0906.dothome.co.kr/pudding-LMS-website/admin/review/review_list.php";
                  
              } else {
                  alert('리뷰 삭제 실패');
              }
          },
          error: function(error) {
              console.log(error);
          }
      });
  } else {
      alert("삭제를 취소했습니다.");
    }
  });
  });    
  </script>
      
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
