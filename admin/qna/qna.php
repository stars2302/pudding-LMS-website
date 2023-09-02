<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "js/qna.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

$pagenationTarget = 'qna';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_page.php';


$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);



$pagesql = "SELECT COUNT(*) as pid from qna";
$page_result = $mysqli->query($pagesql);
$page_row = $page_result->fetch_assoc();
//print_r($page_row['cnt']);
$row_num = $page_row['pid']; //전체 게시물 수

$list = 10; //페이지당 출력할 게시물 수
$block_ct = 5;
// $block_num = ceil($page/$block_ct);     //page9,  9/5 1.2 2
$block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
$block_end = $block_start + $block_ct -1; //start 1, end 5

$total_page = ceil($row_num/$list); //총42, 42/5
if($block_end > $total_page) $block_end = $total_page;
$total_block = ceil($total_page/$block_ct);//총32, 2

// $start_num = ($page -1) * $list;

?>

<?php

if ($mysqli->connect_error) {
  die("연결 실패" . $mysqli->connect_error);
}
?>


<?php
$search = isset($_GET['search']) ? $_GET['search'] : ''; //search
?>

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
           
          <?php
          
          $sql = "SELECT * FROM qna order by pid desc limit 0, 10";
          // $result = $mysqli->query($sql)

          // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC);){
 
          ?>


          
          
            <tr>
              <th></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          
       
            
          
            <tr>
              <th scope="row">답변대기</th>
              <td>HTML은 어떤건가요?</td>
              <td>사용자</td>
              <td>2023-08-22</td>
              <td>2</td>
            <tr>
              <th scope="row">답변대기</th>
              <td>HTML은 어떤건가요?</td>
              <td>사용자</td>
              <td>2023-08-22</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="row"><span class="primary">답변완료</span></th>
              <td>HTML은 어떤건가요?</td>
              <td>사용자</td>
              <td>2023-08-22</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="row"><span class="primary">답변완료</span></th>
              <td>HTML은 어떤건가요?</td>
              <td>사용자</td>
              <td>2023-08-22</td>
              <td>2</td>
            </tr>
          </tbody>
        </table>
            <div class="btns">
              <a href="">글쓰기 테스트</a>
            </div>


        <nav
        aria-label="Page navigation example"
        class="d-flex justify-content-center pager"
      >
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&lsaquo;</span>
            </a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&rsaquo;</span>
            </a>
          </li>
        </ul>
      </nav>


      </section>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>