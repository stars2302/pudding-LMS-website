<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  //관리자 검사
  // if(!isset($_SESSION['AUID'])){
  //   echo "<script>
  //   alert('권한이 없습니다');
  //   history.back();
  //   </script>";
  // }

    $cid = $_POST['cid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price_status = $_POST['price_status']??0;
    $level = $_POST['level'];
    $due = $_POST['due'];
    $due_status = $_POST['due_status']??0;
    $act = $_POST['act'];
    $content = rawurldecode($_POST['content']);
    $thumbnail = $_FILES['thumbnail'];

    $image_table_id = $_POST['image_table_id'];
    $image_table_id = rtrim($image_table_id, ',');//최우측 콤마 제거


    if($_FILES['thumbnail']['name']){

        if($_FILES['thumbnail']['size']> 10240000){
          echo "<script>
            alert('10MB 이하만 첨부할 수 있습니다.');    
            history.back();      
          </script>";
          exit;
        }

        if(strpos($_FILES['thumbnail']['type'], 'image') === false){
          echo "<script>
            alert('이미지만 첨부할 수 있습니다.');    
            history.back();            
          </script>";
          exit;
        }

        $save_dir = $_SERVER['DOCUMENT_ROOT']."/pudding-LMS-website/admin/images/course/";
        $filename = $_FILES['thumbnail']['name']; //insta.jpg
        $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
        $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
        $thumbnail = $newfilename.".".$ext; //20238171184015.jpg

        if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){  
          $thumbnail = "/pudding-LMS-website/admin/images/course/".$thumbnail;
        } else{
          echo "<script>
            alert('이미지등록 실패!');    
            history.back();            
          </script>";
        }
    }

    $sql = "UPDATE courses 
    SET name='{$name}', price='{$price}', price_status='{$price_status}', level='{$level}', due='{$due}',due_status='{$due_status}', act='{$act}', 
    content='{$content}', thumbnail='{$thumbnail}', image_table_id ='{$image_table_id}'  WHERE cid ='{$cid}'";

    $result = $mysqli -> query($sql);
 
    if($result){
      if($image_table_id){
        $updatesql = "UPDATE course_image_table set cid={$cid} where imgid in ({$image_table_id})";
        $result = $mysqli -> query($updatesql);

      echo "<script> alert('강의 수정 완료!');
      location.href = 'course_list.php';</script>";
      }

     
    }else{
      echo "<script> alert('강의 수정 실패.');
      location.href = 'course_update.php';</script>";
    }

?>