<?php
$title="공지사항";
$css_route="notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';


$sql = "SELECT * from notice where 1=1";
if(!isset($pagerwhere)){
  $pagerwhere = ' 1=1';
}

$pagenationTarget = 'notice';
$pageContentcount = 10; 
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/pager.php';
$limit = " limit $startLimit, $pageCount"; 
$order = " order by ntid desc";

$sqlrc = $sql.$order.$limit; 



$result = $mysqli -> query($sqlrc);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;

} 
// var_dump($rsc);




?>

<div class="container">
  <section class="content_wrap">
    <h2 class="jua main_tt">공지사항</h2>
    <div class="d-flex flex-column align-items-center">
      <div class="notice_container shadow_box border radius_5">
        <table class="table notice " id="notice_table">
          <thead>
            <tr>
              <th scope="col" class="col1">제목</th>
              <th scope="col" class="col2">일자</th>
              <th scope="col" class="col3">조회수</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($rsc)){
              foreach($rsc as $noti){  
            ?>
            <tr>
              <td><a href="/pudding-LMS-website/user/notice/notice_view.php?ntid=<?= $noti->ntid ?>"><?= $noti->nt_title ;?></a></td>
              <td><?= $noti->nt_regdate ;?></td>
              <td><?= $noti->nt_read_cnt ;?></td>
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
                echo "<li class=\"page-item active\"><a href=\"?&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
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



<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>