<?php
// session_start();
// if(!$_SESSION['AUID']){
//   echo "<script>
//           alert('접근 권한이 없습니다');
//           history.back();
//       </script>";
// };

$title = "카테고리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';



$sql = "SELECT * FROM category WHERE step=1";
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}
?>

<section class="category_add">
  <h2 class="main_tt dark tt_mb">카테고리 관리</h2>
  <h3 class="content_tt">카테고리 등록</h3>
  <!-- Button trigger modal -->
  <div class="category_add_btns">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cate1Modal">
      대분류 등록
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cate2Modal">
      중분류 등록
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cate3Modal">
      소분류 등록
    </button>
  </div>

  <!-- Modal 1 -->
  <div class="modal cmodal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel1">
            대분류 등록
          </h1>
        </div>
        <div class="modal-body">
          <label for="name1">카테고리명</label>
          <input type="text" class="form-control" name="name1" id="name1" placeholder="대분류명을 입력하세요.">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn_g" data-step="1" data-bs-dismiss="modal">
            등록
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
            취소
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2-->
  <div class="modal cmodal fade" id="cate2Modal" tabindex="-1" aria-labelledby="exampleModalLabel2 aria-hidden=" true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel2">
            중분류 등록
          </h1>
        </div>
        <div class="modal-body">
          <div class="row">
            <?php
            $query = "SELECT * FROM category WHERE step=1";
            $result = $mysqli->query($query);
            while ($rs = $result->fetch_object()) {
              $cate2[] = $rs;
            }
            ?>
            <div class="col-md-12">
              <select class="form-select " aria-label="Default select example" id="pcode2">
                <option selected disabled>대분류를 선택해주세요.</option>
                <?php
                foreach ($cate2 as $p) {
                  ?>
                  <option value="<?= $p->cateid ?>"><?= $p->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <label for="name2">카테고리명</label>
          <input type="text" class="form-control" name="name2" id="name2" placeholder="중분류명을 입력하세요.">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn_g" data-step="2" data-bs-dismiss="modal">
            등록
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
            취소
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3-->
  <div class="modal cmodal fade" id="cate3Modal" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel3">
            소분류 등록
          </h1>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <select class="form-select" aria-label="Default select example" id="pcode2_1">
                <option selected disabled>대분류</option>
                <?php
                foreach ($cate1 as $c) {
                  ?>
                  <option value="<?= $c->cateid ?>"><?= $c->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-select" aria-label="Default select example" id="pcode3">
                <option selected disabled>대분류를 먼저 선택해주세요</option>
              </select>
            </div>
          </div>
          <label for="name3">카테고리명</label>
          <input type="text" class="form-control" name="name3" id="name3" placeholder="소분류명을 입력하세요.">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn_g" data-step="3" data-bs-dismiss="modal">
            등록
          </button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
            취소
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- 카테고리 리스트 -->
  <div class="category_list">
    <h3 class="content_tt">카테고리 리스트</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="dropdown big_cate">
          <button class="btn btn-secondary dropdown-toggle col-md-12 form-select" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            대분류
          </button>
          <ul class="dropdown-menu" id="cate1" style="width: 100%">
            <?php
            foreach ($cate1 as $c) {
              ?>
              <li class="list-group-item big d-flex justify-content-between align-items-center" value="<?= $c->cateid ?>"
                data-cate="<?= $c->cateid ?>">
                <span class="cate_size">
                  <?= $c->name; ?>
                </span>
                <div class="cate_edit_btns d-flex gap-2">
                  <a href="category_update.php?cateid=<?= $c->cateid ?>" data-bs-toggle="modal"
                    data-bs-target="#cateModifyModal1"><i class=" ti ti-edit pen_icon"></i></a>
                  <a href="#"><i class="ti ti-trash bin_icon"></i></a>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dropdown md_cate">
          <button class="btn btn-secondary dropdown-toggle col-md-12 form-select" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            중분류
          </button>
          <ul class="dropdown-menu" id="cate2" style="width: 100%">
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dropdown sm_cate">
          <button class="btn btn-secondary dropdown-toggle col-md-12 form-select" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            소분류
          </button>
          <ul class="dropdown-menu " id="cate3" style="width: 100%">
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- 대분류수정 Modal -->
  <div class="modal fade" id="cateModifyModal1" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel4">
            카테고리 수정
          </h1>
        </div>
        <form class="modal-body" action="category_update.php" method="POST">
          <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
          <label for="name1">카테고리명</label>
          <input type="text" class="form-control modal_cate_name" name="catename" id="name1" value="">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn_g cate_modify" data-step="1"
              data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
              수정
            </button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
              취소
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- 중분류수정 Modal -->
  <div class="modal fade" id="cateModifyModal2" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel5">
            카테고리 수정
          </h1>
        </div>
        <form class="modal-body" action="category_update.php?cateid=<?= $c->cateid; ?>" method="POST">
          <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
          <label for="name1">카테고리명</label>
          <input type="text" class="form-control modal_cate_name" name="catename" id="name1" value="">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn_g cate_modify" data-step="2"
              data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
              수정
            </button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
              취소
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- 소분류수정 Modal -->
  <div class="modal fade" id="cateModifyModal3" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel6">
            카테고리 수정
          </h1>
        </div>
        <form class="modal-body" action="category_update.php?cateid=<<?= $c->cateid ?>" method="POST">
          <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
          <label for="name1">카테고리명</label>
          <input type="text" class="form-control modal_cate_name" name="catename" id="name1" value="">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn_g cate_modify" data-step="3"
              data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
              수정
            </button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
              취소
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <a href="course_list.php" class="btn btn-dark base_mt back_btn">돌아가기</a>
</section>

</div><!-- content_wrap -->
</div><!-- wrap -->

<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>
<script src="/pudding-LMS-website/admin/course/js/makeoption2.js"></script>


<script>

  // 카테고리 등록
  let catename1 = '';
  let cateid = '';

  let categorySubmitBtn = $('.cmodal button[type="submit"]');

  $('#pcode2').change(function () {
    $('#code2').val($(this).val());
  });

  $('#pcode3').change(function () {
    $('#code3').val($(this).val());
  });

  categorySubmitBtn.click(function () {
    let step = $(this).attr('data-step');
    save_category(step);
  });

  function save_category(step) {

    let name = $(`#name${step}`).val();
    let pcode = $(`#pcode${step}`).val();

    if (step > 1 && !pcode) {
      alert('대분류를 먼저 선택하세요');
      return; //아무것도 반환하지 않고 종료
    }
    if (!name) {
      alert('카테고리명을 입력하세요');
      return;
    }
    let data = {
      name: name,
      pcode: pcode,
      step: step
    }
    console.log(data);

    $.ajax({
      async: false,
      type: 'post',
      data: data,
      url: "save_category.php",
      dataType: 'json', //결과 json 객체형식
      error: function (error) {
        console.log('Error:', error);
      },
      success: function (return_data) {
        console.log(return_data.result);

        if (return_data.result == 1) {
          alert('카테고리가 등록되었습니다');
          location.reload();
        } else if (return_data.result == -1) {
          alert('코드나 분류명이 이미 사용중입니다.');
          location.reload();
        } else {
          alert('등록실패');
        }
      }
    });//ajax
  }

  // 카테고리 삭제
  $('.dropdown-menu').on('click', '.bin_icon', function () {
    let trElement = $(this).closest('li');
    let cateid = trElement.attr('data-cate');
    let cateName = trElement.find('span').text();

    let data = {
      cateid: cateid
    }
    // console.log(data)
    if (confirm(`해당 카테고리를 삭제할까요?:\n카테고리명: ${cateName}`)) {
      $.ajax({
        type: 'post',
        data: data,
        url: "category_delete.php",
        dataType: 'json',
        success: function (return_data) {
          if (return_data.result === 'success') {
            console.log('retun_data', return_data)
            trElement.remove();
            alert('카테고리가 삭제되었습니다.');
            location.reload();
          } else {
            alert('카테고리 삭제에 실패하였습니다.');
          }
        },
        error: function (error) {
          console.log('Error:', error);
          alert('카테고리 삭제중에 오류가 발생했습니다.');
        }
      });
    }
  });


  // 카테고리 수정

  //리스트 내 수정버튼 클릭 시 할일
  $('.dropdown-menu').on('click', '.pen_icon', function () {
    let trElement = $(this).closest('li');
    let cateid = trElement.attr('data-cate');
    let cateName = trElement.find('.cate_size').text();
    $('.modal').find('.modal_cate_name').val(cateName);
    $('.catename').val(cateid);
  });



</script>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';

?>