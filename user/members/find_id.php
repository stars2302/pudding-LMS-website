<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/pudding-LMS-website/admin/inc/dbcon.php';

$username = $_POST['username'];
$useremail = $_POST['useremail'];
// var_dump($username);
// var_dump($useremail);

$sql = "SELECT * FROM users WHERE username='{$username}' AND useremail ='{$useremail}'";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

if (!isset($rs)) {
  echo '<script>alert("가입 이력이 없습니다.");</script>';
} else {
  echo "
        <script>
        alert('고객님의 아이디는 " . $rs->userid . "입니다.');
        location.href='login.php';
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