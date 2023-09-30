<?php
$title="오늘의쿠폰";
$css_route="banner/css/banner.css";
$js_route = "banner/js/banner_game.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/header.php';

if(!isset($_SESSION['UID'])){
  echo"<script>
  alert('로그인이 필요합니다.');
  location.href = '/pudding-LMS-website/user/members/login.php';
  </script>";
}
?>

<div class="container d-flex justify-content-center align-items-end game_board_container jua">
  <div class="game_board_content">
    <div class="game_title">
      <h2 class="text-center">Q. 컴퓨터가 따라 할 수 있도록 문제를 해결하는 절차나 방법을 자세히 설명하는 과정은?</h2>
      <p>현재 횟수 : <span class="game_col">1</span>/<span class="game_count"></span>회!</p>
    </div>
    <div class="game_board">
    </div>
  </div>

  <div class="game_rule col-3 d-flex flex-column align-items-center">
    <div class="game_rule_content white_bg radius_12 shadow_box">
      <h3 class="text-center">
        ★★★<br>
        단어를 맞춰보세요!
      </h3>
      <div class="description">
        <p>영단어를 추리하는 WORDLE 게임 😉</p>
        <p>문자와 위치가 모두 맞으면 파란색 💙</p>
        <p>문자만 맞았다면 노란색 💛 </p>
        <p>모두 틀렸다면 회색 🤣</p>
        <p>기회는 6번 제공!</p>
      </div>
      <div class="hint">
        <button class="badge rounded-pill badge_yellow b-pd">hint</button>
        <span>에스파 가사 - 못된 욕망에 일그러져 버리던 oooo들이 존재를 무기로 파괴로 집어삼켜 Ah</span>
      </div>
    </div>
    <img src="images/pudding_2.png" alt="">
  </div>
</div>

<script>
  //hint toggle
  $('.game_rule_content .hint button').click(function(){
    $(this).toggleClass('active');
  });

</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/user/inc/footer.php';
?>