<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
/* 필요 파일 및 라이브러리를 포함하고 초기설정*/
/* 파라미터 로드 */
$search_where = '';

if(isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  $search_where = " and (nt_title like '%{$keyword}%' or 
  nt_content like '%{$keyword}%')";
    //제목과 내용에 키워드가 포함된 상품 조회
}

$sql = "SELECT * from notice   where 1=1";
$sql.= $search_where;
$sql.= " order by ntid desc limit 0, 10";


$result = $mysqli -> query($sql);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
  
} 




?>
<section>
    <h2 class="main_tt">공지사항</h2>
    <div class="notice_top shadow_box border d-flex justify-content-between">
      <form class="notice_top_left d-flex align-items-center" action="" method="get">
        <input type="text" class="input form-control" id="searchInput" placeholder="공지사항을 검색하세요" aria-label="Search"
         name="keyword">
        <button class="btn btn-dark" id="searchInput">검색</button>              
      </form>
      <div class="d-flex align-items-center">
        <a class="btn btn-dark" href="notice_create.php">게시물 등록</a>              
      </div>
    </div>     
    <table class="notice_body table shadow_box border">
      <colgroup>
        <col class="col1">
        <col class="col2">
        <col class="col1">
        <col class="col3">
        <col class="col3">
      </colgroup>
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="">
              <span>번호</span>
            </th>
            <th scope="col" class="no_mp ">
              <span>제목</span>
            </th>
            <th scope="col" class="no_mp ">
              <span>일자</span>
            </th>
            <th scope="col" class="no_mp ">
              <span>조회수</span>
            </th>
            <th scope="col" class="no_mp ">
              <span>편집</span>
            </th>
          </tr>
        </thead>
        <tbody>          
          <?php
            if(isset($rsc)){
              foreach($rsc as $item){            
            ?>
          <tr>
            <td class="no_mp">
            <?= $item -> ntid;?>
            </td>
            <td class="no_mp">
              <a href="notice_view.php?ntid=<?=$item -> ntid;?>">
                <?= $item -> nt_title; ?>
              </a>
            </td>
            <td class="no_mp">
              <?= $item -> nt_regdate;?>
            </td>
            <td class="no_mp">
            <?= $item -> nt_read_cnt;;?>
            </td>
            <td>
              <div class="icon_group">
                <a href="notice_update.php?ntid=<?=$item -> ntid;?>"><i class="ti ti-edit pen_icon"></i></a>
                <a href="notice_delete_ok.php?ntid=<?=$item -> ntid;?>"><i class="ti ti-trash bin_icon"></i></a>
              </div>
            </td>
          </tr>                 
          <?php
          }
        } else {
          ?>
            <tr><td colspan="5">검색 결과가 없습니다</td></tr>
          <?php
        } ?>
        </tbody>
      </table>
  
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <!-- <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">«</span>
          </a>
        </li> -->
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">‹</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">›</span>
          </a>
        </li>
        <!-- <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">»</span>
          </a>
        </li> -->
      </ul>
    </nav>
  </section>  
</div>
<!-- content_wrap -->
</div>
