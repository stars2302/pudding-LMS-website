<?php
$title="마이페이지 - 내 수강평 수정";
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
      <h2 class="jua main_tt">수강평 수정</h2>
      <div class="card_container radius_5">
        <div class="b_text02">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center review_profile">
              <img
                src="<?= $card["userimg"]; ?>"
                class="userImg shodow_box"
                alt="프로필 이미지"
              >
              <h5 class="b_text01 review_user"><?= $card["username"]; ?></h5>
              <h5 class="b_text02 dark review_name"><?= $card["name"]; ?></h5>
            </div>
          </div>
            <form action="review_update_ok.php?rid=<?=$rid?>" method="POST">
            <div class="rate_wrap d-flex justify-content-end">
              <select class="form-control" id="rate" name="rating">
              <option value="1">
                &#9733; &#9734; &#9734; &#9734; &#9734;
              </option>
              <option value="2">
                &#9733; &#9733; &#9734; &#9734; &#9734;
              </option>
              <option value="3">
                &#9733; &#9733; &#9733; &#9734; &#9734;
              </option>
              <option value="4">
                &#9733; &#9733; &#9733; &#9733; &#9734;
              </option>
              <option value="5">
                &#9733; &#9733; &#9733; &#9733; &#9733;
              </option>
              </select>
            </div>
          
          <div class="b_text02 c_reply_content border">
            <textarea
              name="review_update"
              id="review_update"
              rows="10"
            ><?= $card["content"]; ?></textarea>
          </div>
          <div class="d-flex flex-row justify-content-end reply_btn_wrap">
            <button type="submit" class="btn btn-primary b_text01 dark reply_done">완료</button>
            <a href="/pudding-LMS-website/user/mypage/review_view.php?rid=<?= $card["rid"]; ?>" class="btn btn-dark b_text01 reply">취소</a>
          </div>
        </form>
        </div>
      </div>
      <!-- 카드 끝 --> 
    </section>
   
    </div>
    </main>

    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

