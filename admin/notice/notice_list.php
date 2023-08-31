<?php
$title = "공지사항";
$css_route = "notice/css/notice.css";
$js_route = "notice/js/notice.js";
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';
?>

<section>
  <h2 class="main_tt">공지사항</h2>
  <div class="notice_top shadow_box border d-flex justify-content-between">
    <form class="notice_top_left d-flex align-items-center" action="" method="get">
      <input type="text" class="input form-control" placeholder="공지사항을 검색하세요" aria-label="Username">
      <button class="btn btn-dark">검색</button>
    </form>
    <div class="d-flex align-items-center">
      <a class="btn btn-dark" href="notice_create.html">게시물 등록</a>
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
      <tr>
        <td class="no_mp">3215</td>
        <td class="no_mp">
          <a href="notice_view.html">푸딩 LMS 웹사이트 오픈</a>
        </td>
        <td class="no_mp">
          2023-08-22
        </td>
        <td class="no_mp">
          5
        </td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3214</td>
        <td class="no_mp">
          <a href="notice_view.html">※ LMS 로그인 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">11</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3213</td>
        <td class="no_mp">
          <a href="notice_view.html">LMS 본인인증 관련 오류 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">20</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3212</td>
        <td class="no_mp">
          <a href="notice_view.html">지난 강좌 조회 방법 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">17</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3211</td>
        <td class="no_mp">
          <a href="notice_view.html">학습관리시스템(LMS) 출석부 관련 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">6</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3210</td>
        <td class="no_mp">
          <a href="notice_view.html">학습관리시스템(LMS) 학습자 매뉴얼 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">23</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3209</td>
        <td class="no_mp">
          <a href="notice_view.html">학습관리시스템(LMS) 강사 매뉴얼 안내</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">6</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3208</td>
        <td class="no_mp">
          <a href="notice_view.html">교수학습지원센터 대학생활 유형검사 참여 이벤트</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">6</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3207</td>
        <td class="no_mp">
          <a href="notice_view.html">교수학습지원센터 대학생활 유형검사 참여 이벤트</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">6</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
      <tr>
        <td class="no_mp ">3206</td>
        <td class="no_mp">
          <a href="notice_view.html">교수학습지원센터 대학생활 유형검사 참여 이벤트</a>
        </td>
        <td class="no_mp">2023-08-22</td>
        <td class="no_mp">6</td>
        <td>
          <div class="icon_group">
            <a href="notice_update.html"><i class="ti ti-edit pen_icon"></i></a>
            <i class="ti ti-trash bin_icon"></i>
          </div>
        </td>
      </tr>
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

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
?>