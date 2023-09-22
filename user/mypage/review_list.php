<?php

$title="마이페이지 - 내 수강평";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

  $pagenationTarget = 'payments'; 
  $pageContentcount = 2; 

  if(!isset($pagerwhere)){
    $pagerwhere = ' 1=1';
  }

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
  $limit = " limit $startLimit, $pageCount"; 


  $userid = $_SESSION['UID'];
  $sql = "SELECT p.regdate, c.name, c.cid,r.rid, r.userid AS review_userid FROM payments p 
          JOIN courses c ON c.cid = p.cid 
          LEFT JOIN review r ON r.cid = c.cid AND r.userid = '{$userid}'
          WHERE p.userid = '{$userid}' ORDER BY r.cid DESC";

$sqlrc = $sql.$limit; 
  $result = $mysqli->query($sqlrc);

  $rs = array();
  while ($row = $result->fetch_object()) {
    $rs[] = $row;
  }


  
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
      <h2 class="jua main_tt">수강평</h2>
      <div class="d-flex flex-column align-items-center">
        <div class="sales_container shadow_box border">
          <table class="table sales review" id="payment_table">
            <thead>
              <tr>
                <th scope="col" class="col_1">구매날짜</th>
                <th scope="col" class="col_2">강의명</th>
                <th scope="col" class="col_3">수강평</th>
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
                    <a href="/pudding-LMS-website/user/mypage/review_view.php?rid=<?= $list->rid; ?>" class="btn btn-warning">보기</a>
                    <!-- <a href="#" class="btn btn-dark">수정</a>
                    <a href="#" class="btn btn-danger d_btn">삭제</a> -->
                  <?php 
                } else { 
                  ?>
                <a href="/pudding-LMS-website/user/mypage/review_create.php?cid=<?= $list->cid; ?>" class="btn btn-warning">작성하기</a>
               <?php
                  }
                ?>
                </td>
              </tr>
              <?php
                }
              }else{

                ?>
                <p>강의가 없습니다!</p>
              <?php
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
    <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
      <ul class="pagination coupon_pager">
        <?php
          if($pageNumber>1 && $block_num > 1 ){
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
          }

          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                 echo "<li class=\"page-item active\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                 echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }
          }

          if($pageNumber<$total_page && $block_num < $total_block){
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          } else{
            echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
          }
        ?>
      </ul>
    </nav>
    </div>
    </main>
    <?php

include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>

