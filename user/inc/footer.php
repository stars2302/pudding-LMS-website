<aside class="main_btn">
  <div class="recent_list">
    <p>최근 본 상품</p>
    <ul>

      <?php
      if (isset($_COOKIE['recent_view_course'])) {
        $cvc = json_decode($_COOKIE['recent_view_course']);
        krsort($cvc); //최근 상품 위로 올라오도록 key값을 기준으로 역순으로 정렬.
        // var_dump($cvc);
        foreach ($cvc as $cc) {
          ?>
          <li>
            <a href="/pudding-LMS-website/user/course/course_view.php?cid=<?= $cc->cid; ?>">
              <img class="recent_thumb" src="<?= $cc->thumbnail; ?>" alt="<?= $cc->name; ?>">
            </a>
          </li>
          <?php
        }
      }
      ?>

    </ul>
  </div>
  <div class="history_btn">
    <a href="">
      <img src="/pudding-LMS-website/user/images/clock-history.png" alt="최근 본 강의">
    </a>
  </div>
  <div class="top_btn">
    <a href="">
      <img src="/pudding-LMS-website/user/images/top_btn.png" alt="top">
    </a>
  </div>
</aside>
<footer>
  <?php if (isset($prc)) {
    var_dump($prc);
  } ?>
  <div class="container">
    <ul class="d-flex f_list justify-content-center">
      <li><a href="#">푸딩 소개</a></li>
      <li><a href="#">기업 교육 소개</a></li>
      <li><a href="#">이용약관</a></li>
      <li><a href="#">개인정보 처리방침</a></li>
      <li><a href="#">자주 묻는 질문</a></li>
      <li><a href="#">문의하기</a></li>
    </ul>
    <div class="d-flex justify-content-between align-items-end">
      <div class="f_tt">
        <h2>
          <a href=""><img src="/pudding-LMS-website/user/images/logo_footer.png" alt="푸딩로고이미지" /></a>
        </h2>
        <p><span>(주) PUDDING</span><span>대표</span>프바오</p>
        <div class="tel_mail">
          <p><span>대표번호</span>02-7777-7777</p>
          <p><span>사업자 번호</span>313-86-00797</p>
          <p><span>이메일</span>pubao@pudding.com</p>
        </div>
        <p><span>주소</span>서울특별시 푸딩구 푸딩로 100 푸딩타워 (주) PUDDING</p>
        <p>Copyright ⓒ 2023 PUDDING Company. All Rights Reserved.</p>
      </div>
      <div class="sns">
        <ul>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_1928_5745)">
                  <path
                    d="M14.9987 2.5C15.5459 2.5 16.0877 2.60777 16.5932 2.81717C17.0987 3.02656 17.5581 3.33348 17.945 3.72039C18.3319 4.1073 18.6388 4.56663 18.8482 5.07215C19.0576 5.57768 19.1654 6.11949 19.1654 6.66667V13.3333C19.1654 13.8805 19.0576 14.4223 18.8482 14.9278C18.6388 15.4334 18.3319 15.8927 17.945 16.2796C17.5581 16.6665 17.0987 16.9734 16.5932 17.1828C16.0877 17.3922 15.5459 17.5 14.9987 17.5H4.9987C4.45152 17.5 3.90971 17.3922 3.40418 17.1828C2.89866 16.9734 2.43933 16.6665 2.05242 16.2796C1.27102 15.4982 0.832031 14.4384 0.832031 13.3333V6.66667C0.832031 5.5616 1.27102 4.50179 2.05242 3.72039C2.83382 2.93899 3.89363 2.5 4.9987 2.5H14.9987ZM7.4987 7.5V12.5C7.49881 12.6474 7.53801 12.7921 7.61229 12.9194C7.68657 13.0466 7.79327 13.152 7.92153 13.2246C8.04978 13.2971 8.19499 13.3344 8.34235 13.3326C8.48971 13.3308 8.63395 13.2899 8.76036 13.2142L12.927 10.7142C13.0502 10.6401 13.1522 10.5354 13.223 10.4102C13.2937 10.2851 13.3309 10.1438 13.3309 10C13.3309 9.85623 13.2937 9.71491 13.223 9.58976C13.1522 9.46462 13.0502 9.35992 12.927 9.28583L8.76036 6.78583C8.63395 6.71008 8.48971 6.66921 8.34235 6.66739C8.19499 6.66556 8.04978 6.70285 7.92153 6.77545C7.79327 6.84804 7.68657 6.95335 7.61229 7.08064C7.53801 7.20792 7.49881 7.35263 7.4987 7.5Z"
                    fill="#333F55" />
                </g>
                <defs>
                  <clipPath id="clip0_1928_5745">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_1928_5750)">
                  <path
                    d="M15 1.66602C15.2041 1.66604 15.4011 1.74098 15.5536 1.87661C15.7062 2.01224 15.8036 2.19914 15.8275 2.40185L15.8333 2.49935V5.83268C15.8333 6.03679 15.7584 6.2338 15.6227 6.38633C15.4871 6.53885 15.3002 6.6363 15.0975 6.66018L15 6.66602H12.5V7.49935H15C15.1186 7.49939 15.2359 7.52477 15.3439 7.57377C15.4519 7.62277 15.5483 7.69427 15.6265 7.7835C15.7046 7.87272 15.7629 7.97761 15.7972 8.09114C15.8316 8.20468 15.8414 8.32424 15.8258 8.44185L15.8092 8.53518L14.9758 11.8685C14.9345 12.0331 14.8438 12.1811 14.7161 12.2928C14.5883 12.4045 14.4295 12.4745 14.2608 12.4935L14.1667 12.4993H12.5V17.4993C12.5 17.7035 12.425 17.9005 12.2894 18.053C12.1538 18.2055 11.9669 18.303 11.7642 18.3268L11.6667 18.3327H8.33333C8.12922 18.3327 7.93222 18.2577 7.77969 18.1221C7.62716 17.9865 7.52971 17.7996 7.50583 17.5968L7.5 17.4993V12.4993H5.83333C5.62922 12.4993 5.43222 12.4244 5.27969 12.2888C5.12716 12.1531 5.02971 11.9662 5.00583 11.7635L5 11.666V8.33268C5.00003 8.12857 5.07496 7.93157 5.2106 7.77904C5.34623 7.62651 5.53312 7.52906 5.73583 7.50518L5.83333 7.49935H7.5V6.66602C7.49995 5.37237 8.00131 4.12905 8.89872 3.19729C9.79614 2.26553 11.0198 1.71786 12.3125 1.66935L12.5 1.66602H15Z"
                    fill="#333F55" />
                </g>
                <defs>
                  <clipPath id="clip0_1928_5750">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_1928_5755)">
                  <path
                    d="M3.33203 6.66732C3.33203 5.78326 3.68322 4.93542 4.30834 4.31029C4.93346 3.68517 5.78131 3.33398 6.66536 3.33398H13.332C14.2161 3.33398 15.0639 3.68517 15.6891 4.31029C16.3142 4.93542 16.6654 5.78326 16.6654 6.66732V13.334C16.6654 14.218 16.3142 15.0659 15.6891 15.691C15.0639 16.3161 14.2161 16.6673 13.332 16.6673H6.66536C5.78131 16.6673 4.93346 16.3161 4.30834 15.691C3.68322 15.0659 3.33203 14.218 3.33203 13.334V6.66732Z"
                    stroke="#333F55" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path
                    d="M7.5 10C7.5 10.663 7.76339 11.2989 8.23223 11.7678C8.70107 12.2366 9.33696 12.5 10 12.5C10.663 12.5 11.2989 12.2366 11.7678 11.7678C12.2366 11.2989 12.5 10.663 12.5 10C12.5 9.33696 12.2366 8.70107 11.7678 8.23223C11.2989 7.76339 10.663 7.5 10 7.5C9.33696 7.5 8.70107 7.76339 8.23223 8.23223C7.76339 8.70107 7.5 9.33696 7.5 10Z"
                    stroke="#333F55" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13.75 6.25V6.25833" stroke="#333F55" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </g>
                <defs>
                  <clipPath id="clip0_1928_5755">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_1928_5762)">
                  <path
                    d="M11.7154 2.84109C10.2096 3.48025 9.21956 4.88525 9.16873 6.49109L9.16706 6.64275L8.96456 6.62359C6.97123 6.39942 5.21623 5.36359 4.01123 3.68109C3.92963 3.56706 3.82058 3.47546 3.69418 3.41478C3.56777 3.3541 3.4281 3.32629 3.28809 3.33393C3.14809 3.34158 3.01227 3.38443 2.89323 3.45851C2.77418 3.53259 2.67575 3.63552 2.60706 3.75775L2.52623 3.91275L2.48539 3.99525C1.88623 5.23275 1.49373 6.73692 1.63789 8.33109L1.66289 8.55859C1.89873 10.4444 2.91289 12.0711 4.81206 13.2911L4.95623 13.3803L4.88873 13.4161C3.79289 13.9686 2.79039 14.2094 1.69956 14.1661C0.819559 14.1328 0.494559 15.3094 1.26789 15.7311C4.26623 17.3653 7.48539 17.8694 10.2612 17.0644C13.6446 16.0811 16.2212 13.5453 17.2071 10.0369L17.3129 9.62442C17.5112 8.79692 17.6229 7.95275 17.6471 7.10442L17.6496 6.82775L17.9771 6.17859L18.3437 5.46025L18.5221 5.09859L18.6204 4.89275C18.8412 4.42192 19.0004 4.03192 19.0987 3.70109L19.1104 3.65442L19.1171 3.63942C19.3004 3.14525 18.9787 2.50775 18.3329 2.50775L18.2312 2.51359C18.1654 2.52168 18.1008 2.53762 18.0387 2.56109L17.9671 2.59275C17.7292 2.70824 17.4843 2.80845 17.2337 2.89275L16.9371 2.98859L16.7112 3.05525L16.0679 3.23359C14.9546 2.30192 13.4479 2.18859 11.8912 2.77192L11.7154 2.84109Z"
                    fill="#333F55" />
                </g>
                <defs>
                  <clipPath id="clip0_1928_5762">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>


<!-- bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
  integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- modernizr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
  referrerpolicy="no-referrer"></script>
<!-- swiper js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.js"
  integrity="sha512-QwpsxtdZRih55GaU/Ce2Baqoy2tEv9GltjAG8yuTy2k9lHqK7VHHp3wWWe+yITYKZlsT3AaCj49ZxMYPp46iJQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- nice select js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
  integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- swiper js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- Numbers js -->
<script src="/pudding-LMS-website/admin/js/jquery.number.min.js"></script>
<script src="/pudding-LMS-website/admin/js/numbers_func.js"></script>
<script src="/pudding-LMS-website/user/js/common.js"></script>
<script src="/pudding-LMS-website/user/<?php if (isset($js_route)) {
  echo $js_route;
} ?>"></script>

</body>

</html>