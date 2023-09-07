<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "qna/js/qna.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

//search
$search_list = isset($_GET['search']) ? $_GET['search'] : '';


// 현재 페이지 번호
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 페이지당 게시물 수
$per_page = 10;

// 총 게시물 수
  $sql = "SELECT COUNT(*) FROM qna;";
  $result = $mysqli->query($sql);
  $row = $result->fetch_array();
  $total_posts = $row[0];

  
//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'qna'; //pagenation 테이블 명
$pageContentcount = 10; //페이지 당 보여줄 list 개수

if(!isset($pagerwhere)){
  $pagerwhere = ' 1=1';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행
// $sqlrc = $sql.$sc_where.$order.$limit; //필터 있
$sql = "SELECT * FROM qna order by qid desc";
$sqlrc = $sql.$limit; //필터 없
//----------------------------------------------pagenation 끝

$result = $mysqli->query($sqlrc);
?>

<?php

if ($mysqli->connect_error) {
  die("연결 실패" . $mysqli->connect_error);
}
?>

<style>
.waiting {
  color: var(--dark) !important;
}

.completed {
  color: var(--point_primary) !important;
}
</style>
<section>
        <h2 class="main_tt"><?= $title ?> 게시판</h2>
        
        <div class="search_box shadow_box white_bg wrap align-items-center">
          <label for="search" class="hidden">검색</label>
          <input type="search" id="search" class="border form-control" value="" placeholder="질문을 검색해 주세요">
          <button class="search_button btn btn-dark b_text01">검색</button>
        </div>

        <table class="table shadow_box">

          <thead>
            <tr class="content_stt">
              <th scope="col">처리 현황</th>
              <th scope="col">제목</th>
              <th scope="col">작성자</th>
              <th scope="col">등록일</th>
              <th scope="col">조회수</th>
              
            </tr>
          </thead>

        <tbody class="b_text01">
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <!-- 상태 -->
            <th class="<?php echo $row['q_state'] == 0 ? 'waiting' : 'completed'; ?>">
                <?php echo $row['q_state'] == 0 ? '답변대기' : '답변완료'; ?>
            </th>
            <!-- 게시물 제목 -->
            <td><a href="qna_view.php?qid=<?php echo $row['qid']; ?>"><?php echo $row['q_title']; ?></a></td>
            <!-- 작성자 -->            
            <td><?php echo $row['uid']; ?></td>
            <!-- 작성시간 -->
            <td><?= date('Y-m-d', strtotime($row['q_regdate'])) ;?></td>
            <!-- 조회수 -->
            <td><?php echo $row['q_hit']; ?></td>
          </tr>
        <?php endwhile; ?>  
        </tbody>
        </table>

 <!-- ***------------------------- pagination - 시작 -------------------------*** -->
 <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination">
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
                // echo "<li class=\"page-item active\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                //필터 있
                // echo "<li class=\"page-item\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                //필터 없
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
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
      </ul>
    </nav>
    <!-- ***------------------------- pagination - 끝 -------------------------*** -->
    


      </section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>