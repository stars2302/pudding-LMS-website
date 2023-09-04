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


$cates1 = $_GET['cate1'] ?? '';

$sql = "SELECT * FROM category WHERE step=1"; 
$result = $mysqli->query($sql);
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}


$name = $_POST['name'] ?? '';
$sql2 = "SELECT cateid FROM category WHERE name= '{$name}'"; 
$result2 = $mysqli->query($sql2);
// while ($rs2 = $result->fetch_object()) {
//   $rsc2[] = $rs2;
// }
$rs2 = $result -> fetch_object();

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
  <div class="modal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
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
  <!-- 카테고리 리스트 -->
  <div class="category_list">
    <h3 class="content_tt">카테고리 리스트</h3>
    <form action="" id="search_form" method="POST">
      <div class="row">
        <div class="col-md-4">
          <select class="form-select cate_select" aria-label="Default select example" id="cate1">
            <option selected disabled>대분류</option>
            <?php
            foreach ($cate1 as $c) {
              ?>
              <option value="<?= $c->cateid ?>" data-cate="<?= $c->name; ?>"><?= $c->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-select cate_select" aria-label="Default select example" id="cate2">
            <option selected disabled>중분류</option>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-select cate_select" aria-label="Default select example" id="cate3">
            <option selected disabled>소분류</option>
          </select>
        </div>
      </div>
      <button type="button" class="btn btn-primary search_btn">조회</button>
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
        <tr>
        <!-- 조회된 리스트 tr 생성  -->
        </tr>
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
<!-- <script src="/pudding-LMS-website/admin/course/js/makeoption2.js"></script> -->


<script>


//페이지 로드되면 대분류

   // Get the selected text of each option in the #cate1 select element
   var cate1OptionsText = $('#cate1 option').map(function() {
    return $(this).text();
  }).get();

  // Create the HTML for the first row of the table
  var trHTML1 = '';
  for (var i = 0; i < cate1OptionsText.length; i++) {
    trHTML1 += `<tr>
                    <td class="cate_name cate_name1" date-catename =${cateTitle1} date-cateid =${cateId3}>${cate1OptionsText[i]}</td>
                    <td class="cate_name cate_name2" date-catename =${cateTitle2} date-cateid =${cateId3}> </td>
                    <td class="cate_name3" date-catename =${cateTitleArr} date-cateid=${cateId3}> </td>
                    <td>
                        <div>
                            <div class="cate_delete"><i class="ti ti-trash bin_icon"></i></div>
                        </div>
                    </td>
                </tr>`;
  }
  

  // Append the HTML to the table tbody
  $('table tbody').append(trHTML1);
//페이지 로드되면 대분류 end


view_category(1);
  let catename1 = '';
  let cateid = '';
  //조회 버튼 클릭시, 할일
  $('.search_btn').click(function () {
    view_category();
  });

  //view_category 함수
  function view_category() {
    let step = $('#cate1').val();
    let name = $('#cate2').val();
    let data = {
      step:step,
      name:name
    };

    $.ajax({
      type: 'post',
      data: data,
      url: "view_category.php",
      dataType: 'json',
      success: function (return_data) {
        cateid = return_data.result;
        console.log('cateid',cateid)
        catename1 = return_data.catename
        if (return_data.catename && return_data.result) {
          makeTr(return_data.catename, return_data.result);
        } else if (return_data.result == 'fail') {
          alert('조회 결과 없습니다.');
        }
      },
      error: function (error) {
        console.log('Error:', error);
      }
    });
  }
//console.log('cateid',cateid)
  //makeTr 함수
  function makeTr(step, data) {
    let trHTML = '';
    //let selectedCate = $('#cate1').find("option:selected");
    // let cateTitle1 = selectedCate.data("cate");
    // let cateTitle2 = name;
    // let cateTitleArr = []
    // let cateId2 = name;
    // let cateId3 = name;

    data.forEach(function (item) {
      if (item.step == 2) {
        cateId2 = item.cateid;
        cateTitle2 = item.name;
      }
      if (item.step == 3) {
        cateId3 = item.cateid;
        cateTitleArr = item.name;
        console.log(cateId3,'cateId3')
        
      }

      trHTML += `<tr>
                    <td class="cate_name cate_name1" date-catename =${cateTitle1} date-cateid =${cateId3}>${cateTitle1}</td>
                    <td class="cate_name cate_name2" date-catename =${cateTitle2} date-cateid =${cateId3}>${cateTitle2}</td>
                    <td class="cate_name3" date-catename =${cateTitleArr} date-cateid=${cateId3}>${cateTitleArr}</td>
                    <td>
                        <div>
                            <div class="cate_delete"><i class="ti ti-trash bin_icon"></i></div>
                        </div>
                    </td>
                </tr>`;
    });
    $('table tbody').empty().append(trHTML);
  }




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
          alert('카테고리가 등록되었습니다');
          //location.reload();
        } else if (return_data.result == -1) {
          alert('코드나 분류명이 이미 사용중입니다.');
          //location.reload();
        } else {
          alert('등록실패');
        }
      }
    });//ajax
  }






    $('tbody').on('click','.cate_delete',function(){
        let trElement = $(this).closest('tr');

       // let cateid = trElement.find('.cate_name1').text();
        let cateName1 = trElement.find('.cate_name1').text();
        let cateName2 = trElement.find('.cate_name2').text();
        let cateName3 = trElement.find('.cate_name3').text();

        if (confirm(`해당 카테고리를 삭제할까요?:\n대분류명: ${cateName1}\n중분류명: ${cateName2}\n소분류명: ${cateName3}`)) {

            $.ajax({
                type: 'post',
                data: {
                    cateid: cateid,
                    cateName1: cateName1,
                    cateName2: cateName2,
                    cateName3: cateName3
                },
                url: "category_delete.php", 
                dataType: 'json',
                success: function(return_data) {
                    if (return_data.result === 'success') {
                        trElement.remove();
                        alert('카테고리가 삭제되었습니다.');
                    } else {
                        alert('카테고리 삭제에 실패하였습니다.');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                    alert('카테고리 삭제중에 오류가 발생했습니다.');
                }
            });
        }
    });






</script>


<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';

?>