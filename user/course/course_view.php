<?php
  $title="강의 상세";
  $css_route="course/css/user_course.css";
  $js_route = "course/js/user_course.js";
    include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

  $cid = $_GET['cid'];

  $sql = "SELECT * FROM courses where cid={$cid}";
  $result = $mysqli->query($sql);
  $rs = $result->fetch_object();

  $imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
  $result = $mysqli->query($imgsql);

  while ($is = $result->fetch_object()) {
    $addImgs[] = $is;
  }

  $sql1 = "SELECT r.*, u.username, u.userimg, c.name FROM review r
          JOIN users u ON r.uid = u.uid
          JOIN courses c ON c.cid = r.cid
          WHERE r.cid = '{$cid}'";

  $result1 = $mysqli->query($sql1);

  while ($card = $result1->fetch_object()) {
    $re[] = $card;
  }
  // $card = $result1->fetch_assoc();

  // $sql2 = "SELECT * FROM review_reply WHERE rid={$rid}";
  // $result2 = $mysqli -> query($sql2);
  // $rr = $result2->fetch_object();
?>

    <main>
      <div class="container">
        <div class="viewSetion_1 shadow_box">
          <div class="d-flex gap-5">
            <div>
              <img src="<?= $rs->thumbnail; ?>" alt="" />
            </div>
            <div
              class="viewTitleWrap d-flex flex-column justify-content-between"
            >
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <div class="viewCate d-flex gap-2">
                    <p>프로그래밍</p>
                    <span>></span>
                    <p>프론트엔드</p>
                    <span>></span>
                    <p>Javascript</p>
                  </div>
                </div>
                <p class="content_tt"><?= $rs->name?></p>
              </div>
              <div
                class="viewPriceWrap d-flex justify-content-between align-items-end"
              >
                <div>
                  <div>
                    <i class="ti ti-calendar-event"></i>
                    <span>수강기간 <?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span>
                  </div>
                  <div><span class="main_stt"><?= $rs->price?></span><span>원</span></div>
                </div>
                <div>
                  <div class="viewBtn mb-2">
                    <button class="btn preview btn-dark">미리보기</button>
                  </div>
                  <div class="viewBtn">
                    <button class="btn btn-primary dark">장바구니 담기</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pd_3">
            <p class="content_stt fw-bold">강의소개</p>
            <p>
            <?= $rs->content?>
            </p>
          </div>
        </div>
        <div class="d-flex justify-content-center gap-3 pd_1">
          <div class="viewBtn_1">
            <button class="viewB_1 active">강의목록</button>
          </div>
          <div class="viewBtn_1">
            <button class="viewB_2">수강평</button>
          </div>
        </div>
        <div class="viewWrap_1">
          <div class="pd_2">
            <h2 class="jua">강의목록</h2>
          </div>
          <div class="viewSection2 shadow_box">
            <?php
              foreach($addImgs as $ai){
            ?>
            <div class="viewList d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="viewImg">
                  <img src="<?= $ai->youtube_thumb?>" alt="" />
                </div>
                <div>
                  <span><?= $ai->youtube_name?></span>
                </div>
              </div>
              <div>
                <a href="<?= $ai->youtube_url?>"><i class="fa-regular fa-circle-play"></i></a>
              </div>
            </div>
            <?php           
              }
            ?>
          </div>
        </div>

        <div class="viewWrap_2">
          <div class="pd_2">
            <h2 class="jua">강의평</h2>
          </div>
          <div>
            <p>전체 리뷰 <?= count($re)?>건</p>
          </div>
            <?php
              foreach($re as $view){
            ?>
          <div class="viewSection3 shadow_box pd_2">
            <div class="review d-flex justify-content-between align-items-center">
              <div class="reviewProfile d-flex gap-3 align-items-center">
                <img src="<?= $view->userimg; ?>" alt="" />
                <span class="fw-bold"><?= $view->username; ?></span>
                <span><?= $view->name; ?></span>
                <span><?= $view->regdate; ?></span>
              </div>
              <div class="rating" data-rate="<?= $view->rating; ?>">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="reviewBox_1 pd_3">
              <p>
              <?= $view->content; ?>
              </p>
            </div>

            <div class="reviewBox_2 pd_3">
              <div
                class="review d-flex justify-content-between align-items-center pd_4"
              >
                <div class="reviewProfile d-flex gap-3 align-items-center">
                  <img src="../course_images/327610-eng.png" alt="" />
                  <span class="fw-bold">프바오</span>
                  <span><?= $rr->r_regdate; ?></span>
                </div>
              </div>
              <div>
                <p><?= $rr->r_content; ?></p>
              </div>
            </div>
          </div>
          <?php
              }
            ?>
          <div class="viewSection3Btn">
            <button class="btn btn-dark">더보기</button>
          </div>
        </div>
      </div>
    </main>


    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
