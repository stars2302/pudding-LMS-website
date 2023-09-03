<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/dbcon.php';

  //관리자 검사
  if(!isset($_SESSION['AUID'])){
    echo "<script>
    alert('권한이 없습니다');
    history.back();
    </script>";
  }

  $mysqli->autocommit(FALSE);
  try{

    $name = $_POST['name'];
    $price = $_POST['price'];
    $price_status = $_POST['price_status']??0;
    $level = $_POST['level']??0;
    $due = $_POST['due'];
    $due_status = $_POST['due_status']??0;
    $act = $_POST['act']??0;
    $content = rawurldecode($_POST['content']);

    $image_table_id = $_POST['image_table_id']??0;
    $image_table_id = $_POST['image_table_id'];
    $image_table_id = rtrim($image_table_id, ',');//최우측 콤마 제거


    // 참고 유미네 https://github.com/HyeonJinSon/FastCode
    //파일업로드
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

    $sql = "INSERT INTO courses (name, price, price_status, level, due,due_status, act, content, thumbnail, image_table_id, video_table_id) 
    VALUES ('{$name}','{$price}','{$price_status}','{$level}','{$due}','{$due_status}','{$act}','{$content}','{$thumbnail}','{$image_table_id}','{$video_table_id}')";

    // var_dump($sql)

    $result = $mysqli->query($sql);
    $cid = $mysqli -> insert_id; //입력된 값의 pk가져오는 명령어


    if($result){

      if($image_table_id){ //상품등록되면 업데이트
        $updatesql = "UPDATE course_image_table set cid={$cid} where imgid in ({$image_table_id})";
        $result = $mysqli -> query($updatesql);
      }

      $mysqli->commit();

      echo "<script>
      alert('강의 등록 완료!');
      location.href='course_create.php';</script>";
    }
  } catch(Exception $e) { 
    $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
    echo "<script>
    alert('강의 등록 실패');
    history.back();
    </script>";
    exit;
  }

  
?>