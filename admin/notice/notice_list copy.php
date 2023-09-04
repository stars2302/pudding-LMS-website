<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

//unset()함수를 사용하여 세션 변수를 삭제한다.
unset($_SESSION['viewed_notices']);
/*사용자가 공지사항을 읽을 때 세션에 저장된 공지사항 정보를 초기화하고 다시 읽을 때 새로운 공지사항을 읽는 데 사용될 수 있습니다. 
이를 통해 사용자가 이미 읽은 공지사항을 추적하고 필요에 따라 재설정할 수 있습니다.*/

// 데이터베이스 연결
$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_error) {
  die("연결실패:" . $mysqli->connect_error);
}

$search_where = '';
//검색어(필터 상관없이 전체쿠폰에서 검색)
$cp_search = $_GET['search']??'';
var_dump($cp_search);
if($cp_search){
  $search_where .= " cp_name like '%{$cp_search}%'";
  $sc_where = ' and'.$search_where;
  //제목과 내용에 키워드가 포함된 상품 조회
} else{
  $search_where = '';
}
var_dump($search_where);

//한 페이지 당 표시할 항목 수 및 페이지 네이션 설정
$items_per_page = 10;
$block_ct = 5;

//전체글 개수 확인 
$pagesql = "SELECT COUNT(*) AS cnt FROM notice";
$page_result = $mysqli->query($pagesql);
$page_row = $page_result->fetch_assoc();
$row_num = $page_row['cnt']; //글의 총 갯수

/* notice 테이블에서 모든 레코드 수를 세어 총 게시물 수를 계산한다.
$pagesql의 쿼리를 실행한 결과를 저장하고
$page_result의 첫번째 행을 가져와 연관배열 형식으로 $page_row에 저장한다
$page_row 배열에서 cnt키에 해당하는 값을 가져와 $row_num 변수에 저장한다
이것은 총 게시물 수를 나타낸다 */

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
    
    <!-- ***------------------------- pagination - 시작 -------------------------*** -->
    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      < class="pagination coupon_pager">
        <?php
          if($pageNumber>1 && $block_num > 1 ){
            //이전버튼 활성화
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          } else{
            //이전버튼 비활성화
            echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          }


          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                //필터 있
                echo "<li class=\"page-item active\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                // echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                //필터 있
                echo "<li class=\"page-item\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                // echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }
          }


          if($pageNumber<$total_page && $block_num < $total_block){
            //다음버튼 활성화
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          } else{
            //다음버튼 비활성화
            echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";

          }
        ?>      
    </nav>
    <!-- ***------------------------- pagination - 끝 -------------------------*** -->
<? php echo
  } else {
  echo "데이터조회 실패 " . $mysqli->error;


  //페이지네이션 변수 설정
  $prev_page = $current_page - 1;
  $next_page = $current_page + 1;

  //이전 페이지 및 다음 페이지 링크
  $prev_link = ($prev_page >= 1) ? "?page={$prev_page}" : "#";
  $next = ($next_page <= $total_pages) ? "?page={$next_page}" : "#";
}


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
  ?>
  </script>

  </section>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
  ?>