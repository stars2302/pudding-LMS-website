<?php
$title="마이페이지 - 내 수강평 상세";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

  $rid = $_GET['rid'];


  $sql = "SELECT r.*, u.username, u.userid, u.userimg, c.name FROM review r 
  JOIN users u ON r.userid=u.userid 
  JOIN courses c ON c.cid = r.cid
  where rid={$rid}";
  $result = $mysqli->query($sql);
  $card = $result->fetch_assoc();

  // var_dump($card);
  $rsql = "SELECT rr.* FROM review r
  JOIN review_reply rr ON rr.rid = r.rid
  WHERE rr.rid = {$rid}";
  $rresult = $mysqli->query($rsql);
  $rcard = $rresult->fetch_assoc();

// var_dump($rcard);
?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
        <ul>
          <li class="content_stt link_tag mypage_tag"><a href="/pudding-LMS-website/user/mypage/mypage.php">내 강의실</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/buypage.php">구매내역</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/couponpage.php">쿠폰함</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/review_list.php">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">내 수강평</h1>
      <div class="d-flex flex-column align-items-end">
      <div class="card_container radius_5">
        <div class="b_text02">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <img
                src="<?= $card["userimg"]; ?>"
                class="userImg shodow_box"
                alt="프로필 이미지"
              />
              <h5 class="b_text01 review_user"><?= $card["username"]; ?></h5>
              <h5 class="b_text02 dark review_name"><?= $card["name"]; ?></h5>
              <h5 class="b_text02 dark review_date"><?= date('Y-m-d', strtotime($card["regdate"])) ;?></h5>
            </div>
            <div class="rating" data-rate="<?= $card["rating"]; ?>">
            <?php
                  for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $card['rating']) {
                          echo '<i class="fa-solid fa-star"></i>';
                      } else {
                          echo '<i class="fa-regular fa-star"></i>';
                      }
                  }
                  ?>
            </div>
          </div>
          <div class="b_text02 reply_content radius_12">
            <p><?= $card["content"]; ?></p>
            <!-- <textarea
              name="reply_create"
              id="reply_create"
              rows="10"
            ></textarea> -->
          </div>

          <div class="b_text02 re_reply_content radius_12">
            <div class="d-flex align-items-center">
                <img
                  src="../images/pdata/users/profile_img.png"
                  class="userImg shodow_box"
                  alt="프로필 이미지"
                />
                <h5 class="b_text01 review_user">프바오</h5>
                <h5 class="b_text02 dark review_name"><?= date('Y-m-d', strtotime($rcard["r_regdate"])) ;?></h5>
              </div>
            <p><?= $rcard["r_content"]; ?></p>
            
          </div>
          <div class="d-flex flex-row justify-content-end reply_btn_wrap">
          </div>
        </div>
      </div>
    <a href="/pudding-LMS-website/user/mypage/review_list.php" class="btn btn-dark list_btn">목록보기</a>
    </div>
      <!-- 카드 끝 -->
    </section>
    
   
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>



