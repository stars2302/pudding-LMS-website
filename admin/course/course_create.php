<?php
$title="대시보드";
 $css_route="course/css/course.css";
 $js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';
?>

        <section>
          <div class="course_title">
            <h1>강의 등록</h1>
          </div>
          <form action="">
            <div class="categorywrap">
              <label for="formGroupExampleInput" class="form-label"><h5>카테고리</h5></label>
              <div class="categorys row">
                <div class="category col">
                  <select class="form-select" aria-label="Default select example">
                    <option disabled selected>대분류 선택</option>
                    <option value="1">대분류1</option>
                  </select>
                </div>
                <div class="category col">
                  <select class="form-select" aria-label="Default select example">
                    <option disabled selected>중분류 선택</option>
                    <option value="1">중분류1</option>
                  </select>
                </div>
                <div class="category col">
                  <select class="form-select" aria-label="Default select example">
                    <option disabled selected>소분류 선택</option>
                    <option value="1">소분류1</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="course_name">
              <label for="formGroupExampleInput" class="form-label"><h5>강의명</h5></label>
              <input
                type="text"
                class="form-control"
                id="formGroupExampleInput"
                placeholder="강의명을 입력하세요."
              />
            </div>

            <div class="section3 d-flex gap-5">
                <div class="row price_select">
                  <label for="formGroupExampleInput2" class="form-label"><h5>강의가격</h5></label>
                  <div class="col">
                    <select class="form-select" id="price_menu" aria-label="Default select example">
                      <option value="유료" selected>유료</option>
                      <option value="무료">무료</option>
                    </select>
                  </div>
                  <div class="col price">
                    <input
                      type="number"
                      class="form-control"
                      id="formGroupExampleInput2"
                      min="10000"
                      max="1000000"
                      step="10000"
                    />
                  </div>
                </div>
              <div class="row level_select level_status">
                <label for="formGroupExampleInput2" class="form-label"><h5>난이도</h5></label>
                <div class="col-md-2">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="option1"
                  />
                  <label class="form-check-label" for="inlineRadio1">초급</label
                  >
                </div>
                <div class="col-md-2">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="option2"
                  />
                  <label class="form-check-label" for="inlineRadio2">중급</label
                  >
                </div>
                <div class="col-md-2">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio3"
                    value="option3"
                  />
                  <label class="form-check-label" for="inlineRadio3">고급</label
                  >
                </div>
              </div>
            </div>

            <div class="periodwrap d-flex gap-5">
              <div class="row period mb-6">
                <label for="formGroupExampleInput2" class="form-label"><h5>수강기간</h5></label>
                <div class="col period_select1">
                  <select class="form-select" id="limit" aria-label="Default select example">
                    <option value="제한" selected>제한</option>
                    <option value="무제한">무제한</option>
                  </select>
                </div>
                <div class="col h5eriod_select2">
                  <select class="form-select month" aria-label="Default select examh5le">
                    <oh5tion selected disabled>기간선택</oh5tion>
                    <option>3개월</option>
                    <option>6개월</option>
                    <option>9개월</option>
                    <option>12개월</option>
                  </select>
                </div>
              </div>
              <div class="row act">
                <label class="form-check-label" for="inlineRadio1"><h5>상태</h5></label>
                <div class="col-md-3 d-flex align-items-center level_status">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio1"
                    value="option1"
                  />
                  <label class="form-check-label" for="inlineRadio1" >활성</label>
                </div>
                <div class="col-md-3 d-flex align-items-center level_status">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="inlineRadio2"
                    value="option2"
                  />
                  <label class="form-check-label" for="inlineRadio2">비활성</label>
                </div>
              </div>
            </div>  

            <div class="content_detail">
              <label class="form-check-label mb-3" for="inlineRadio2"><h5>상세내용</h5></label>
              <div id="product_detail"></div>
            </div>

            <div class="file_input">
              <label for="formGroupExampleInput" class="form-label"><h5>첨부파일</h5></label>
              <input
                type="file"
                class="form-control"
                id="formGroupExampleInput"
              />
            </div>

            <div class="drag_drop">
              <label for="formGroupExampleInput" class="form-label"><h5>추가이미지 업로드</h5></label>
              <div id="drop" class="box mb-3">
                <span>이미지를 드래그해서 올려주세요</span>
                <div id="thumbnails" class="d-flex justify-content-start"></div>
              </div>
            </div>

            <div class="upload">
              <label for="formGroupExampleInput" class="form-label"><h5>강의영상 업로드</h5></label>
              <div class="you_upload">
                <div class="youtube">
                  <div class="row justify-content-between mt-3">
                    <div class="col-4 youtube_name">
                      <input
                        type="text"
                        class="form-control"
                        id="formGroupExampleInput2"
                        placeholder="강의명을 입력하세요"
                      />
                    </div>
                    <div class="col-7 youtube_url">
                      <input
                        type="url"
                        class="form-control"
                        id="formGroupExampleInput2"
                        placeholder="강의URL을 넣어주세요"
                      />
                    </div>
                    <div class="col-1 trash_icon">
                      <i class="ti ti-trash bin_icon"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="add_listBtn mt-5">
                <a href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M3.99951 15.9977C3.99951 17.5736 4.3099 19.134 4.91296 20.5899C5.51601 22.0458 6.39993 23.3687 7.51423 24.483C8.62853 25.5973 9.9514 26.4812 11.4073 27.0843C12.8632 27.6873 14.4236 27.9977 15.9995 27.9977C17.5754 27.9977 19.1358 27.6873 20.5917 27.0843C22.0476 26.4812 23.3705 25.5973 24.4848 24.483C25.5991 23.3687 26.483 22.0458 27.0861 20.5899C27.6891 19.134 27.9995 17.5736 27.9995 15.9977C27.9995 14.4218 27.6891 12.8614 27.0861 11.4055C26.483 9.9496 25.5991 8.62673 24.4848 7.51243C23.3705 6.39813 22.0476 5.51421 20.5917 4.91116C19.1358 4.3081 17.5754 3.99771 15.9995 3.99771C14.4236 3.99771 12.8632 4.3081 11.4073 4.91116C9.9514 5.51421 8.62853 6.39813 7.51423 7.51243C6.39993 8.62673 5.51601 9.9496 4.91296 11.4055C4.3099 12.8614 3.99951 14.4218 3.99951 15.9977Z" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.9995 15.9998H19.9995" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.9995 12.0002V20.0002" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  리스트 추가
                </a>
              </div>
            </div>

            <div class="button d-flex justify-content-center align-items-center mt-5 mb-5">
              <button class="btn_complete btn btn-primary">등록완료</button>
              <button class="btn btn-dark">등록취소</button>
            </div>
          </form>
        </section>
      </div>
      <!-- content_wrap -->
    </div>
    <!-- wrap -->

    <?php

 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>