<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "qna/js/qna.js";


$qid = $_GET['qid'];
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_get.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

?>

      <section>
        <h2 class="main_tt"><?= $title ?> 내용</h2>
        
        <div class="shadow_box border">
			<div class="shadow_box border qna">
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
					<!-- <img src="image/hq720.jpg" alt="dummy image"> -->
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
							echo "<button title='수정' class='editButton' data-id='" . $row['id'] . "'><i class='ti ti-edit pen_icon'></i></button>";							
							echo "<button class='saveButton' data-id='" . $row['id'] . "' style='display:none'>저장</button>";							
							// 댓글 삭제 버튼
							echo "<div data-comment-id='" . $row['id'] . "'>";
							echo "<button title='삭제' type='button' class='deleteButton'><i class='ti ti-trash bin_icon'></i></button>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
							
							// 댓글 내용 출력
							echo "<div class='' style='padding-left:90px;'>";
							echo "<p class='b_text02 commentContent' style='margin-left:0 !important; padding-right: 0 !important;' data-id='" . $row['id'] . "'>";
							echo htmlspecialchars($row['comment']);
							echo "</p>";
							echo "<textarea class='editComment form-control' data-id='" . $row['id'] . "' style='display:none'>" . htmlspecialchars($row['comment']) . "</textarea>";
							echo "</div>";
														
							// 댓글 달기 버튼
							echo "<button class='replyButton text-secondary mt-2' data-id='" . $row['id'] . "' data-depth='" . ($depth + 1) . "'><i class='ti ti-brand-hipchat'></i><span class='pl-1'>댓글 달기</span></button>";
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


			<div>
				<!-- commentWrite -->
				<form method="post" class="commentForm shadow_box border wrap justify-content-start align-items-center review">
				  <input type="hidden" name="post_id" value="<?php echo $qid ?>">
          <input type="hidden" name="parent_comment_id" value="0">
          <input type="hidden" name="depth" value="0">
          <img class="img-fluid img-responsive rounded-circle mr-2" src='image/Master_Big.png' alt='관리자 이미지'>
          
            <textarea name="comment" class="form-control border form-control" placeholder="Add comment" ></textarea>
          
          <button type="submit" class="btn btn-dark b_text01">댓글 등록</button>
				</form>

				<!-- /commentWrite -->


			</div>

    </div>
    
    <div class="wrap justify-content-end list_up">
      <!-- 답변 상태 토글 버튼 -->
      <form action="qna_view.php" method="GET">
        <input type="hidden" name="qid" value="<?php echo $qid; ?>">
        <input type="hidden" name="toggle" value="<?php echo $row['q_state'] == 0 ? '1' : '0'; ?>">
        
        <div class="order">
  
            <?php echo $row['q_state'] == 0 ? '<button type="submit" class="btn btn-primary">답변 완료</button>' : 
            '<button type="submit" class="btn btn-warning">답변 대기</button>'; ?>
          
            <button type="button" class="btn btn-dark" onclick="window.location.href='qna_list.php'">목록 보기</button>
  
        </div>
      </form>


  </div>
		

      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->

  
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
                <div class='master shadow_box border'>
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
							<button class='saveButton' data-id='${new_id}' >저장</button>						
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
						<textarea class='editComment form-control' data-id='${new_id}'>${comment}</textarea>
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

function setGap() {
  let elements = document.querySelectorAll('.commentForm');

  elements.forEach(function (element) {
    element.style.gap = '15px';
  });
}

function setHidden() {
  let hidden = document.querySelectorAll('.editComment');

  hidden.forEach(function (hidden) {
    hidden.style.display = 'none';
  });
}
// window.addEventListener('load', setGap);

// function setBtn() {
//   let btns = document.querySelectorAll('.list_up');

//   btns.forEach(function (btns) {
//     btns.style.paddingTop = '1px';
//   });
// }
// window.addEventListener('load', setBtn);

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
  let id = $(this).data('id');
  let commentContent = $('.commentContent[data-id="' + id + '"]').text();
  $('.editComment[data-id="' + id + '"]').val(commentContent).show();
  $('.saveButton[data-id="' + id + '"]').show(); // 저장 버튼 출력
  $('.editButton[data-id="' + id + '"]').hide(); // 수정 버튼 숨김
  $('.commentContent[data-id="' + id + '"]').hide(); // 기존 댓글 내용 숨김
});

// 저장 버튼 이벤트
$(document).on('click', '.saveButton', function() {
  let id = $(this).data('id');
  let updatedComment = $('.editComment[data-id="' + id + '"]').val();
  
  $.ajax({
		//test
    // url: 'include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/edit_comment_ajax.php';', 
    url: 'qna_reply_update_ok_ajax.php',
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
  
  let commentId = $(this).parent().data('comment-id'); // data-comment-id값
  let self = this; // this값 임시 변수에 저장
  
  $.ajax({
    url: 'qna_delete_ok.php',
    type: 'POST',
    data: {
      comment_id: commentId
    },
    success: function(data) {
      let parsedData = JSON.parse(data);
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