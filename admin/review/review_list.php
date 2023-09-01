<?php
$title="수강평 관리";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

// $sql = "SELECT * FROM review where 1=1 order by rid desc";
$sql = "SELECT r.*, u.username, u.userimg ,c.name FROM review r
        JOIN users u ON r.uid = u.uid
        JOIN courses c ON c.cid = r.cid

        ORDER BY r.rid DESC";

// var_dump($sql);
$result = $mysqli-> query($sql);
while($rs = $result->fetch_object()){
  $rsc[]=$rs;
}
// var_dump($rsc);



?>
        <section>
        
          <h2 class="main_tt dark title-mg">수강평 관리</h2>

          <?php
          foreach($rsc as $card){            
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
              <a href="review_create.php?rid=<?= $card->rid; ?>&uid=<?= $card->uid; ?>&cid=<?= $card->cid; ?>" class="btn btn-dark b_text01 r_btn">댓글 달기</a>
              <a href="review_view.php?rid=<?= $card->rid; ?>&uid=<?= $card->uid; ?>&cid=<?= $card->cid; ?>" class="btn btn-dark b_text01 r_btn_v">댓글 보기</a>

            </div>
          </div>
          <?php } ?>   
          <!-- 카드 끝 -->
        
          <!-- 페이지네이션 -->
          <nav
          aria-label="Page navigation example"
          class="d-flex justify-content-center pager"
        >
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
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
        <!-- 페이지네이션 끝 -->
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
                  url: 'review_delete.php',
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

          //   $(document).ready(function() {
          //     $(".review_del a i").on("click",function(){
          //   let rId = $(this).closest(".rating").attr("data-id");
          //   console.log(rId);
          //   if(confirm('정말 삭제하시겠습니까?')) {
          //     let data ={
          //       rid : rId
          //     }
          //     consol.log(data);
          //     $.ajax({
          //       async:false,
          //       type:'post',
          //       url:'review_delete.php',
          //       data: data,
          //       dataType:'json',
          //       error:function(error){
          //           console.log(error);
          //       },
          //       success:function(data){
          //         if(data.result == 'ok'){
          //             alert('리뷰가 삭제되었습니다.');
          //             location.reload();
          //         } else{
          //             alert('리뷰삭제 실패');
          //         }
          //       }
          //     });
          //   }else{
          //     alert("리뷰 삭제를 취소했습니다.");
          //   }
          // });
          //   });

         
        </script>
      
<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
