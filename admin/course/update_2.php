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
    $price_status = $_POST['price_status'];
    $price = $_POST['price']??0;
    $level = $_POST['level'];
    $due_status = $_POST['due_status'];
    $due = $_POST['due']??'무제한';
    $act = $_POST['act'];
    $content = rawurldecode($_POST['content']);
    $youtube_name = $_POST['youtube_name'];

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
    };

    // if($youtube_name){

    //   $youtube_thumb = $_FILES['youtube_thumb']; //강의섬네일
    //   $youtube_url = $_REQUEST['youtube_url']; //강의url
    //   // var_dump($youtube_url);
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
    //           history.back();            
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
    // };    

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
                    content='{$content}', 
                WHERE cid ='{$cid}'";
    };

    for($i = 0; $i<count($youtube_url) ; $i++){
      if(($_FILES['youtube_thumb']['name'])){

        $sql = "UPDATE lecture
                SET youtube_thumb = '{$youtube_thumb[$i]}',
                    youtube_name = '{$youtube_name[$i]}',
                    youtube_url = '{$youtube_url[$i]}'
                WHERE cid ='{$cid}'";
        }else{
        $sql = "UPDATE lecture
                SET youtube_name = '{$youtube_name[$i]}',
                    youtube_url = '{$youtube_url[$i]}'  
                WHERE cid ='{$cid}'";
        }
    };  
    
    $result = $mysqli -> query($sql);

    if($result){

      echo "<script> alert('강의 수정 완료!');
      location.href = 'course_list.php';</script>";
      }else{
      echo "<script> alert('강의 수정 실패.');
      location.href = 'course_update.php';</script>";
    };

?>