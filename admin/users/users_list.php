<?php
$title="회원 관리";
$css_route="users/css/users.css";
$js_route = "users/js/users.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


$sql = "SELECT * FROM users where 1=1";
$order = ' ORDER BY uid DESC';
$sc_where = ""; // 검색 조건을 담을 변수
$search_where = '';
$user_search = $_GET['search'] ?? '';

// 검색어가 있으면 유저이름에서 찾아서 적용
if ($user_search !=="") {
    $search_where .= " username LIKE '%{$user_search}%'";
    $sc_where = ' AND' . $search_where;
} else {
    $search_where = ' 1=1';
}

$pagerwhere = $search_where;

//----------------------------------------------pagenation 시작

// 필터 없으면 여기서부터 복사!
$pagenationTarget = 'users'; // pagenation 테이블 명
$pageContentcount = 10; // 페이지 당 보여줄 list 개수
$pageNumber = $_GET['pageNumber'] ?? 1;
$pageCount = $pageContentcount;

$startLimit = ($pageNumber - 1) * $pageCount;

// 전체 게시물 수 구하기
$pagesql = "SELECT COUNT(*) as cnt FROM $pagenationTarget where $pagerwhere";
$page_result = $mysqli->query($pagesql);
$page_row = $page_result->fetch_object();
$row_num = intval($page_row->cnt);

$block_ct = 5;
$total_page = (ceil($row_num / $pageCount));
$block_num = ceil($pageNumber / $block_ct);
$block_start = (($block_num - 1) * $block_ct) + 1;
$block_end = min($block_start + $block_ct - 1, $total_page);

$total_block = ceil($total_page / $block_ct);

$limit = " LIMIT $startLimit, $pageCount"; // select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!
$sqlrc = $sql . $sc_where . $order . $limit; // 필터 있음

//----------------------------------------------pagenation 끝

$result = $mysqli->query($sqlrc); // 필터 없음
$rsc = [];

while ($rs = $result->fetch_object()) {
    $rsc[] = $rs;
}







?>
<!-- top_bar -->
      
      <section>
        
        <h2 class="main_tt dark">회원관리</h2>
    
        <form action="" class="d-flex align-items-center username_keyword_search">
        <div class="input-group">
          <input
            type="text"
            class="form-control"
            placeholder="회원이름을 입력하세요."
            aria-label="회원이름을 입력하세요."
            name="search"
          />
        </div>
        <button class="btn btn-dark">검색</button>
        <button id="resetSearchButton" class="btn btn-primary">전체보기</button>

      </form>


    
          
         
          <div class="d-flex flex-column align-items-center">
          <div class="users_container shadow_box border">
            <table class="table users" id="payment_table">
              <thead>
                <tr>
                  <th scope="col" class="col1">회원ID</th>
                  <th scope="col" class="col2">회원이름</th>
                  <th scope="col" class="col3">회원메일</th>
                  <th scope="col" class="col4">가입날짜</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($rsc)){
                  foreach($rsc as $list){

            
                ?>
                <tr>
                  <td scope="row"><?php echo $list->userid; ?></td>
                  <td><?php echo $list->username; ?></td>
                  <td><?php echo $list->useremail; ?></td>
                  <td><?= date('Y-m-d', strtotime($list -> regdate)) ;?></td>
                </tr>
                <?php
                      }
                    }else {
                      ?>
                        <tr><td colspan="4">검색 결과가 없습니다</td></tr>
                      <?php
                    } ?>
                
                
              </tbody>
            </table>
            
          </div>
      <!-- ***------------------------- pagination - 시작 -------------------------*** -->
      <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
            <ul class="pagination coupon_pager">
                <?php
                if ($pageNumber > 1 && $block_num > 1) {
                    // 이전버튼 활성화
                    $prev = ($block_num - 2) * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev&search=$user_search\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                } else {
                    // 이전버튼 비활성화
                    echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                }

                for ($i = $block_start; $i <= $block_end; $i++) {
                    if ($pageNumber == $i) {
                        echo "<li class=\"page-item active\"><a href=\"?search=$user_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                    } else {
                        echo "<li class=\"page-item\"><a href=\"?search=$user_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                    }
                }

                if ($pageNumber < $total_page && $block_num < $total_block) {
                    // 다음버튼 활성화
                    $next = $block_num * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?pageNumber=$next&search=$user_search\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
                } else {
                    // 다음버튼 비활성화
                    echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page&search=$user_search\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
                }
                ?>
            </ul>
        </nav>
    <!-- ***------------------------- pagination - 끝 -------------------------*** -->
        </div>
      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->
  <script>
   $(document).ready(function () {
    $("#resetSearchButton").on("click", function () {
      var url = new URL(window.location.href);
      url.searchParams.delete("search");
      window.location.href = url.href;
    });
  });
</script>


<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>
