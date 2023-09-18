<?php
$title="강의리스트";
$css_route="course/css/user_course.css";
$js_route = "course/js/user_course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';

$cates11 = $_GET['cate1']??'';
$cate21 = $_GET['cate2']??'';
$cate31 = $_GET['cate3']??'';
$cates1 = $_GET['cate1']??'';
$cate2 = $_GET['cate2']??'';
$cate3 = $_GET['cate3']??'';

//카테고리 조회
if (isset($_GET['cate1'])) {
  if($_GET['cate1'] !== ''){
    // $cates1 = $_GET['cate1']??'';
    $query11 = "SELECT name FROM category WHERE cateid='" . $cates1 . " '";
    $result11 = $mysqli->query($query11);
    $rs11 = $result11->fetch_object();
    $cates1 = $rs11->name;
  }
  
} else {
  $cates1 = '';
}
if (isset($_GET['cate2'])) {
  if($_GET['cate2'] !== ''){
  // $cate2 = $_GET['cate2']??'';
  $query22 = "SELECT name FROM category WHERE cateid='" . $cate2 . " '";
  $result22 = $mysqli->query($query22);
  $rs22 = $result22->fetch_object();
  $cate2 = $rs22->name;
  $cate2 = "/" . $cate2;
  }
} else {
  $cate2 = '';
}
if (isset($_GET['cate3'])) {
  if($_GET['cate3'] !== ''){
  // $cate3 = $_GET['cate3']??'';
  $query33 = "SELECT name FROM category WHERE cateid='" . $cate3 . " '";
  $result33 = $mysqli->query($query33);
  $rs33 = $result33->fetch_object();
  $cate3 = $rs33->name;
  $cate3 = "/" . $cate3;
  }
} else {
  $cate3 = '';
}

$sql = "SELECT * from courses order by cid desc limit 0, 9" ;

$result = $mysqli -> query($sql);

while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
}

?>

    <main>
      <div class="container">
        <div class="section1 d-flex justify-content-between pd_2 pd_5">
          <div class="courseBigTitle jua">
            <h1>강의리스트</h1>
          </div>
          <div class="d-flex gap-3">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="강의명으로 검색"
              />
            </div>
            <div class="searchBtn">
              <button class="btn btn-primary dark">검색</button>
            </div>
          </div>
        </div>
        <div class="mainSection d-flex gap-5">
          <div class="courseCheckBox mb-5">
            <div class="checkBox_1 mb-3">
              <h6>전체선택</h6>
              <hr class="mt-4" />
              <div class="form-check mt-5">
                <label class="form-check-label" for="total"> 전체선택 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="total"
                  id="total"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="frondend">
                  프론트엔드
                </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="frondend"
                  id="frondend"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="backend"> 백엔드 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="backend"
                  id="backend"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="uxui"> UX/UI </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="uxui"
                  id="uxui"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="design"> 디자인 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="design"
                  id="design"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="etc"> 기타 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="etc"
                  id="etc"
                />
              </div>
            </div>
            <div class="checkBox_2 mb-3">
              <h6>난이도</h6>
              <hr class="mt-4" />
              <div class="form-check mt-5">
                <label class="form-check-label" for="level_1"> 초급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="level_1"
                  id="level_1"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level_2"> 중급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="level_2"
                  id="level_2"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level_3"> 고급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="level_3"
                  id="level_3"
                />
              </div>
            </div>
            <div class="checkBox_3">
              <h6>가격</h6>
              <hr class="mt-4" />
              <div class="form-check mt-5">
                <label class="form-check-label" for="free"> 무료 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="free"
                  id="free"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="pay"> 유료 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  name="pay"
                  id="pay"
                />
              </div>
            </div>
          </div>
          <div class="courseList">
            <div class="row mb-5">
              <?php
                foreach($rsc as $item){
              ?>        
              <div class="col-12 col-sm-6 col-md-4 courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="<?= $item -> thumbnail?>"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">
                      <?php
                        if (isset($item->cate)) {
                          $categoryText = $item->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = end($parts);

                          echo $lastPart;
                        }
                      ?>
                    </span>
                    <span class="badge rounded-pill b-pd
                      <?php
                        $levelBadge = $item->level;
                        if ($levelBadge === '초급') {
                          echo 'yellow_bg';
                        } else if ($levelBadge === '중급') {
                          echo 'green_bg';
                        } else {
                          echo 'red_bg';
                        }
                      ?>
                      ">
                      <?= $item->level; ?>
                    </span>
                  </div>
                  <div class="courseName fw-bold mt-2">
                    <a href="course_view.php?cid=<?= $item->cid ?>"><?= $item->name?></a>
                  </div>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 <?= $item->due?></span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt number"><?= $item->price?></span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                }
              ?> 
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

