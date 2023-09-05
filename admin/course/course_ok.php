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
  

    $query11 = "SELECT name FROM category WHERE cateid='".$cate1." '";
    $result11 = $mysqli->query($query11); //쿼리실행결과를 $result 할당
    $rs11 = $result11->fetch_object();
    $cate1 =  $rs11-> name;

    $query22 = "SELECT name FROM category WHERE cateid='".$cate2." '";
    $result22 = $mysqli->query($query22); //쿼리실행결과를 $result 할당
    $rs22 = $result22->fetch_object();
    $cate2 =  $rs22->name;

    $query33 = "SELECT name FROM category WHERE cateid='".$cate3." '";
    $result33 = $mysqli->query($query33); //쿼리실행결과를 $result 할당
    $rs33 = $result33->fetch_object();
    $cate3 =  $rs33->name;

    var_dump($cate1);
    var_dump($cate2);
    var_dump($cate3);


    $cate = $cate1.'/'.$cate2.'/'.$cate3;
    $name = $_POST['name'];
    $price_status = $_POST['price_status'];
    $price = $_POST['price']??0;
    $level = $_POST['level']??0;
    $due_status = $_POST['due_status'];
    $due = $_POST['due']??'무제한';
    $act = $_POST['act'];
    $content = rawurldecode($_POST['content']);
    $youtube_name = $_POST['youtube_name']?? '';

    

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

    $sql = "INSERT INTO courses (cate, name, price_status,price, level, due_status, due, act, content, thumbnail, video_table_id) 
    VALUES ('{$cate}','{$name}','{$price_status}','{$price}','{$level}','{$due_status}','{$due}','{$act}','{$content}','{$thumbnail}','{$video_table_id}')";

    // var_dump($sql)

    $result = $mysqli->query($sql);
    $cid = $mysqli -> insert_id; //입력된 값의 pk가져오는 명령어

    if($result){

      if($youtube_name){

        $youtube_thumb = $_FILES['youtube_thumb']; //강의섬네일
        $youtube_url = $_REQUEST['youtube_url']; //강의url
        // var_dump($youtube_url);
        // print_r($youtube_thumb);

        for($i = 0;$i<count($youtube_url) ; $i++){

          if(isset($_FILES['youtube_thumb'])){
            if($_FILES['youtube_thumb']['size'][$i]> 10240000){
              echo "<script>
                alert('10MB 이하만 첨부할 수 있습니다.');    
                history.back();      
              </script>";
              exit;
            }
        
            if(strpos($_FILES['youtube_thumb']['type'][$i], 'image') === false){
              echo "<script>
                alert('이미지만 첨부할 수 있습니다.');    
                history.back();            
              </script>";
              exit;
            }
        
            $save_dir = $_SERVER['DOCUMENT_ROOT']."/pudding-LMS-website/admin/images/course/";
            $filename = $_FILES['youtube_thumb']['name'][$i]; //insta.jpg
            $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
            $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
            $youtube_thumb = $newfilename.".".$ext; //20238171184015.jpg
        
            if(move_uploaded_file($_FILES['youtube_thumb']['tmp_name'][$i], $save_dir.$youtube_thumb)){  
              $upload_youtube_thumb[] = "/pudding-LMS-website/admin/images/course/".$youtube_thumb;
            } else{
              echo "<script>
                alert('이미지등록 실패!');    
                history.back();            
              </script>";
            }
          }
          $sql1 = "INSERT INTO lecture (cid,youtube_thumb, youtube_name, youtube_url) VALUES ('{$cid}','{$upload_youtube_thumb[$i]}','{$youtube_name[$i]}', '{$youtube_url[$i]}')";
          $result2 = $mysqli-> query($sql1);
          }

      }

      $mysqli->commit();//디비에 커밋한다.

      echo "<script>
      alert('강의 등록 완료!');
      //location.href='course_list.php';</script>";
      }
    } catch(Exception $e){
      $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
      echo "<script>
      alert('강의 등록 실패');
     // history.back();
      </script>";
      exit;
    }
?>