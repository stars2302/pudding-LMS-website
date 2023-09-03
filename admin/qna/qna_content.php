<?php
$qid = $_GET['qid'];
include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/qna/qna_get.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PUDDING</title>
  <!-- reset css -->
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
  integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- normalize css -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
  integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- materialize css -->
<!-- <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
/> -->
<!--bootstrap css -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
  integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- tabler-icons  -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
/>

<!-- fontawesome css -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- jquery ui css -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
  integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<!-- 스포카 -->
<link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSansNeo.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.css">
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.structure.css">
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.css">
<link rel="stylesheet" href="../css/jqueryui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="../css/common.css" />
<link rel="stylesheet" href="css/qna.css" />
</head>
<body>
<style>
.ml-auto {
	margin-left: auto !important;
}
.ml-cutstom {
	margin-left: 90px !important;
}
.mr-2, .mx-2 {
    margin-right: 0.5rem!important;
}
.mr-3, .mx-3 {
    margin-right: 1rem!important;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>

  <div class="wrap">
    <header>
      <div class="inner_header content_tt d-flex justify-content-between align-items-center flex-column">
        <h1 class="adminlogo"><a href="#">로고</a></h1>
        <nav>
          <ul class="d-flex justify-content-between flex-column">
            <li><a href="" class="icon"><i class="ti ti-home"></i><span>대시보드</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-chalkboard"></i><span>강의 관리</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-coins"></i><span>매출 관리</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-ticket"></i><span>쿠폰 관리</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-brand-hipchat"></i><span>강의평 관리</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-clipboard-text"></i><span>공지사항</span></a></li>
            <li><a href="" class="icon"><i class="ti ti-zoom-question"></i><span>Q&A</span></a></li>
          </ul>
        </nav>
        <div class="profile d-flex justify-content-between align-items-center border">
          <img src="../images/profile_img.png" alt="">
          <h2 class="content_stt">프바오</h2>
          <p>admins</p>
        </div>
        <a href="" class="btn btn-primary  primary_btn logout b_text01">로그아웃</a>
      </div>
    </header>
  
    <div class="content_wrap">
      <div class="top_bar d-flex justify-content-end align-items-center">
        <div class="red_bell_wrap">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-bell-filled"
            width="68"
            height="68"
            viewBox="0 0 28 28"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path
              d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z"
              stroke-width="0"
              fill="currentColor"
            ></path>
            <path
              d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z"
              stroke-width="0"
              fill="currentColor"
            ></path>
          </svg>
          <div class="red_bell">1</div>
        </div>
        <div class="profile">
          <img src="images/profile_img.png" alt="">
        </div>
      </div><!-- top_bar -->
      
      <section style="margin-bottom:100px;">
        <h2 class="main_tt">Q&amp;A 내용</h2>
        
        <div class="shadow_box border">
			<div class="qna">
				<!-- 제목 -->          
				<h2><?php echo $row['q_title']; ?></h2>

				<!-- 작성자 정보 -->
				<div class="wrap user">
					<img src="image/Gest_Big.png" alt="사용자 이미지">
					<div class="you content_stt">사용자</div>
					<div class="day"><?php echo $row['q_regdate']; ?></div>
				</div>

				<!-- 작성 내용 -->
				<div class="qna_content">
					<p class="b_text02 "><?php echo $row['q_content']; ?></p>
					<img src="image/hq720.jpg" alt="dummy image">
				</div>


				<!-- 추천 / 조회수 -->
				<div class="wrap i_con">
					<!-- <img src="image/Vest.svg" alt="Vest"> -->
					<a href="" class="icon"><i class="ti ti-thumb-up"></i></a>
					<p class="">25</p>           
					<!-- <img src="image/Return.svg" alt="Return"> -->
					<div class="sircle"><a href="" class="icon"> <i class="ti ti-arrow-back-up"></i></a></div>
					<p class=""><?php echo $comment_count ?></p>
				</div>

				<div class="commentList">
					<?php

					// 댓글을 가져와서 출력하는 재귀 함수
					function fetchComments($mysqli, $post_id, $parent_comment_id = 0, $depth = 0) {
						// SQL 쿼리를 작성하여 댓글을 가져옴
						$sql = "SELECT * FROM qna_comments WHERE post_id = ? AND parent_comment_id = ? ORDER BY id ASC";
						$stmt = $mysqli->prepare($sql);
						$stmt->bind_param('ii', $post_id, $parent_comment_id);
						$stmt->execute();
						$result = $stmt->get_result();
						
						// 댓글을 순회하면서 HTML을 생성
						while($row = $result->fetch_assoc()) {
							// 댓글의 뎁스에 따라 margin-left를 설정
							echo "<div class='master shadow_box border' style='margin-left:" . (180 + ($depth * 20)) . "px'>";
							echo "<div class='wrap' class='comment-item' data-id='" . $row['id'] . "'>";
							echo "<img src='image/Master_Big.png' alt='관리자 이미지'>";
							echo "<div class='you content_stt primary'>프바오</div>";
							echo "<div class='day'>" . $row['created_at'] . "</div>";
							// 댓글 수정 버튼과 저장 버튼
							// htmlspecialchars ::  PHP에서 제공하는 함수. 주로 사용자가 입력한 데이터를 HTML 문서에 바로 출력할 때 사용
							// 사용자 입력이 애플리케이션을 해칠 수 있는 코드를 포함하고 있더라도, 그런 코드가 실행되지 않도록 방지
							echo "<div class='btn-group-wrap d-flex ml-auto'>";
							echo "<button title='수정' class='editButton' data-id='" . $row['id'] . "'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'></path><path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path><path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path><path d='M16 5l3 3'></path></svg></button>";							
							echo "<button class='saveButton' data-id='" . $row['id'] . "' style='display:none'>저장</button>";							
							// 댓글 삭제 버튼
							echo "<div data-comment-id='" . $row['id'] . "'>";
							echo "<button title='삭제' type='button' class='deleteButton'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'></path><path d='M4 7l16 0'></path>
							<path d='M10 11l0 6'></path><path d='M14 11l0 6'></path><path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
							<path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></button>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
							
							// 댓글 내용 출력
							echo "<div class='' style='padding-left:90px;'>";
							echo "<p class='b_text02 commentContent' style='margin-left:0 !important; padding-right: 0 !important;' data-id='" . $row['id'] . "'>";
							echo htmlspecialchars($row['comment']);
							echo "</p>";
							echo "<textarea class='editComment form-control mt-2' data-id='" . $row['id'] . "' style='display:none'>" . htmlspecialchars($row['comment']) . "</textarea>";
							echo "</div>";
														
							// 댓글 달기 버튼
							echo "<button class='replyButton text-secondary mt-2' data-id='" . $row['id'] . "' data-depth='" . ($depth + 1) . "'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-message' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='#6c757d' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'></path><path d='M8 9h8'></path><path d='M8 13h6'></path><path d='M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z'></path></svg><span class='pl-1'>댓글 달기</span></button>";
							echo "</div>";
							
							// 댓글의 뎁스가 2보다 작은 경우, 대댓글을 재귀적으로 가져옴
							if ($depth < 2) {
								fetchComments($mysqli, $post_id, $row['id'], $depth + 1);
							}
						}
					}

					// post_id == $_GET['qid']
					$post_id = $qid;
					fetchComments($mysqli, $post_id);
					?>
				</div><!-- .commentList -->
			</div>

			<div style="border-top:1px solid #eee;padding:20px 60px 0">
				<!-- commentWrite -->
				<form method="post" class="commentForm d-flex flex-row justify-content-start align-items-center add-comment-section mt-4 mb-4">
				<input type="hidden" name="post_id" value="<?php echo $qid ?>">
				<input type="hidden" name="parent_comment_id" value="0">
				<input type="hidden" name="depth" value="0">
				<img class="img-fluid img-responsive rounded-circle mr-2" src='image/Master_Big.png' alt='관리자 이미지'>
				<textarea name="comment" class="form-control mr-3" placeholder="Add comment" rows="10" style="height:45px; line-height:30px;"></textarea>
				<button type="submit" class="btn btn-dark" style="width:160px">댓글 등록</button>
				</form>

				<!-- /commentWrite -->
			</div>

			<div class="d-flex justify-content-center" style="padding:50px 0;">
				<!-- 답변 상태 토글 버튼 -->
				<form action="qna_content.php" method="GET">
					<input type="hidden" name="qid" value="<?php echo $qid; ?>">
					<input type="hidden" name="toggle" value="<?php echo $row['q_state'] == 0 ? '1' : '0'; ?>">
					
						<?php echo $row['q_state'] == 0 ? '<button type="submit" class="btn btn-primary" style="width:160px">답변 완료</button>' : '<button type="submit" class="btn btn-warning" style="width:160px">답변 대기</button>'; ?>
					
				</form>
			</div>

        </div>
		<div class="float-end my-4">
			<button type="button" class="btn btn-dark" onclick="window.location.href='qna.php'">목록 보기</button>
		</div>
      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->

  <!-- jquery -->
  <script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
  integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<!-- jqueryui js -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
  integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<!-- bootstrap js -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
  integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
  integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<!-- fontawesome js  -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
  integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<!-- modernizr js -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
  referrerpolicy="no-referrer"
></script>
<!-- materialize css -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
<!-- tabler-icons js -->
<script src="node_modules/@tabler/icons/dist/umd/tabler-icons.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/common.js"></script>
<script>

// 댓글과 답글 작성 처리
$(document).on('submit', '.commentForm', function(e) {
  e.preventDefault();
  
  const $form = $(this);
  const post_id = $form.find('input[name="post_id"]').val();
  const parent_comment_id = $form.find('input[name="parent_comment_id"]').val();
  const depth = $form.find('input[name="depth"]').val();  
  const comment = $form.find('textarea[name="comment"]').val();
  const $replyButton = $('[data-id="'+parent_comment_id+'"]').find('.replyButton');
  
  // 기존의 댓글 작성 로직과 동일하게 동작
  $.ajax({
    url: 'add_comment_ajax.php',
    type: 'POST',
    data: {
      post_id: post_id,
      parent_comment_id: parent_comment_id,
      depth: depth,
      comment: comment
    },
    success: function(data) {
      const parsedData = JSON.parse(data);
      if (parsedData.status === 'success') {
		const new_id = parsedData.new_id;
                const new_depth = parsedData.depth;
                const marginLeftValue = 180 + (new_depth * 20);
				const created_at = parsedData.created_at;
                const newCommentHtml = `
                <div class='master shadow_box border' style='margin-left:${marginLeftValue}px'>
					<div class='wrap' data-id='${new_id}'>
						<img src='image/Master_Big.png' alt='관리자 이미지'>
						<div class='you content_stt primary'>프바오</div>
						<div class='day'>${created_at}</div>						
						<div class='btn-group-wrap d-flex ml-auto'>
							<button class='editButton' data-id='${new_id}' title='수정'>
								<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
									<path stroke='none' d='M0 0h24v24H0z' fill='none'>
									</path><path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
									<path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
									<path d='M16 5l3 3'></path>
								</svg>
							</button>
							<button class='saveButton' data-id='${new_id}' style='display:none'>저장</button>						
							<div data-comment-id='${new_id}'>
								<button title='삭제' type='button' class='deleteButton'>
									<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
										<path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
										<path d='M4 7l16 0'></path>
										<path d='M10 11l0 6'></path>
										<path d='M14 11l0 6'></path>
										<path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
										<path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path>
									</svg>
								</button>
							</div>
						</div>
					</div>
					<div class='' style='padding-left:90px;'>
					<p class='b_text02' style='margin-left:0 !important; padding-right: 0 !important;'>${comment}</p>
						<textarea class='editComment form-control mt-2' data-id='${new_id}' style='display:none'>${comment}</textarea>
					</div>											
					<button class='replyButton text-secondary mt-2' data-id='${new_id}' data-depth='${new_depth}'>
						<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-message' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.25' stroke='#6c757d' fill='none' stroke-linecap='round' stroke-linejoin='round'>
							<path stroke='none' d='M0 0h24v24H0z' fill='none'></path><path d='M8 9h8'></path><path d='M8 13h6'></path>
							<path d='M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z'></path>
						</svg>
						<span class='pl-1'>댓글 달기</span></button>
					</div>`

                $('.commentList').append(newCommentHtml);
				// form 내용 초기화
				$form.find('textarea[name="comment"]').val('');
				// 만약 이 폼이 replyForm 클래스를 가지고 있다면 제거
				if ($form.hasClass('replyForm')) {
					$form.remove();
					// 만약 이 폼이 대댓글이었다면 원래 댓글의 replyButton을 다시 표시					
					$replyButton.show();
					$(`.replyButton[data-id="${parent_comment_id}"]`).show();
				}
      } else {
        alert('댓글 또는 답글 작성 실패');
      }
    }
  });
});

// 답글 작성을 위한 폼을 추가하는 부분
$(document).on('click', '.replyButton', function() {
  const commentId = $(this).data('id');
  const depth = $(this).data('depth') + 1; // depth값 1 증가.
  
  const replyForm = `
  <form action="#" method="post" class="commentForm replyForm">
      <input type="hidden" name="post_id" value="<?php echo $qid ?>">
      <input type="hidden" name="parent_comment_id" value="${commentId}">
      <input type="hidden" name="depth" value="${depth}">
      <textarea name="comment" class="form-control"></textarea>
      <button type="submit">댓글 작성</button>
      <button type="button" class="cancelReply">작성 취소</button>
    </form>
  `;
  
  $(this).after(replyForm);
  $(this).hide(); // "댓글 달기" 버튼을 숨깁니다.
});


// "작성 취소" 버튼 클릭 시 이벤트
$(document).on('click', '.cancelReply', function() {
  const $form = $(this).closest('form');
  const parent_comment_id = $form.find('input[name="parent_comment_id"]').val();
  const $replyButton = $(`.replyButton[data-id="${parent_comment_id}"]`); // 댓글 달기 버튼을 찾아서 저장
  $replyButton.show(); // 댓글 달기 버튼 다시 보이게 만들기
  $form.remove();
});

// 수정 버튼 이벤트
$(document).on('click', '.editButton', function() {
  var id = $(this).data('id');
  var commentContent = $('.commentContent[data-id="' + id + '"]').text();
  $('.editComment[data-id="' + id + '"]').val(commentContent).show();
  $('.saveButton[data-id="' + id + '"]').show(); // 저장 버튼 출력
  $('.editButton[data-id="' + id + '"]').hide(); // 수정 버튼 숨김
  $('.commentContent[data-id="' + id + '"]').hide(); // 기존 댓글 내용 숨김
});

// 저장 버튼 이벤트
$(document).on('click', '.saveButton', function() {
  var id = $(this).data('id');
  var updatedComment = $('.editComment[data-id="' + id + '"]').val();
  
  $.ajax({
    url: 'edit_comment_ajax.php',
    type: 'POST',
    data: {
      comment_id: id,
      comment: updatedComment
    },
    success: function(data) {
      if(data === 'success') {
        $('.commentContent[data-id="' + id + '"]').text(updatedComment).show(); // 업데이트된 내용으로 대체
        $('.editComment[data-id="' + id + '"]').hide();
        $('.saveButton[data-id="' + id + '"]').hide(); // 저장 버튼 숨김
        $('.editButton[data-id="' + id + '"]').show(); // 수정 버튼 출력
      } else {
        alert('수정 실패');
      }
    }
  });
});

// 삭제 버튼 이벤트
$(document).on('click', '.deleteButton', function(e) {
  e.preventDefault();
  
  var commentId = $(this).parent().data('comment-id'); // data-comment-id값
  var self = this; // this값 임시 변수에 저장
  
  $.ajax({
    url: 'delete_comment.php',
    type: 'POST',
    data: {
      comment_id: commentId
    },
    success: function(data) {
      var parsedData = JSON.parse(data);
      if (parsedData.status === 'success') {
        // 삭제 성공, 해당 댓글을 DOM에서 제거
        $(self).closest('.master.shadow_box.border').remove();
      } else {
        alert(parsedData.message || '삭제 실패');
      }
    }
  });
});

</script>
</body>
</html>