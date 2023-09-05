<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
/* 페이지 타이틀 및 CSS/JS 경로 설정 & 데이터 베이스 연결*/

/* GET파라미터로 게시물 고유식별자 'ntid'가져오기 */
$ntid = $_GET['ntid'];




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
              <?php
                if($sqlarr['filetype']==0) {
              ?>
                <a href="<?= $sqlarr['nt_filename'] ?>"><?= $sqlarr['nt_filename'] ?></a>
              <?php
                } else {
                ?>                 
              <img src="<?= $sqlarr['nt_filename'] ?>">             
              <?php
                }
              ?> 
              <?= $sqlarr['nt_content'] ?>
            </div>
          </div>   
          <div class="notice_view_btns d-flex justify-content-end">
            <a href="notice_update.php?ntid=<?= $ntid; ?>" class="btn_modify btn btn-primary">수정</a>
            <a href="notice_delete_ok.php?ntid=<?= $ntid; ?>" class="btn_delete btn btn-danger">삭제</button>     
            <a href="notice_list.php" class="btn_cancel btn btn-dark">목록 보기</a>
          </div>
          </div>
        </section> 

