<?php
$title="수강평 댓글 상세";
$css_route="review/css/review.css";
$js_route = "review/js/review.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';

$rid = $_GET['rid'];
$uid = $_GET['uid'];
$cid = $_GET['cid'];

//수강평 받기
$sql = "SELECT r.*, u.username, u.userimg, c.name FROM review r
        JOIN users u ON r.uid = u.uid
        JOIN courses c ON c.cid = r.cid
        WHERE r.rid = '{$rid}' AND r.uid = '{$uid}' AND r.cid = '{$cid}'";
// var_dump($sql);

$result = $mysqli->query($sql);
$card = $result->fetch_assoc();
// var_dump($card);




?>

        <section>
          <h2 class="main_tt dark title-mg">수강평 댓글 상세</h2>

          <div class="card_container shadow_box border" data-id="<?= $card["rid"]; ?>">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <img src="<?= $card["userimg"]; ?>" class="userImg shodow_box" alt="프로필 이미지">
                <h5 class="b_text01 dark review_user"><?= $card["username"]; ?></h5>
                <h5 class="b_text01 dark review_name"><span>강의명: </span><?= $card["name"]; ?></h5>
              </div>
            
                <div class="rating" data-rate="<?= $card["rating"]; ?>">

                <?php
                  for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $card["rating"]) {
                          echo '<i class="ti ti-star-filled"></i>';
                      } else {
                          echo '<i class="ti ti-star-filled not_star"></i>';
                      }
                  }
                  ?>
                </div>
            </div>
            <div class=" b_text02 review_content border">
              <p><?= $card["content"]; ?></p>
              <p><?= $card["regdate"]; ?></p>
            </div>
            <!-- <div class="review_del">
              <a href="" class="icon"> <i class="ti ti-trash bin_icon"></i></a>
            </div> -->
            
            <?php
    // 댓글 받기
    $rsql = "SELECT * FROM review_reply where rid={$rid}";
    $rresult = $mysqli->query($rsql);

    if ($rresult->num_rows > 0) {
        while ($rp = $rresult->fetch_assoc()) {
            ?>
            <div class="b_text02 review_c_content border" id="reply_container" data-rid="<?= $rp["rid"]; ?>">
                <div class="d-flex align-items-center">
                    <img src="../images/profile_img.png" class="userImg shodow_box" alt="프로필 이미지">
                    <h5 class="b_text01 primary review_user">프바오</h5>
                    <h5 class="b_text02 dark review_name"><?= $rp["r_regdate"]; ?></h5>
                </div>
                <div class="b_text02 reply_content_view border">
                    <p name="r_content" id="reply_create"><?= $rp["r_content"]; ?></p>
                </div>

                <div class="d-flex flex-row justify-content-end reply_btn">
                <a href="review_update.php?rid=<?= $rp["rid"]; ?>&uid=<?= $uid ?>&cid=<?= $cid ?>" class="btn btn-primary b_text01 reply_done">수정</a>
                    <button class="btn btn-danger b_text01 reply" data-rid="<?= $rp["rid"]; ?>">삭제</button>
                </div>
            </div>
            <?php
        }
    } else {
        echo '';
    }
    ?>
          <!-- 카드 끝 -->
          <div class="d-flex flex-row justify-content-end align-items-center reply_btn">
              <a href="review_list.php" class="btn btn-dark b_text01 list_btn">목록보기</a>

            </div>
        </section>
      </div>
      <!-- content_wrap -->
    </div>
    <!-- wrap -->
    <script>

       $(document).ready(function() {
          let reviewContainer = $("#reply_container");

        $("button.reply").on("click", function(e) {
          e.preventDefault();
          let rId = $(this).closest(".review_c_content").attr("data-rid");

          let data ={
            rid: rId
          }
          
          if (confirm("삭제하시겠습니까?")) {
              $.ajax({
                  type: 'POST',
                  url: 'review_reply_delete.php',
                  data: data,
                  dataType: 'json',
                  success: function(data) {
                      if (data.result === 'ok') {
                          alert('수강평 댓글이 삭제되었습니다.');
                          reviewContainer.hide(); 
                          location.href="/pudding-LMS-website/admin/review/review_list.php"
                      } else {
                          alert('수강평 댓글 삭제 실패');
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
