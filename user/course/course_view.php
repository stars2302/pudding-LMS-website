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

  $sql1 = "SELECT r.*, u.username, u.userimg, c.name, w.* FROM review r
          JOIN users u ON r.uid = u.uid
          JOIN courses c ON c.cid = r.cid
          LEFT JOIN review_reply w ON r.rid = w.rid
          WHERE r.cid = '{$cid}'";

  $result1 = $mysqli->query($sql1);

  while ($card = $result1->fetch_object()) {
    $re[] = $card;
  }

  $cateString = $rs->cate;
  $parts = explode('/', $cateString);
?>
    <main>
      <input type="hidden" id="cid" value="<?= $cid; ?>"/>
      <div class="container">
        <div class="modalBackground">
          <div class="modalBox d-flex flex-column justify-content-between">
            <i class="fa-regular fa-circle-xmark"></i>
            <!-- modalVideo-->
            <div class=modalVideo style="TEXT-ALIGN: center">
              <object type="text/html" width="100%" height="100%" data="<?= $addImgs[0]->youtube_url?>" allowFullScreen></object>
            </div>
            <!-- modalVideo 끝-->
            <div class="modalTitle">
              <h4><?= $addImgs[0]->youtube_name?></h4>
              <p>*구매 전 미리보기로 볼수 있는 강의입니다.</p>
            </div>
          </div>
        </div>
        <div class="viewSetion_1 shadow_box pd_5">
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
                    <span class="badge rounded-pill blue_bg b-pd">
                      <?php
                        //뱃지 키워드 
                        if (isset($rs->cate)) {
                          $categoryText = $rs->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);

                          echo $lastPart;
                        }
                      ?>
                    </span>
                    <span class="badge rounded-pill b-pd
                      <?php
                        // 뱃지 컬러
                        $levelBadge = $rs->level;
                        if ($levelBadge === '초급') {
                          echo 'yellow_bg';
                        } else if ($levelBadge === '중급') {
                          echo 'green_bg';
                        } else {
                          echo 'red_bg';
                        }
                      ?>
                      ">
                      <?= $rs->level; ?>
                    </span>
                  </div>
                  <div class="viewCate d-flex gap-2">
                    <p><?= $parts[0] ?></p>
                    <span>></span>
                    <p><?= $parts[1] ?></p>
                    <span>></span>
                    <p><?= $parts[2] ?></p>
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

                  <!-- 무료표시하기 -->
                  <?php
                    if($rs->price != 0){
                  ?>
                    <div>
                      <span class="main_stt number"><?= $rs->price?></span><span>원</span>
                    </div>
                  <?php
                    }else{
                  ?>
                    <div>
                      <span class="main_stt">무료</span>
                    </div>
                    <?php 
                    } 
                  ?>
                  <!-- 무료표시 끝 -->

                </div>
                <div>
                  <div class="viewBtn mb-2">
                    <button class="btn preview btn-dark">미리보기</button>
                  </div>
                  <div class="viewBtn">
                    <button class="btn viewCart btn-primary dark">장바구니 담기</button>
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
        <div class="viewWrap_1 pd_6">
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
                <a href="<?= $ai->youtube_url?>" target="_blank"><i class="fa-regular fa-circle-play"></i></a>
              </div>
            </div>
            <?php           
              }
            ?>
          </div>
        </div>

        <div class="viewWrap_2 pd_6">
          <div class="pd_2">
            <h2 class="jua">수강평</h2>
          </div>
          <?php
            if(isset($re)){
          ?>
            <div>
              <p>전체 리뷰 <?= count($re)??0 ?>건</p>
            </div>
          <?php } ?>
          <?php
          if(isset($re)){
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
                  <img src="../course_images/327610-eng.png" alt="" />
                  <span class="fw-bold">프바오</span>
                  <span><?= $view->r_regdate; ?></span>
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
              }
          ?>         
            <div class="viewSection3Btn">
              <button class="moreviewBtn btn btn-dark">더보기</button>
            </div>
          <?php       
            }else{
          ?>
            <div class="noview">
              <img src="../images/course/noreview.png" alt="수강평없음">
              <p>수강평이 없어요(ㅠ_ㅠ) 첫번째 수강평을 남겨주세요!</p> 
            </div>     
          <?php
            }
          ?>    
        </div>
      </div>
    </main>


    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>
