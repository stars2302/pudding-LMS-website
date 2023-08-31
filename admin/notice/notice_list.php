<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
require_once($_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php');
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

//연결 확인
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}


//SQL 쿼리를 통해 데이터를 조회
$sql = "SELECT * FROM notice";
$result = $mysqli->query($sql);

//결과 확인
if ($result) {
  //루프 내용을 실행
?>

  <section>
    <h2 class="main_tt">공지사항</h2>
    <div class="notice_top shadow_box border d-flex justify-content-between">
      <form class="notice_top_left d-flex align-items-center" action="" method="get">
        <input type="text" class="input form-control" placeholder="공지사항을 검색하세요" aria-label="Username">
        <button class="btn btn-dark">검색</button>
      </form>
      <div class="d-flex align-items-center">
        <a class="btn btn-dark" href="notice_create.php">게시물 등록</a>
      </div>
    </div>
    <table class="notice_body table shadow_box border">
      <colgroup>
        <col class="col1">
        <col class="col2">
        <col class="col1">
        <col class="col3">
        <col class="col3">
      </colgroup>
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="">
            <span>번호</span>
          </th>
          <th scope="col" class="no_mp ">
            <span>제목</span>
          </th>
          <th scope="col" class="no_mp ">
            <span>일자</span>
          </th>
          <th scope="col" class="no_mp ">
            <span>조회수</span>
          </th>
          <th scope="col" class="no_mp ">
            <span>편집</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) {
          // 조회수 증가 로직
          $ntid = $row["ntid"];
          $nt_read_cnt = $row["nt_read_cnt"];

          //해당 게시물 조회수 증가를 위해 upadte_sql만 실행
          $update_sql = "UPDATE notice SET nt_read_cnt = '{$nt_read_cnt}' + 1 WHERE ntid = '{$ntid}'";
          $mysqli->query($update_sql);
        ?>
          <tr>
            <td class="no_mp">3215</td>
            <td class="no_mp">
              <a href="notice_view.php"><?= $row["nt_title"] ?></a>
            </td>
            <td class="no_mp">
              <?= date("Y-m-d", strtotime($row["nt_regdate"]))?>
            </td>
            <td class="no_mp">
              <?= $row["nt_read_cnt"] ?>
            </td>
            <td>
              <div class="icon_group">
                <a href="notice_update.php"><i class="ti ti-edit pen_icon"></i></a>
                <i class="ti ti-trash bin_icon" data-ntid="<?= $ntid; ?>"></i>
              </div>
            </td>
          </tr>
        <?php
          // 조회수 증가 로직 추가        
        } ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">«</span>
          </a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">‹</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">›</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">»</span>
          </a>
        </li>
      </ul>
    </nav>
  </section>
<?php
} else {
  echo "데이터조회 실패 " . $mysqli->error;
}
?>

<script>
  $('.').click(function(e) {
    e.preventDefault();
    let ntid = $(this).data('ntid'); //데이터 속성으로 ntid 로드
    if (confirm('삭제하시겠습니까?')) {
      console.log(ntid);
      window.location = 'notice_delete_ok.php?ntid=' + ntid; //ntid를 GET 파라미터로 전달
    } else {
      alert('취소되었습니다.');
    }
  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>