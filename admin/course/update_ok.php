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

  $mysqli->autocommit(FALSE);//커밋이 안되도록 지정, 일단 바로 저장하지 못하도록
  try{

    $cate1 =  $_POST['cate1']??'' ;
    $cate2 =  $_POST['cate2']??'' ;
    $cate3 =  $_POST['cate3']??'' ;

    $cid = $_POST['cid'];

    $cate = $cate1.'/'.$cate2.'/'.$cate3;
    $name = $_POST['name'];
    $price_status = $_POST['price_status'];
    $price = $_POST['price']??0;
    $level = $_POST['level']??0;
    $due_status = $_POST['due_status'];
    $due = $_POST['due']??'무제한';
    $act = $_POST['act'];
    $content = rawurldecode($_POST['content']);

    // $imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
    // $result = $mysqli -> query($imgsql);
    
    // while($is = $result -> fetch_object()){
    //   $addImgs[]=$is;
    //   var_dump($is->youtube_thumb);
    // }  
    // $sql1 = "INSERT INTO lecture (cid,youtube_thumb, youtube_name, youtube_url) VALUES ('{$cid}','{$upload_youtube_thumb[$i]}','{$youtube_name[$i]}', '{$youtube_url[$i]}')";
    // $result2 = $mysqli-> query($sql1);

  
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

    if(($_FILES['thumbnail']['name'])){

      $sql = "UPDATE courses
              SET name='{$name}', 
                  price='{$price}', 
                  price_status='{$price_status}', 
                  level='{$level}',
                  due='{$due}',
                  due_status='{$due_status}', 
                  act='{$act}', 
                  content='{$content}', 
                  thumbnail = '{$thumbnail}'
              WHERE cid ='{$cid}'";
      }else{
      $sql = "UPDATE courses
              SET name='{$name}', 
                  price='{$price}', 
                  price_status='{$price_status}', 
                  level='{$level}', 
                  due='{$due}',
                  due_status='{$due_status}', 
                  act='{$act}', 
                  content='{$content}'
              WHERE cid ='{$cid}'";
  };

    // var_dump($sql)

    $result = $mysqli->query($sql);
    $cid = $mysqli -> insert_id; //입력된 값의 pk가져오는 명령어

    // if($result){

      // if(isset($youtube_name)){

      //   $youtube_thumb = $_REQUEST['youtube_thumb']; //강의섬네일
      //   $youtube_url = $_REQUEST['youtube_url']; //강의url
      //   var_dump($youtube_thumb);
      //   // print_r($youtube_thumb);

      //   for($i = 0;$i<count($youtube_url) ; $i++){

      //     if(isset($_FILES['youtube_thumb'])){
      //       if($_FILES['youtube_thumb']['size'][$i]> 10240000){
      //         echo "<script>
      //           alert('10MB 이하만 첨부할 수 있습니다.');    
      //           history.back();      
      //         </script>";
      //         exit;
      //       }
        
      //       if(strpos($_FILES['youtube_thumb']['type'][$i], 'image') === false){
      //         echo "<script>
      //           alert('이미지만 첨부할 수 있습니다.');    
      //          // history.back();            
      //         </script>";
      //         exit;
      //       }
        
      //       $save_dir = $_SERVER['DOCUMENT_ROOT']."/pudding-LMS-website/admin/images/course/";
      //       $filename = $_FILES['youtube_thumb']['name'][$i]; //insta.jpg
      //       $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
      //       $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
      //       $youtube_thumb = $newfilename.".".$ext; //20238171184015.jpg
        
      //       if(move_uploaded_file($_FILES['youtube_thumb']['tmp_name'][$i], $save_dir.$youtube_thumb)){  
      //         $upload_youtube_thumb[] = "/pudding-LMS-website/admin/images/course/".$youtube_thumb;
      //       } else{
      //         echo "<script>
      //           alert('이미지등록 실패!');    
      //           history.back();            
      //         </script>";
      //       }
      //     }
      //   }
      // }
      // $youtube_url = $_POST['youtube_url'];
      // for($i = 0; $i<count($youtube_url); $i++){
      //   if(($_FILES['youtube_thumb']['name'])){
      //     $sql1 = "UPDATE lecture
      //             SET youtube_thumb = '{$youtube_thumb[$i]}',
      //                 youtube_name = '{$youtube_name[$i]}',
      //                 youtube_url = '{$youtube_url[$i]}'
      //             WHERE cid ='{$cid}'";
      //     }else{
      //     $sql1 = "UPDATE lecture
      //             SET youtube_name = '{$youtube_name[$i]}',
      //                 youtube_url = '{$youtube_url[$i]}'  
      //             WHERE cid ='{$cid}'";
      //   }
      // }
      // $result2 = $mysqli-> query($sql1);

      $mysqli->commit();//디비에 커밋한다.

      echo "<script>
      alert('강의 수정 완료!');
      location.href='course_list.php';</script>";
      }
    // } 
    catch(Exception $e){
      $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
      echo "<script>
      alert('강의 수정 실패');
      history.back();
      </script>";
      exit;
    }
?>