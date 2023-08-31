<?php
$title = "카테고리";
$css_route = "course/css/course.css";
$js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/category_func.php';
?>

<!-- cateid, pcode, name, step -->

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
  <div class="modal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            대분류 등록
          </h1>
        </div>
        <div class="modal-body">
          <label for="code1">카테고리명</label>
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
  <div class="modal fade" id="cate2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
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
              <select class="form-select" aria-label="Default select example" id="pcode2">
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
  <div class="modal fade" id="cate3Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
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
  <div class="category_list">
    <h3 class="content_tt">카테고리 리스트</h3>
    <form action="">
      <div class="row">
        <div class="col-md-4">
          <select class="form-select" aria-label="Default select example" id="cate1">
            <option selected disabled>대분류</option>
            <?php
            foreach ($cate1 as $c) {
              ?>
              <option value="<?= $c->cateid ?>"><?= $c->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-select" aria-label="Default select example" id="cate2">
            <option selected disabled>중분류</option>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-select" aria-label="Default select example" id="cate3">
            <option selected disabled>소분류</option>
          </select>
        </div>
      </div>
    </form>
    <table class="table shadow_box border">
      <thead>
        <tr class="">
          <th scope="col" class="">대분류</th>
          <th scope="col" class="">중분류</th>
          <th scope="col" class="">소분류</th>
          <th scope="col" class="">편집</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach ($cate1 as $c) {
        ?>
        <tr>
          <td><?= $c -> name?></td>
          <td>
            <?php 
              if(isset($c -> pcode) && ($c -> step) == 2){ 
                  echo $c -> name;
                }
              
              
            ?>
          </td>
          <td>Otto</td>
          <td>
            <div>
              <a href="category_ok.php"><i class="ti ti-edit pen_icon"></i></a>
              <a href="category_delete.php"><i class="ti ti-trash bin_icon"></i></a>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&lsaquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&rsaquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</section>

</div><!-- content_wrap -->
</div><!-- wrap -->

<script src="/pudding-LMS-website/admin/course/js/makeoption.js"></script>

<script>

  let categorySubmitBtn = $('.modal button[type="submit"]');

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
    console.log(name, pcode)
    
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
          alert('등록성공');
          // location.reload();//새로고침
        } else if (return_data.result == -1) {
          alert('코드나 분류명이 이미 사용중입니다.');
          // location.reload();//새로고침
        } else {
          alert('등록실패');
        }
      }
    });//ajax
  }


</script>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';

?>