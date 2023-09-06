<?php
  // if(!$_SESSION['AUID']){
  //   echo "<script>
  //           alert('접근 권한이 없습니다');
  //           history.back();
  //       </script>";
  // };

 $title="강의 수정";
 $css_route="course/css/course.css";
 $js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/category_func.php';

$cid = $_GET['cid'];
$sql = "SELECT * FROM courses WHERE cid={$cid}";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();
// var_dump($rs);


$imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
$result = $mysqli -> query($imgsql);

while($is = $result -> fetch_object()){
  $addImgs[]=$is;

  // var_dump($addImgs);
}
// while($is = $result -> fetch_object()){
//   $addImgs["youtube_thumb"]=$is;

//   var_dump($addImgs);
// }
?>

<section>
  <div class="course_title tt_mb">
    <h1>강의 수정</h1>
  </div>
  <form action="update_ok.php" method="POST" id="course_form" enctype="multipart/form-data">
    <input type="hidden" name="image_table_id" id="image_table_id" value="">
    <input type="hidden" name="content" id="content" value="">
    <input type="hidden" name="cid" id="cid" value="<?= $rs->cid?>">
    <div class="categorywrap">
      <label for="formGroupExampleInput" class="form-label content_tt c_mb">카테고리</label>
      <div class="categorys row">
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate1" name="cate1" required>
          <?php
                 $cateString = $rs->cate;
                 $parts = explode('/', $cateString);
         
                 $big_cate = $parts[0];
                 $md_cate = $parts[1];
                 $sm_cate = $parts[2];
            ?>  
           <?php
              foreach($cate1 as $c){      
                if($big_cate == $c->name) {$selected='selected';}else{$selected='';};     
            ?>
             <option value="<?php echo $c->cateid ?>" <?= $selected; ?> data-name="<?php echo $c->name ?>"><?php echo $c->name ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
            <option disabled selected><?php echo $md_cate ?></option>
          </select>
        </div>
        <div class="category col">
          <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
            <option disabled selected><?php echo $sm_cate ?></option>
          </select>
        </div>
      </div>
    </div>

    <div class="course_name c_mt">
      <label for="name" class="form-label content_tt c_mb">강의명</label>
      <input type="text" 
      class="form-control" 
      name="name" id="name" 
      placeholder="강의명을 입력하세요." 
      required
      value="<?= $rs->name; ?>"/>
    </div>

    <div class="section3 d-flex gap-5 c_mt">
        <div class="row price_select">
          <label for="price_status" class="form-label content_tt c_mb">강의가격</label>
          <div class="col">
            <select class="form-select" name="price_status" id="price_status" aria-label="Default select example">
              <option value="유료" <?php if($rs->price_status == "유료") echo 'selected' ?>>유료</option>
              <option value="무료" <?php if($rs->price_status == "무료") echo 'selected' ?>>무료</option>
            </select>
          </div>
          <div class="col price">
            <input 
            type="number" 
            class="form-control" 
            name="price" 
            id="price" 
            min="0" 
            max="1000000" 
            step="10000" 
            value="<?= $rs->price; ?>"
            placeholder="금액"/>
          </div>
        </div>
        <div class="row level level_status">
          <label class="form-label content_tt c_mb">난이도</label>
          <div class="col">
            <input 
            class="form-check-input" 
            type="radio" 
            name="level" 
            id="low" 
            value="초급" <?php if($rs->level == "초급") echo 'checked' ?>/>
            <label class="form-check-label" for="low">초급</label>
          </div>
          <div class="col">
            <input 
            class="form-check-input" 
            type="radio" 
            name="level" 
            id="middle" 
            value="중급" <?php if($rs->level == "중급") echo 'checked' ?>/>
            <label class="form-check-label" for="middle">중급</label>
          </div>
          <div class="col">
            <input 
            class="form-check-input" 
            type="radio" 
            name="level" 
            id="high" 
            value="고급" <?php if($rs->level == "고급") echo 'checked' ?>/>
            <label class="form-check-label" for="high">고급</label>
          </div>
        </div>
    </div>

    <div class="periodwrap d-flex gap-5 c_mt">
      <div class="row period mb-6">
        <label class="form-label content_tt c_mb">수강기간</label>
        <div class="col period_select1">
          <select class="form-select" name="due_status" id="due_status" aria-label="Default select example">
            <option value="제한" <?php if($rs->due_status == "제한") echo 'selected' ?>>제한</option>
            <option value="무제한" <?php if($rs->due_status == "무제한") echo 'selected' ?>>무제한</option>
          </select>
        </div>
        <div class="col period_select2">
          <select class="form-select" name="due" id="due" aria-label="Default select examh5le">
            <option value="" selected disabled>기간선택</option>
            <option value="무제한" <?php if($rs->due == "무제한") echo 'selected' ?>>무제한</option>
            <option value="3개월" <?php if($rs->due == "3개월") echo 'selected' ?>>3개월</option>
            <option value="6개월" <?php if($rs->due == "6개월") echo 'selected' ?>>6개월</option>
            <option value="9개월" <?php if($rs->due == "9개월") echo 'selected' ?>>9개월</option>
            <option value="12개월" <?php if($rs->due == "12개월") echo 'selected' ?>>12개월</option>
          </select>
        </div>
      </div>
      <div class="row act">
        <label class="form-check-label content_tt c_mb">상태</label>
        <div class="col-2 d-flex align-items-center level_status">
          <input class="form-check-input" type="radio" name="act" id="active" value="활성" <?php if($rs->act == "활성") echo 'checked' ?>/>
          <label class="form-check-label" for="active">활성</label>
        </div>
        <div class="col-2 d-flex align-items-center level_status">
          <input class="form-check-input" type="radio" name="act" id="inactive" value="비활성" <?php if($rs->act == "비활성") echo 'checked' ?>/>
          <label class="form-check-label" for="inactive">비활성</label>
        </div>
      </div>
    </div>  

    <div class="content_detail c_mt">
      <h3 class="content_tt c_mb">상세내용</h3>
      <div id="product_detail"><?= $rs->content; ?></div>
    </div>

    <div class="file_input c_mt">
      <label for="thumbnail" class="form-label content_tt c_mb">썸네일</label>
      <input 
      type="file" 
      class="form-control" 
      name="thumbnail" 
      id="thumbnail"
      alt="">
      <img src="<?= $rs->thumbnail; ?>" alt="">
    </div>

    <div class="upload c_mt">
      <label for="youtube" class="form-label content_tt c_mb">강의영상 업로드</label>

      <div class="you_upload">
        <div class="you_upload_content">
          <div class="row">
            <div class="col-2">
              <P>강의썸네일</P>
            </div>
            <div class="col-3">
              <P>강의명</P>
            </div>
            <div class="col-6">
              <P>강의url</P>
            </div>
          </div>
        </div>
        <?php
          $i = 1;
          if(isset($addImgs)){
          foreach($addImgs as $ai){
        ?>  
        <div class="youtube c_mb mt-3">
          <div class="row justify-content-between">
            <div class="col-2 youtube_thumb">
              <input type="file" class="form-control" name="youtube_thumb[]"/>
              <img src="<?= $ai -> youtube_thumb?>" alt="">
            </div>
            <div class="col-3 youtube_name">
              <input type="text" class="form-control" name="youtube_name[]" value="<?= $ai -> youtube_name?>"/>
            </div>
            <div class="col-6 youtube_url">
              <input type="url" class="form-control" name="youtube_url[]" value="<?= $ai -> youtube_url?>"/>
            </div>
            <div class="col-1 trash_icon">
              <label for="delete-youtube<?= $i; ?>"><i class="ti ti-trash bin_icon"></i></label>
              <input type="checkbox" class="delete-youtube hidden" id="delete-youtube<?= $i; ?>" name="delete_youtube[]" value="<?= $ai->l_idx ?>" />
            </div>
          </div>
        </div>
        <?php
        $i++;
            }
          }
          ?>
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
      <button class="btn_complete btn btn-primary">수정완료</button>
      <a href="course_list.php" class="btn btn-dark">수정취소</a>
    </div>
  </form>
</section>
<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>
<?php
 include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>