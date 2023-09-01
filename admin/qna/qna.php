<?php
$title = "공지사항";
$css_route = "qna/css/qna.css";
$js_route = "qna/js/qna.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

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
            <tr>
              <th scope="row">답변대기</th>
              <td>HTML은 어떤건가요?</td>
              <td>사용자</td>
              <td>2023-08-22</td>
              <td>2</td>
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