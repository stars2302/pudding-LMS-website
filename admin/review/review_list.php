<?php
$title="수강평 관리";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

// $sql = "SELECT * FROM review where 1=1 order by rid desc";
$sql = "SELECT r.*, u.username, u.userimg FROM review r
        JOIN users u ON r.uid = u.uid
        ORDER BY r.rid DESC";


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
          
          <div class="card_container shadow_box border">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="<?php echo $card->userimg ?>" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user"><?php echo $card->username ?></h5>
                <h5 class="b_text01 dark review_name"><span>강의명: </span>REACT 쇼핑몰 만들기</h5>
              </div>
              <div >
              <div class="rating" data-rate="<?php echo $card->rating; ?>">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $card->rating) {
                                echo '<i class="fas fa-star filled"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
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
            <div class="d-flex flex-row justify-content-end reply_btn">
              <button class="btn btn-dark b_text01">댓글 달기</button>
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
        let rating = $('.rating');

rating.each(function(){
	let score = $(this).attr('data-rate');
	let scores = score.split('.');
	
	if(scores.length > 1){
		$(this).find(`.star:lt(${scores[0]})`).css({width:'100%'});
		$(this).find(`.star:eq(${scores[0]})`).css({width: `${scores[1]}0%`});
	}else{
		$(this).find(`.star:lt(${scores[0]})`).css({width:'100%'});
	}
	
});
      </script>
<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
