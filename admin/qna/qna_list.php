<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "qna/js/qna.js";

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/header.php';


$search_list = isset($_GET['search']) ? $_GET['search'] : '';

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$per_page = 10;

$sql = "SELECT COUNT(*) FROM qna;";
$result = $mysqli->query($sql);
$row = $result->fetch_array();
$total_posts = $row[0];

$pagenationTarget = 'qna'; 
$pageContentcount = 10; 

if(!isset($pagerwhere)){
  $pagerwhere = ' 1=1';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; 

$sql = "SELECT * FROM qna order by qid desc";
$sqlrc = $sql.$limit; 

$result = $mysqli->query($sqlrc);
?>

<?php

if ($mysqli->connect_error) {
  die("연결 실패" . $mysqli->connect_error);
}
?>
<section>
        <h2 class="main_tt"><?= $title ?> 게시판</h2>
        
        <div class="search_box shadow_box white_bg wrap align-items-center">
          <label for="search" class="hidden">검색</label>
          <input type="search" id="search" class="border form-control" value="" placeholder="질문을 검색해 주세요">
          <button class="search_button btn btn-dark b_text02">검색</button>
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

        <tbody class="b_text02">
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <th class="<?php echo $row['q_state'] == 0 ? 'waiting' : 'completed'; ?>">
                <?php echo $row['q_state'] == 0 ? '답변대기' : '답변완료'; ?>
            </th>
            <td><a href="qna_view.php?qid=<?php echo $row['qid']; ?>"><?php echo $row['q_title']; ?></a></td>         
            <td><?php echo $row['uid']; ?></td>
            <td><?= date('Y-m-d', strtotime($row['q_regdate'])) ;?></td>
            <td><?php echo $row['q_hit']; ?></td>
          </tr>
        <?php endwhile; ?>  
        </tbody>
        </table>

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
                //필터 없
                echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
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
    


      </section>
      </div><!-- //content_wrap -->
</div><!-- //wrap -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>