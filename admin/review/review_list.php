<?php
$title="수강평 관리";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'review'; //pagenation 테이블 명
$pageContentcount = 3; //페이지 당 보여줄 list 개수

//필터 없는 경우 조건 복사해야됨!
if(!isset($pagerwhere)){
  $pagerwhere = ' 1=1';
}
 
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!



$sql = "SELECT r.*, u.username, u.userimg ,c.name FROM review r
        JOIN users u ON r.uid = u.uid
        JOIN courses c ON c.cid = r.cid

        ORDER BY r.rid DESC";

//최종 query문, 실행
$sqlrc = $sql.$limit; //필터 없

// var_dump($sql);

$result = $mysqli-> query($sqlrc);
while($rs = $result->fetch_object()){
  $rsc[]=$rs;
}
//  var_dump($rsc);




?>
        <section>
        
          <h2 class="main_tt dark title-mg">수강평 관리</h2>

          <?php
      foreach ($rsc as $card) {
        // 리뷰댓글 개수 조회
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
                    <a href="review_reply_view.php?rid=<?= $card->rid; ?>&uid=<?= $card->uid; ?>&cid=<?= $card->cid; ?>" class="btn btn-dark b_text01 ">댓글 보기</a>
                <?php } else { ?>
                    <a href="review_reply_create.php?rid=<?= $card->rid; ?>&uid=<?= $card->uid; ?>&cid=<?= $card->cid; ?>" class="btn btn-primary b_text01 ">댓글 달기</a>
                <?php } ?>
            </div>
          </div>
          <?php } ?>   
          <!-- 카드 끝 -->
        
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
                //echo "<li class=\"page-item active\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                 echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                //필터 있
                //echo "<li class=\"page-item\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                 echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
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
        </section>
        <script>
         $(document).ready(function() {
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
                          // cardContainer.remove(); 
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
