<?php
// session_start();

$title="마이페이지 - 구매내역";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

  $pagenationTarget = 'payments'; 
  $pageContentcount = 2; 

  if(!isset($pagerwhere)){
    $pagerwhere = ' 1=1';
  }

  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
  $limit = " limit $startLimit, $pageCount"; 


  $userid =$_SESSION['UID'];

  $sql = "SELECT p.regdate, p.name,p.total_price,p.discount_price, u.userid FROM payments p JOIN users u ON u.userid = p.userid WHERE u.userid = '{$userid}' ORDER BY p.payid DESC";

  $sqlrc = $sql.$limit; 

  $result = $mysqli->query($sqlrc);
  while($rs = $result->fetch_object()){
    $purchase[]=$rs;
  }


// var_dump($purchase);


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
      <h1 class="jua main_tt">구매내역</h1>
      <div class="d-flex flex-column align-items-center">
        <div class="sales_container shadow_box border">
          <table class="table sales" id="payment_table">
            <thead>
              <tr>
                <th scope="col" class="col1">구매날짜</th>
                <th scope="col" class="col2">구매강의</th>
                <th scope="col" class="col3">상품금액</th>
                <th scope="col" class="col4">결제금액</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($purchase)){
                foreach($purchase as $p){  
              ?>
              <tr>
                <td><?= date('Y-m-d', strtotime($p->regdate)) ;?></td>
                <td><?php echo $p->name ?></td>
                <td><span class="number"><?php echo $p->total_price ?></span><span>원</span></td>
                <td><span class="number"><?php echo $p->discount_price ?></span><span>원</span></td>
              </tr>
              <?php
                }
              }
              ?>
            
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

