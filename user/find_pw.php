<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$useremail = $_POST['useremail'];
// var_dump($username);
// var_dump($useremail);

$sql = "SELECT * FROM users WHERE username='{$username}' AND useremail ='{$useremail}' AND userid ='{$userid}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

if (!isset($rs)) {
  echo '<script>alert("가입 이력이 없습니다.");</script>';
} else {
  // echo "
  //       <script>
  //       alert('고객님의 비밀번호는 " . $rs->userpasswd . "입니다.');
  //       location.href='login.php';
  //       </script>
  //   ";

  echo "
  <script>
  alert('인증되었습니다. 지금 비밀번호를 변경하시겠습니까?');
  location.href='login.php';
  $('#find_pw').show();
  $('#find_pw .modal-dialog').html(`
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title'>비밀번호 변경</h5>
        </div>
        <div class='modal-body'>
          <form action='find_pw.php' method='POST' id='find_pw_form'>
            <label for='new_userpasswd'>새 비밀번호</label>
            <input type='text' class='form-control' name='new_userpasswd' id='new_userpasswd' placeholder='새 비밀번호를 입력하세요.'>
            <label for='confirm_userpasswd'>새 비밀번호 확인</label>
            <input type='text' class='form-control' name='confirm_userpasswd' id='confirm_userpasswd' placeholder='비밀번호 확인 '>
            </form>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>취소</button>
            <button type='button' class='btn btn-primary' id='modify_pw_btn'>확인</button>
          </div>
        </div>
    `);
    $('#find_pw').show();
  </script>
";
}




// if(in_array($email,$userEmail) == false){
//     errMsg("이메일을 확인해주세요.");
// } elseif (in_array($email,$userEmail) == true) {
//     $stmt = $db -> prepare("SELECT * FROM register WHERE name=:name AND email=:email");
//     $stmt -> bindParam("name",$name);
//     $stmt -> bindParam("email",$email);
//     $stmt -> execute();
//     $user = $stmt -> fetch();
//     echo "
//         <script>
//         alert('고객님의 아이디는 ".$user['userid']."입니다.');
//         location.href='../main.php';
//         </script>
//     ";
// }  
// break;

?>