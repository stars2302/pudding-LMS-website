<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


$ntid = $_GET['ntid'];

//조회수 증가시키기

$sql_update = "UPDATE notice SET nt_read_cnt  = nt_read_cnt + 1 where ntid='{$ntid}'";
$result_update = $mysqli->query($sql_update);

//게시물 조회하기 usersver
$sql_select =
  "SELECT * FROM notice WHERE ntid = '{$ntid}'";

$result_select = $mysqli->query($sql_select);
$row = $result_select->fetch_object();



?>

<section>
  <div class="view_box">
    <h2 class="main_tt">공지사항</h2>
    <!-- 글 제목 -->
    <div class="notice_view_notice_body shadow_box border justify-content-between">
      <h5 class="main_stt thead_tt"><?php echo $row->nt_title ?></h5>
      <p class="notice_info d-flex justify-content-end align-items-center">
        <span class="b_text02">작성자</span>
        <span class="b_text02"><?php echo $row->userid ?> </span>
        <span class="b_text02">작성일</span>
        <span class="b_text02"><?php echo $row->nt_regdate ?> </span>
        <span class="b_text02">조회수</span>
        <span class="b_text02"><?php echo $row->nt_read_cnt ?></span>
      </p>
      <div class="content">
        <!-- 본문 -->
        <?php
        $content = $row->nt_content;


        //정규 표현식을 사용하여 이미지 태그를 추출
        preg_match_all('/<img[^>]+>/i', $content, $images);

        //이미지가 포함된 경우, 이미지를 먼저 출력
        if (!empty($images[0])) {
          foreach ($images[0] as $image) {
            echo $image;
          }
        }
        //이미지가 없는 경우에도 텍스트 내용만 출력 

        ?>
      </div>
      <div class="notice_view_btns d-flex justify-content-end">
        <a href="notice_update.php" class="btn_modify btn btn-primary">수정</a>
        <button class="btn_delete btn btn-danger">삭제</button>
        <a href="notice_list.php" class="btn_cancel btn btn-dark">목록 보기</a>
      </div>
    </div>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>