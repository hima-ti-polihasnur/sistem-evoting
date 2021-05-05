<?php
//JIKA USER SUDAH LOGIN DIRECT KE HOME
require("../../server/functions.php");
require("../../server/template/templating.php");
session_start();

if (isset($_SESSION["login"])) {
  header("Location: ../../");
  exit;
} else {
  $error = $_GET["error"];

  if (isset($_POST["login"])) {
    if (loginValidation($_POST) > 0) {
      $_SESSION["login"] = true;
      header("Location: ../../index.php");
      exit;
    } else {
      $error = 'failed';
    }
  }
}

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0D6DFC" />
  <meta name="display" content="standalone" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Google Fonts - Lato -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style/login.css" type="text/css" media="all" />
  <link rel="stylesheet" href="../../assets/style/navbar-style.css" type="text/css" media="all" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <title>
    Login Pemilih - Sistem E Voting HIMA TI Polihasnur
  </title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-md">
      <a class="navbar-brand" href="#">
        <img src="https://hima-ti-polihasnur.github.io/assets/img/logo_hima_ti.png" width="50" />
        E-VOTING HIMA TI
      </a>
    </div>
  </nav>
  
  <?php
    if ( isset($error) ) {
      printError($error);
    }
  ?>
  
  <section class="container container-md mt-md-3 px-4 py-3 rounded shadow-sm bg-white">
    <h2 class="text-center mt-2 fw-bold">
      Masuk
    </h2>
    <p class="text-center">
      Sebagai Pemilih Terdaftar
    </p>
    <hr class="w-75 mx-auto rounded">

    <form class="" action="" method="POST">
      <div class="form-floating">
        <input type="text" class="form-control" id="username" name="username" required="">
        <label for="username">Username</label>
      </div>
      <div class="form-floating mt-3">
        <input type="password" class="form-control" id="password" name="password" required="">
        <label for="password">Password</label>
      </div>
      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="true" id="showPassword">
        <label class="form-check-label" for="showPassword">
          Show password
        </label>
      </div>
      <button type="submit" name="login" class="btn btn-success px-3 py-2 w-100 mt-3 fs-5">
        <i class="fas fa-sign-in-alt text-white"></i>
        Login
      </button>
    </form>
  </section>

  <section class="container container-md mt-md-3 mt-3 px-4 py-3 rounded shadow-sm bg-white">
    <strong>
      Petunjuk Log In
    </strong>
    <ol>
      <li>Username diisi dengan NIM lengkap pemilih</li>
      <li>Password merupakan 4 digit akhir dari NIM pemilih</li>
      <li>Jika mengalami kendala lainnya silahkan menghubungi
        <a class="text-decoration-none" href="#">Pusat Bantuan</a>
      </li>
    </ol>
  </section>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!-- Login .js -->
  <script src="script/login.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>