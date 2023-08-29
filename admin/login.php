<?php
// if(isset($_SESSION['AUID'])){
//   if($_SESSION['AUID'] == 'admin'){
//     echo "<script>
//       alert('이미 로그인 하셨습니다.');
//       location.href = '/abcmall/admin/index.php';
//     </script>";
//   }
// }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <!-- jquery ui css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
      integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- 스포카 -->
    <link
      href="//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSansNeo.css"
      rel="stylesheet"
      type="text/css"
    />

    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <main>
      <div class="login_box">
        <h1 class="main_tt loginlogo loginpage_logo">
          <a href="#">PUDDING</a>
        </h1>
        <form action="login_ok.php" method="POST">
          <h2 class="content_tt">Admin</h2>
          <div
            class="input-group d-flex align-items-center base_mg_top shadow_box"
          >
            <label for="userid">id</label>
            <input
              type="text"
              class="form-control"
              name="userid"
              id="userid"
              placeholder="id"
              aria-label="userid"
              required
            />
          </div>
          <div
            class="input-group d-flex align-items-center base_mg_top shadow_box"
          >
            <label for="password">password</label>
            <input
              type="password"
              class="form-control"
              name="password"
              id="password"
              placeholder="password"
              required
            />
          </div>
          <input
            type="submit"
            value="LOGIN"
            class="btn btn-primary main_stt login_btn base_mg_top"
          />
        </form>
      </div>
    </main>
    <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/footer.php';
?>