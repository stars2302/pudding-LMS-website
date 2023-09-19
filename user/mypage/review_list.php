<?php
$title="마이페이지 - 내 수강평";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

  $userid = $_SESSION['UID'];
  $sql = "SELECT p.regdate, c.name, c.cid, r.userid AS review_userid FROM payments p 
          JOIN courses c ON c.cid = p.cid 
          LEFT JOIN review r ON r.cid = c.cid AND r.userid = '{$userid}'
          WHERE p.userid = '{$userid}'";

  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $rs[] = $row;
  }

  var_dump($rs);
  
?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
        <ul>
          <li class="content_stt link_tag mypage_tag"><a href="/pudding-LMS-website/user/mypage/mypage.php">내 강의실</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/buypage.php">구매내역</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/couponpage.php">쿠폰함</a></li>
            <li class="content_stt mypage_tag"><a href="/pudding-LMS-website/user/mypage/review_list.php">수강평</a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="section_wrap">
    <section class="content_wrap">
      <h1 class="jua main_tt">수강평</h1>
      <div class="d-flex flex-column align-items-center">
        <div class="sales_container shadow_box border">
          <table class="table sales" id="payment_table">
            <thead>
              <tr>
                <th scope="col" class="col1">구매날짜</th>
                <th scope="col" class="col2">강의명</th>
                <th scope="col" class="col3">수강평</th>
              </tr>
            </thead>
            <tbody>
            <?php
              if (isset($rs)) {
                foreach ($rs as $list) {
            ?>
              <tr>
                <td><?= date('Y-m-d', strtotime($list->regdate)); ?></td>
                <td><?php echo $list->name ?></td>
                <td>
                  <?php if ($list->review_userid == $userid) { ?>
                    <a href="#" class="btn btn-dark">수정</a>
                    <a href="#" class="btn btn-danger d_btn">삭제</a>
                  <?php } else { ?>
                      <a href="#" class="btn btn-warning">작성하기</a>
                  <?php } ?>
                </td>
              </tr>
              <?php
                }
              }
              ?>
              <!-- <tr>
                <td>2023.09.11</td>
                <td>지금 NOW!! 바로 React 시작하기</td>
                <td>
                  <a href="#" class="btn btn-dark">수정</a
                  ><a href="#" class="btn btn-danger d_btn">삭제</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <nav
      aria-label="Page navigation example"
      class="d-flex justify-content-center pager user_pager"
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
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

