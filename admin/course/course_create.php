<?php
 $title="강의 등록";
 $css_route="course/css/course.css";
 $js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/category_func.php';
?>

<section>
  <div class="course_title tt_mb">
    <h1>강의 등록</h1>
  </div>
  <form action="course_ok.php" method="POST" id="course_form" enctype="multipart/form-data">
    <input type="hidden" name="video_table_id" id="video_table_id" value="">
    <input type="hidden" name="content" id="content" value="">
    <div class="categorywrap">
      <label for="formGroupExampleInput" class="form-label content_tt c_mb">카테고리</label>
      <div class="categorys row">
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate1" name="cate1" required>
            <option disabled selected>대분류 선택</option>
            <?php
              foreach($cate1 as $c){            
            ?>
              <option value="<?php echo $c->cateid ?>" data-name="<?php echo $c->name ?>"><?php echo $c->name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
            <option disabled selected>중분류 선택</option>
          </select>
        </div>
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
            <option disabled selected>소분류 선택</option>
          </select>
        </div>
      </div>
    </div>

    <div class="course_name c_mt">
      <label for="name" class="form-label content_tt c_mb">강의명</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="강의명을 입력하세요." required/>
    </div>

    <div class="section3 d-flex gap-5 c_mt">
        <div class="row price_select">
          <label for="price_status" class="form-label content_tt c_mb">강의가격</label>
          <div class="col">
            <select class="form-select" name="price_status" id="price_menu" aria-label="Default select example">
              <option name="price" value="유료" selected>유료</option>
              <option name="price" value="무료">무료</option>
            </select>
          </div>
          <div class="col price">
            <input type="number" class="form-control" name="price" id="price" min="0" max="1000000" step="10000" placeholder="금액"/>
          </div>
        </div>
        <div class="row level level_status">
          <label class="form-label content_tt c_mb">난이도</label>
          <div class="col">
            <input class="form-check-input" type="radio" name="level" id="low" value="초급"/>
            <label class="form-check-label" for="low">초급</label>
          </div>
          <div class="col">
            <input class="form-check-input" type="radio" name="level" id="middle" value="중급"/>
            <label class="form-check-label" for="middle">중급</label>
          </div>
          <div class="col">
            <input class="form-check-input" type="radio" name="level" id="high" value="고급"/>
            <label class="form-check-label" for="high">고급</label>
          </div>
        </div>
    </div>

    <div class="periodwrap d-flex gap-5 c_mt">
      <div class="row period mb-6">
        <label class="form-label content_tt c_mb">수강기간</label>
        <div class="col period_select1">
          <select class="form-select" name="due_status" id="due_status" aria-label="Default select example">
            <option value="제한" selected>제한</option>
            <option value="무제한">무제한</option>
          </select>
        </div>
        <div class="col period_select2">
          <select class="form-select" name="due" id="due" aria-label="Default select examh5le">
            <option value="" selected disabled>기간선택</option>
            <option value="무제한">무제한</option>
            <option value="3개월">3개월</option>
            <option value="6개월">6개월</option>
            <option value="9개월">9개월</option>
            <option value="12개월">12개월</option>
          </select>
        </div>
      </div>
      <div class="row act">
        <label class="form-check-label content_tt c_mb">상태</label>
        <div class="col-2 d-flex align-items-center level_status">
          <input class="form-check-input" type="radio" name="act" id="active" value="활성"/>
          <label class="form-check-label" for="active">활성</label>
        </div>
        <div class="col-2 d-flex align-items-center level_status">
          <input class="form-check-input" type="radio" name="act" id="inactive" value="비활성"/>
          <label class="form-check-label" for="inactive">비활성</label>
        </div>
      </div>
    </div>  

    <div class="content_detail c_mt">
      <h3 class="content_tt c_mb">상세내용</h3>
      <div id="product_detail"></div>
    </div>

    <div class="file_input c_mt">
      <label for="thumbnail" class="form-label content_tt c_mb">썸네일</label>
      <input type="file" class="form-control" name="thumbnail" id="thumbnail"/>
    </div>

    <div class="upload c_mt">
      <label for="youtube" class="form-label content_tt c_mb">강의영상 업로드</label>
      <div class="you_upload">
        <div class="you_upload_content">
          <div class="row c_mb">
            <div class="col-2 youtube_thumb">
              <P>강의썸네일</P>
            </div>
            <div class="col-3 youtube_name">
              <P>강의명</P>
            </div>
            <div class="col-6 youtube_url">
              <P>강의url</P>
            </div>
          </div>
        </div>
        <div class="youtube c_mb">
          <div class="row justify-content-between">
            <div class="col-2 youtube_thumb">
              <input type="file" class="form-control" name="youtube_thumb[]" id="youtube_thumb"/>
            </div>
            <div class="col-3 youtube_name">
              <input type="text" class="form-control" name="youtube_name[]" id="youtube_name" placeholder="강의명을 입력하세요"/>
            </div>
            <div class="col-6 youtube_url">
              <input type="url" class="form-control" name="youtube_url[]" id="youtube_url" placeholder="강의URL을 넣어주세요"/>
            </div>
            <div class="col-1 trash">
              <i class="ti ti-trash bin_icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="add_listBtn">
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
    <div class="c_button d-flex justify-content-center align-items-center">
      <button class="btn_complete btn btn-primary">등록완료</button>
      <button class="btn btn-dark">등록취소</button>
    </div>
  </form>
</section>
<script>
  $(".you_upload").on("click", "#trash", function () {
    $(this).closest(".youtube").remove();
  });
</script>
<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>
<?php
 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>