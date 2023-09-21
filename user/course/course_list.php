<?php
$title="강의리스트";
$css_route="course/css/user_course.css";
$js_route = "course/js/user_course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

//main페이지 검색 
$course_keyword = '';
if (isset($_GET['course_search'])) {
  $key = $_GET['course_search'];
  $course_keyword = " and name LIKE '%$key%' OR cate LIKE '%$key%' OR content LIKE '%$key%' OR level LIKE '%$key%'";
};
$cate_keyword = '';
if (isset($_GET['cate'])) {
  $keycate = $_GET['cate'];
  $cate_keyword = " and cate LIKE '%$keycate'";
};

// desc limit 0, 9

$sql = "SELECT * from courses where 1=1 " ;
$order = ' order by cid desc';
$c_where = '';

$total = $_GET['total']??'';
$frondend = $_GET['frondend']??'';
$backend = $_GET['backend']??'';
$uxui = $_GET['uxui']??'';
$design = $_GET['design']??'';
$etc = $_GET['etc']??'';
$level1 = $_GET['level1']??'';
$level2 = $_GET['level2']??'';
$level3 = $_GET['level3']??'';
$free = $_GET['free']??'';
$pay = $_GET['pay']??'';
$price_status = $_GET['price_status']??'';
$filter_where = '';



//난이도 조회
if($level1 == '초급'){
  $filter_where .= " level='{$level1}'";
  $c_where .= ' and'.$filter_where;
}else if($level2 == '중급'){
  $filter_where .= " level='{$level2}'";
  $c_where .= ' and'.$filter_where;
}else if($level3 == '고급'){
  $filter_where .= " level='{$level3}'";
  $c_where .= ' and'.$filter_where;
}else{
  $filter_where .= " 1=1";
  $c_where .= '';
}


$search_where = '';
$search = $_GET['search']??'';

if($search){
  $search_where .= " name like '%{$search}%'";
  $c_where = ' and'.$search_where;
} else{
  $search_where = '';
}

$sqlrc = $sql.$c_where.$course_keyword.$cate_keyword.$order;
$result = $mysqli -> query($sqlrc);
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
          <form action="#" class="d-flex gap-3">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="강의명으로 검색"
                name="search"
              />
            </div>
            <div class="searchBtn">
              <button class="btn btn-primary dark">검색</button>
            </div>
          </form>
        </div>
        <div class="mainSection d-flex gap-5">
          <form action="#" class="courseCheckBox mb-5">
            <div class="checkBox_1 mb-3">
              <h6>전체선택</h6>
              <hr class="mt-4" />
              <div class="form-check mt-5">
                <label class="form-check-label" for="total"> 전체선택 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="전체선택"
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
                  value="프론트엔드"
                  name="frondend"
                  id="frondend"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="backend"> 백엔드 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="백엔드"
                  name="backend"
                  id="backend"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="uxui"> UX/UI </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="UX/UI"
                  name="uxui"
                  id="uxui"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="design"> 디자인 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="디자인"
                  name="design"
                  id="design"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="etc"> 기타 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="기타"
                  name="etc"
                  id="etc"
                />
              </div>
            </div>
            <div class="checkBox_2 mb-3">
              <h6>난이도</h6>
              <hr class="mt-4" />
              <div class="form-check mt-5">
                <label class="form-check-label" for="level1"> 초급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="초급"
                  name="level1"
                  id="level1"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level2"> 중급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="중급"
                  name="level2"
                  id="level2"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level3"> 고급 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="고급"
                  name="level3"
                  id="level3"
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
                  value="무료"
                  name="free"
                  id="free"
                />
              </div>
              <div class="form-check">
                <label class="form-check-label" for="pay"> 유료 </label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="유료"
                  name="pay"
                  id="pay"
                />
              </div>
            </div>
            <button class="hidden">필터실행</button>
          </form>
          <div class="courseList">
            <div class="row mb-5">
              <?php
                if(isset($rsc)){
                  foreach($rsc as $item){
              ?>        
              <div class="col-12 col-sm-6 col-md-4 courseBox shadow_box"  onclick="location.href='course_view.php?cid=<?= $item->cid ?>'">
                <div class="imgBox">
                  <img
                    src="<?= $item -> thumbnail?>"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox d-flex flex-column justify-content-between">
                  <div>
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
                    <div class="courseName fw-bold">
                      <?= $item->name?>
                    </div>
                  </div>
                  <div class="contentTM d-flex flex-column align-items-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 <?= $item->due?></span>
                    </div>

                    <!-- 무료표시하기 -->
                    <?php
                    if($item->price_status != "무료"){
                    ?>
                      <div>
                        <span class="content_tt number"><?= $item->price?></span><span>원</span>
                      </div>
                    <?php
                    }else{
                    ?>
                      <div>
                        <span class="content_tt">무료</span>
                      </div>
                    <?php 
                    } 
                    ?>
                    <!-- 무료표시 끝 -->
                  </div>
                </div>
              </div>
              <?php
                }
              }else{
              ?> 
                <p>검색결과가 없습니다.</p>
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

