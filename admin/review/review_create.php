<?php
$title="수강평 댓글 등록";
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
          <h2 class="main_tt dark title-mg">수강평 댓글 등록</h2>

          <div class="card_container shadow_box border">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="images/user_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user">강바오</h5>
                <h5 class="b_text01 dark review_name"><span>강의명: </span>REACT 쇼핑몰 만들기</h5>
              </div>
              <div >
                <div class="rating" data-rate="4">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>	
                </div>
              </div>
           
            </div>
            <div class=" b_text02 review_content border">
        

              <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p>
              <p>2023-08-21</p>
            </div>
            <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div>
            <div class="b_text02 review_c_content border">
              <div class="d-flex align-items-center">
                <img src="../images/profile_img.png" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 primary review_user">프바오</h5>
                <h5 class="b_text02 dark review_name">2023-08-21</h5>
              </div>
              <form class="b_text02 reply_content border">
                <!-- <p>PHP를 배우기 위해서 급하게 들은 강의였는데, 생각보다 너무 친절하게 많은 예시를 들어 설명해주셔서
                  이해하기 쉬었습니다.  기본기를 정리하는데 아주 좋은 강의였습니다</p> -->
               <textarea name="reply_create" id="reply_create" rows="6"></textarea>
              </form>
          
              <div class="d-flex flex-row justify-content-end reply_btn">
                <button class="btn btn-primary b_text01 reply_done">등록 완료</button>
                <button class="btn btn-dark b_text01 reply">등록 취소</button>
              </div>
            </div>
          
          </div>
          <!-- 카드 끝 -->
         
        </section>
      </div>
      <!-- content_wrap -->
    </div>
    <!-- wrap -->

 <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>