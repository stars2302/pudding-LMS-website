<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


//검색어 수집
$search_con = $_GET['search'] ?? '';
$sql = "SELECT * from notice WHERE 1=1";

if (!empty($search_con)) {
  $search_con = '%' . $search_con. '%';
  $sql.= " AND nt_title LIKE '%{$search_con}'";
} 

// var_dump($sql);
//SQL 쿼리에 검색어 조건 추가
$result = $mysqli->query($sql);

//결과 확인
if ($result) {
  //루프 내용을 실행

?>
<section>
  <h2 class="main_tt">공지사항</h2>
  <div class="notice_top shadow_box border d-flex justify-content-between">
    <form class="notice_top_left d-flex align-items-center" action="" method="get">
      <input type="text" name="search" size="20" class="input form-control" placeholder="공지사항을 검색하세요" aria-label="Username">
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

      <?php
    while ($row = $result->fetch_assoc()) {
      // var_dump($row);
      // 조회수 증가 로직
      $ntid = $row["ntid"];
      $nt_read_cnt = $row["nt_read_cnt"];

      //이미 조회한 공지사항인지 확인
      $viewed_notices = isset($_SESSION['viewed_notices']) ? $_SESSION['viewed_notices'] : [];

      if (!in_array($ntid, $viewed_notices)) {
        //조회한 공지사항을 세션에 저장
        $_SESSION['viewed_notices'][] = $ntid;

        //검색어가 없거나 제목 또는 내용에 검색어가 포함된 경우만 출력
        if (
          empty($search_con) ||
          stripos($row["nt_title"], $search_con) !== false ||
          stripos($row["nt_content"], $search_con) !== false
        ) {

          echo "<tr>";
          echo "<td class='no_mp'>{$ntid}</td>";
          // 공지사항 제목을 검색 링크로 변경
          echo "<td class='no_mp'><a href='notice_view.php?ntid={$ntid}'>{$row["nt_title"]}</a></td>";
          echo "<td class='no_mp'>" . date("Y-m-d", strtotime($row["nt_regdate"])) . "</td>";
          echo "<td class='no_mp'>{$nt_read_cnt}</td>";
          echo "<td>";
          echo "<div class='icon_group'>";
          echo "<a href='notice_update.php?ntid={$ntid}'><i class='ti ti-edit pen_icon'></i></a>";
          echo "<i class='ti ti-trash bin_icon' data-ntid='{$ntid}'></i>";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
      }
    }
      ?>
    </tbody>
  </table>
  <!-- 페이지네이션 출력 -->
  <?php
}
  ?>


  <script>
    $('.bin_icon').click(function(e) {
      e.preventDefault();
      let ntid = $(this).data('ntid'); //데이터 속성으로 ntid 로드
      if (confirm('삭제하시겠습니까?')) {
        $.ajax({
          type: 'POST',
          url: 'notice_delete_ok.php',
          data: {
            ntid: ntid
          },
          success: function(response) {
            location.reload();
          },
          error: function() {
            alert('삭제 실패');
          }
        });
      } else {
        alert('취소되었습니다.');
      }
    });
  </script>

</section>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>