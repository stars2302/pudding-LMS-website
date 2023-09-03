<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "qna/js/qna.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';


// 현재 페이지 번호
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 페이지당 게시물 수
$per_page = 10;

// 총 게시물 수
$sql = "SELECT COUNT(*) FROM qna";
$result = $mysqli->query($sql);
$row = $result->fetch_array();
$total_posts = $row[0];

// 총 페이지 수
$total_pages = ceil($total_posts / $per_page);

// 시작 게시물
$start = ($current_page - 1) * $per_page; // (1-1)*10 = 0, (2-1)*10 = 10

// 게시물 가져오기
$sql = "SELECT * FROM qna LIMIT $start, $per_page";
$result = $mysqli->query($sql);


$block_ct = 5; // 페이지 버튼 5개
$block_num = ceil($per_page/$block_ct);//pageNumber 1,  9/5 1.2 2
$block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
$block_end = $block_start + $block_ct -1; //start 1, end 5

$total_page = ceil($per_page/$block_ct); //총52, 52/5
if($block_end > $total_page) $block_end = $total_page;
$total_block = ceil($total_page/$block_ct);//총32, 2

?>

<?php

if ($mysqli->connect_error) {
  die("연결 실패" . $mysqli->connect_error);
}
?>


<?php
$search = isset($_GET['search']) ? $_GET['search'] : ''; //search
?>
<style>
.waiting {
  color: grey !important;
}

.completed {
  color: var(--point_primary) !important;
}
</style>
<section>
        <h2 class="main_tt">Q&amp;A 게시판</h2>
        
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
            <td><a href="qna_content.php?qid=<?php echo $row['qid']; ?>"><?php echo $row['q_title']; ?></a></td>
            <!-- 작성자 -->            
            <td><?php echo $row['uid']; ?></td>
            <!-- 작성시간 -->
            <td><?php echo $row['q_regdate']; ?></td>
            <!-- 조회수 -->
            <td><?php echo $row['q_hit']; ?></td>
          </tr>
        <?php endwhile; ?>  
        </tbody>
        </table>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
          <ul class="pagination">
            <?php if ($current_page > 1): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                  <span aria-hidden="true">&lsaquo;</span>
                </a>
              </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>
            <?php if ($current_page < $total_pages): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                  <span aria-hidden="true">&rsaquo;</span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>