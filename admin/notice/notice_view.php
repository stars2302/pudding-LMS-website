<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
/* 페이지 타이틀 및 CSS/JS 경로 설정 & 데이터 베이스 연결*/

/* GET파라미터로 게시물 고유식별자 'ntid'가져오기 */
$ntid = $_GET['ntid'];
$nt_filename = $_FILES["nt_filename"]["name"] ?? '';




// 조회수 증가
$sql = "UPDATE notice SET nt_read_cnt = nt_read_cnt +1  WHERE ntid='{$ntid}'";
$result = $mysqli -> query($sql);


// 게시물 조회
$sql2 = "SELECT * FROM notice WHERE ntid='{$ntid}'";
$result2 = $mysqli->query($sql2);
$sqlarr = $result2 -> fetch_assoc();

$hit = $sqlarr['nt_read_cnt'] +1 ; //조회수 증가시키기


?>
  <section>
          <div class="view_box">
            <h2 class="main_tt">공지사항</h2>
              <!-- 글 제목 -->
            <div class="notice_view_notice_body shadow_box border justify-content-between">
              <h5 class="main_stt thead_tt"> <?= $sqlarr['nt_title'];?></h5>
              <p class="notice_info d-flex justify-content-end align-items-center">
                <span class="b_text02">작성자</span>
                <span class="b_text02"> <?= $sqlarr['userid']?></span>
                <span class="b_text02">작성일</span>
                <span class="b_text02"> <?= $sqlarr['nt_regdate']?></span>
                <span class="b_text02">조회수</span>
                <span class="b_text02"> <?= $sqlarr['nt_read_cnt'] ?></span>
              </p>
            <div class="content">
              <!-- 본문 -->              
              <?= $sqlarr['nt_filename'] ?>
              <?= $sqlarr['nt_content'] ?>
            </div>
          </div>   
          <div class="notice_view_btns d-flex justify-content-end">
            <a href="notice_update.php?ntid=<?= $ntid; ?>" class="btn_modify btn btn-primary">수정</a>
            <a href="notice_delete_ok.php?ntid=<?= $ntid; ?>" class="btn_delete btn btn-danger">삭제</button>     
            <a href="notice_list.php?ntid=<?= $ntid; ?>" class="btn_cancel btn btn-dark">목록 보기</a>
          </div>
          </div>
        </section> 


        <!-- <script>
        function attachFile(file) {
        console.log(file);
        let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
        formData.append('savefile', file) //<input type="file" name="savefile" value="파일명">
        console.log(formData);
        $.ajax({
        url: 'product_save_image.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        type: 'POST',
        error: function (error) {
          console.log('error:', error)
        },
        success: function (return_data) {
        console.log(return_data);
        if (return_data.result == 'member') {
          alert('로그인을 하십시오.');
          return;
        } else if (return_data.result == 'image') {
          alert('이미지파일만 첨부할 수 있습니다.');
          return;
        } else if (return_data.result == 'size') {
          alert('10메가 이하만 첨부할 수 있습니다.');
          return;
        } else if (return_data.result == 'error') {
          alert('관리자에게 문의하세요');
          return;
        } else {
          //첨부이미지 테이블에 저장하면 할일
          let imgid = $('#file_table_id').val() + return_data.imgid + ',';
          $('#file_table_id').val(imgid);
          let html = `
              <div class="thumb" id="f_${return_data.imgid}" data-imgid="${return_data.imgid}">
                <img src="/abcmall/pdata/${return_data.savefile}" alt="">
                <button type="button" class="btn btn-warning">삭제</button>
             </div>
          `;
          $('#thumbnails').append(html);
        }
      }

    });
  }


          </script> -->
