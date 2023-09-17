<?php
// session_start();

$title="마이페이지 - 구매내역";
$css_route="mypage/css/mypage.css";
$js_route = "mypage/js/mypage.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';
//   if(isset($_SESSION['UID'])){
//     if($_SESSION['UID'] == TRUE){
//       echo "<script>
//         alert('권한이 없습니다.');
//         location.href = '/pudding-LMS-website/uesr/index.php';
//       </script>";
//     }
//   } else{
//     echo "<script>
//         alert('권한이 없습니다.');
//         location.href = '/pudding-LMS-website/user/kakaologin.php';
//       </script>";
//   }

// $current_userid =$_SESSION['UID'];

$sql = "SELECT p.regdate, p.name,p.total_price,p.discount_price, u.userid FROM payments p JOIN users u ON u.userid = p.userid WHERE u.userid = 'kitty' ORDER BY p.payid DESC";
// $purchase = array();
//위에 로그인 연결되면 바꾸고 지우기
// $sql = "SELECT p.*, u.userid FROM payments p JOIN users u ON u.userid = p.userid  ORDER BY p.regdate DESC";

var_dump($sql);
$result = $mysqli->query($sql);
while($rs = $result->fetch_object()){
  $purchase[]=$rs;
}

var_dump($purchase);


?>
<main class="d-flex">
    <aside class="mypage_wrap">
      <div class="">
        <h4 class="jua main_tt my_title">마이페이지</h4>
        <nav>
          <ul>
          <li class="content_stt link_tag"><a href="/pudding-LMS-website/user/mypage/mypage.php">내 강의실</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/buypage.php">구매내역</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/couponpage.php">쿠폰함</a></li>
            <li class="content_stt"><a href="/pudding-LMS-website/user/mypage/review_list.php">수강평</a></li>
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
                <td><?php echo $p->discount_price ?></td>
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

