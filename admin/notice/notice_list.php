<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

unset($_SESSION['viewed_notices']);

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

//검색어 수집
$search_con = isset($_GET['search']) ? $_GET['search'] : '';

//한 페이지 당 표시할 항목 수 및 페이지 네이션 설정
$items_per_page = 10;
$block_ct = 5;

//전체글 개수 확인 
$pagesql = "SELECT COUNT(*) AS cnt FROM notice";
$page_result = $mysqli->query($pagesql);
$page_row = $page_result->fetch_assoc();
$row_num = $page_row['cnt']; //글의 총 갯수

//전체 페이지 수 계산
$total_pages = ceil($row_num / $items_per_page);


//현재 페이지 번호 가져오기
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//이전페이지 및 다음 페이지 링크
$prev_page = ($current_page > 1) ? $current_page - 1 : 1;
$next_page = ($current_page <  $total_pages) ? $current_page + 1 : $total_pages;

//페이지네이션 갯수 설정
$start_page = max($current_page - floor($block_ct / 2), 1);
$end_page = min($start_page + $block_ct - 1, $total_pages);

//이전 페이지 링크 생성 및
$prev_link = ($current_page > 1) ? "?page={$prev_page}" : "#";


//다음 페이지 링크 생성
$next_link = ($current_page < $total_pages) ? "?page={$next_page}" : "#";


//SQL 쿼리를 통해 데이터를 조회 (페이징 적용)
$start_item = ($current_page - 1) * $items_per_page;
$sql = "SELECT * FROM notice order by ntid desc";
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
  echo "<nav aria-label='Page navigation example'>";
  echo "<ul class='pagination justify-content-center'>";
  if ($current_page > 1) {
    echo "<li class='page-item'><a class='page-link' href='?page=1'>처음</a></li>";
    echo "<li class='page-item'><a class='page-link' href='{$prev_link}'>이전</a></li>";
  }
  for ($i = $start_page; $i <= $end_page; $i++) {
    $active_class = ($i == $current_page) ? 'active' : '';
    echo "<li class='page-item 
      {$active_class}'><a class='page-link' 
      href='?page={$i}'>{$i}</a></li>";
  }
  if ($end_page < $total_pages) {
    echo "<li class='page-item'><a class='page-link'href='{$next_link}'>다음</a></li>";
    echo "<li class='page-item'><a class='page-link'href='?page={$total_pages}'>끝</a></li>";
  }
  echo "</ul>";
  echo "</nav>";
} else {
  echo "데이터조회 실패 " . $mysqli->error;


  //페이지네이션 변수 설정
  $prev_page = $current_page - 1;
  $next_page = $current_page + 1;

  //이전 페이지 및 다음 페이지 링크
  $prev_link = ($prev_page >= 1) ? "?page={$prev_page}" : "#";
  $next = ($next_page <= $total_pages) ? "?page={$next_page}" : "#";
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