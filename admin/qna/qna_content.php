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
        <form method="post" class="commentForm">
        <input type="hidden" name="post_id" value="1">
        <input type="hidden" name="parent_comment_id" value="0">
        <input type="hidden" name="depth" value="0">
        <textarea name="comment"></textarea>
        <button type="submit">댓글 작성</button>
        </form>
        <!-- /commentWrite -->
     
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