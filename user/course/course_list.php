<?php
$title="강의리스트";
$css_route="course/css/user_course.css";
$js_route = "course/js/user_course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
?>

    <main>
      <div class="container">
        <div class="section1 d-flex justify-content-between pd_2">
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
            <div class="row gap-4 mb-5">
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gap-4 mb-5">
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gap-4 mb-5">
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src="../course_images/327610-eng.png"
                    class="object-fit-cover"
                    alt="강의섬네일"
                  />
                </div>
                <div class="contentBox">
                  <div class="d-flex gap-1">
                    <span class="badge rounded-pill blue_bg b-pd">Badge</span>
                    <span class="badge rounded-pill yellow_bg b-pd">Badge</span>
                  </div>
                  <p class="fw-bold mt-2">
                    자바스크립트(JavaScript)로 배우는 정규표현식
                  </p>
                  <div class="contentTM float-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 3개월</span>
                    </div>
                    <div class="float-end">
                      <span class="main_stt">30000</span><span>원</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

