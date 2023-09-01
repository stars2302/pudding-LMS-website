<?php
$title = "공지사항 게시물";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


$ntid = $_GET['ntid'];

//조회수 증가시키기

$sql_update = "UPDATE notice SET nt_read_cnt  = nt_read_cnt + 1 where ntid='{$ntid}'";
$result_update = $mysqli->query($sql_update);

//게시물 조회하기
$sql_select = "SELECT notice.ntid, nt_title, nt_filename, nt_read_cnt, nt_content, nt_regdate
FROM notice
JOIN users
ON notice.ntid = users.uid
WHERE notice.ntid = '{$ntid}'";
$result_select = $mysqli->query($sql_select);


if ($result_select) {
  $row = $result_select->fetch_assoc();  //$row배열에서 필요 정보를 사용
} else {
  echo "게시물 조회 실패 " . $mysqli->error;
}


?>

<section>
  <div class="view_box">
    <h2 class="main_tt">공지사항</h2>
    <!-- 글 제목 -->
    <div class="notice_view_notice_body shadow_box border justify-content-between">
      <h5 class="main_stt thead_tt"><?php echo $row["nt_title"] ?></h5>
      <p class="notice_info d-flex justify-content-end align-items-center">
        <span class="b_text02">작성자</span>
        <span class="b_text02"><?php echo $row["username"] ?> </span>
        <span class="b_text02">작성일</span>
        <span class="b_text02"><?php echo $row["regdate"] ?> </span>
        <span class="b_text02">2023-08-18</span>
        <span class="b_text02">조회수</span>
        <span class="b_text02"><?php echo $row["nt_read_cnt"] ?></span>
      </p>
      <div class="content">
        <!-- 본문 -->
        <?php echo $row["nt_content"] ?>
        <!-- <p>
          동영상 업로드 및 변환 복구 작업이 완료되어 정상적으로 이용이 가능합니다.
          <br>
          금일 많은 대학의 개강으로 인해 15시 30분경 타 대학뿐만 아니라 우리 대학에서도 학습관리시스템(LMS) 동영상 클라우드 서비스
          이용량의 증가로 동영상 변환에 장애가 발생하였습니다.
          시스템 담당 업체에서 서버 증설 작업을 진행하였으나 동영상 업로드 후 변환 시간에는 다소 지연되고 있으며, 점차 변환 가동률을 높여
          복구 작업을 진행하고 있습니다.
          <br>
          변환 후 동영상 재생은 정상적으로 진행되며 현재 동영상 업로드를 진행하시는 교수님들께서는 참고해 주시기 바랍니다.
          이용에 불편을 드린 점 양해 부탁드립니다.
          감사합니다.
        </p>
      </div> -->
      </div>
      <div class="notice_view_btns d-flex justify-content-end">
        <a class="btn_modify btn btn-primary">수정</a>
        <button class="btn_delete btn btn-danger">삭제</button>
        <a href="notice_list.php" class="btn_cancel btn btn-dark">목록 보기</a>
      </div>
    </div>
</section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>