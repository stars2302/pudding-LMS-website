
<?php
$title = "Q&A";
$css_route = "qna/css/qna.css";
$js_route = "js/qna.js";

include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/header.php';

$pagenationTarget = 'qna';
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/qna/qna_page.php';

?>
      
      <section>
        <h2 class="main_tt">Q&amp;A 내용</h2>
        
        <div class="shadow_box border qna">          

            <div class="wrap user">
                <img src="image/Gest_Big.png" alt="사용자 이미지">
                <div class="you content_stt">사용자</div>
                <div class="day">2023-08-22</div>
            </div>

            <div class="qna_content">
                <p class="b_text02 ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione labore esse mollitia similique architecto nihil earum dolore. Quasi, voluptate neque. Ipsum, excepturi. Magnam tempore ullam a adipisci nam, eius officiis.</p>
                <img src="image/hq720.jpg" alt="dummy image">
            </div>

            <div class="wrap i_con">
                <!-- <img src="image/Vest.svg" alt="Vest"> -->
                <a href="" class="icon"><i class="ti ti-thumb-up"></i></a>
                <p class="">25</p>           
                <!-- <img src="image/Return.svg" alt="Return"> -->
                <div class="sircle"><a href="" class="icon"> <i class="ti ti-arrow-back-up"></i></a></div>
                <p class="">2</p>
            </div>

            <div class="commentList">
                <?php
                //print_r ($_SERVER['DOCUMENT_ROOT']); 
                include 'dbconn.php';

                function fetchComments($mysqli, $post_id, $parent_comment_id = 0, $depth = 0) {
                    $sql = "SELECT * FROM qna_comments WHERE post_id = ? AND parent_comment_id = ? ORDER BY id ASC";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('ii', $post_id, $parent_comment_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    while($row = $result->fetch_assoc()) {
                    echo "<div class='master shadow_box border' style='margin-left:" . (180 + ($depth * 20)) . "px'>";
                    echo "<div class='wrap' class='comment-item' data-id='" . $row['id'] . "'>";
                    echo "<img src='image/Master_Big.png' alt='관리자 이미지'>";
                    echo "<div class='you content_stt primary'>프바오</div>";
                    echo "<div class='day'>" . $row['created_at'] . "</div>";
                    echo "</div>";
                    echo "<p class='b_text02'>";
                    echo htmlspecialchars($row['comment']);
                    echo "</p>";                    
                    //echo "작성자: " . htmlspecialchars($row['user_id']) . "<br>";
                    //echo "내용: " . htmlspecialchars($row['comment']) . "<br>";
                    //echo "작성 시간: " . $row['created_at'] . "<br>";
                    //echo "수정 시간: " . $row['updated_at'] . "<br>";
                    
                    // 수정 버튼과 저장 버튼 추가
                    echo "<button class='editButton' data-id='" . $row['id'] . "'>수정</button>";
                    echo "<textarea class='editComment' data-id='" . $row['id'] . "' style='display:none'>" . htmlspecialchars($row['comment']) . "</textarea>";
                    echo "<button class='saveButton' data-id='" . $row['id'] . "' style='display:none'>저장</button>";
                        
                    // 삭제 버튼
                    echo "<form action='delete_comment.php' method='post'>";
                    echo "<input type='hidden' name='comment_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>삭제</button>";
                    echo "</form>";
                    
                        // 댓글 달기 버튼
                        echo "<button class='replyButton' data-id='" . $row['id'] . "' data-depth='" . ($depth + 1) . "'>댓글 달기</button>";
                        echo "</div>";

                
                    if ($depth < 2) {
                        fetchComments($mysqli, $post_id, $row['id'], $depth + 1);
                    }
                    }
                }
                
                $post_id = 1;
                fetchComments($mysqli, $post_id);
                ?>

            </div><!-- .commentList -->
        </div>


        <!-- commentWrite -->
        <form method="post" class="commentForm wrap">
          <input type="hidden" name="post_id" value="1">
          <input type="hidden" name="parent_comment_id" value="0">
          <input type="hidden" name="depth" value="0">
          <textarea name="comment" class="border form-control textgo" placeholder="Content Text"></textarea>
        <button type="submit" class="btn btn-dark b_text01 text_btn">댓글 작성</button>
        </form>
        <!-- /commentWrite -->
     
        <div class="list position-relative">
          <button class="list_button btn btn-dark b_text01 position-absolute ">목록 보기</button>
        </div>
      </section>
    </div><!-- content_wrap -->
  </div><!-- wrap -->

  <!-- jquery -->
  
  
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/footer.php';
  ?>

  
<script>


$(document).on('submit', '.commentForm', function(e) {
  e.preventDefault();
  
  const $form = $(this);
  const post_id = $form.find('input[name="post_id"]').val();
  const parent_comment_id = $form.find('input[name="parent_comment_id"]').val();
  const depth = $form.find('input[name="depth"]').val();
  const comment = $form.find('textarea[name="comment"]').val();
  
  $.ajax({
        url: 'add_comment_ajax.php',
        type: 'POST',
        data: {
            post_id: post_id,
            parent_comment_id: parent_comment_id,
            depth: depth,
            comment: comment,
            user_id: 'username' // 현재 로그인한 사용자 이름
        },
        success: function(data) {
            const parsedData = JSON.parse(data);
            if (parsedData.status === 'success') {
                const new_id = parsedData.new_id;
                const new_depth = parsedData.depth;
                const marginLeftValue = 180 + (new_depth * 20);
                const newCommentHtml = `
                <div class='master shadow_box border' style='margin-left:${marginLeftValue}px'>
                <div class='wrap' data-id='${new_id}'>
                    <img src='image/Master_Big.png' alt='관리자 이미지'>
                    <div class='you content_stt primary'>프바오</div>
                    <div class='day'>${new Date().toISOString()}</div>
                </div>
                <p class='b_text02'>${comment}</p>
                <button class='editButton' data-id='${new_id}'>수정</button>
                <textarea class='editComment' data-id='${new_id}' style='display:none'>${comment}</textarea>
                <button class='saveButton' data-id='${new_id}' style='display:none'>저장</button>
                <button class='deleteButton' data-id='${new_id}'>삭제</button>
                <button class='replyButton' data-id='${new_id}' data-depth='${new_depth}'>댓글 달기</button></div>`;
                $('.commentList').append(newCommentHtml);
            } else {
                alert('댓글 작성 실패');
            }
        }

    });
});


// 수정 버튼 이벤트
$(document).on('click', '.editButton', function() {
  var id = $(this).data('id');
  console.log("Edit button clicked, ID:", id);
  $('.editComment[data-id="' + id + '"]').show();
  $('.saveButton[data-id="' + id + '"]').show();
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
        location.reload(); // 또는 다른 업데이트 로직
      } else {
        alert('수정 실패');
      }
    }
  });
});

// 댓글 달기 버튼 클릭 시
$(document).on('click', '.replyButton', function() {
  const commentId = $(this).data('id');
  const depth = $(this).data('depth');
  
  const replyForm = `
    <form action="add_comment.php" method="post" class="commentForm">
      <input type="hidden" name="post_id" value="1">
      <input type="hidden" name="parent_comment_id" value="${commentId}">
      <input type="hidden" name="depth" value="${depth}">
      <textarea name="comment"></textarea>
      <button type="submit">댓글 작성</button>
    </form>
  `;
  
  $(this).after(replyForm);
});

// 답글 작성 버튼 클릭 시 (form 내부)
$(document).on('submit', '.replyForm', function(e) {
  e.preventDefault();
  
  const $form = $(this);
  const commentId = $form.find('input[name="parent_comment_id"]').val();
  const depth = $form.find('input[name="depth"]').val();
  const commentText = $form.find('textarea[name="comment"]').val();

  // AJAX로 서버에 답글 데이터 전송
  $.ajax({
    url: 'add_comment_ajax.php',
    type: 'POST',
    data: {
      post_id: 1, // 현재 게시글 ID
      parent_comment_id: commentId,
      depth: depth,
      comment: commentText
    },
    success: function(data) {
      if (data === 'success') {
        location.reload(); // 페이지를 새로고침하여 답글을 보이게 함
      } else {
        alert('답글 작성 실패');
      }
    }
  });
});
</script>
</body>
</html>