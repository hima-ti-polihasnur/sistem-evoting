<?php
require("server/functions.php");
require("server/template/templating.php");


//CEK APAKAH USER SUDAH LOGIN
session_start();
if ( empty($_SESSION["login"]) ){
  header("Location: pages/login?error=ilegal");
  exit;
}

//CEK APAKAH USER SUDAH MELAKUKAN VOTING 
if ( cekStatus($_SESSION["user_profile"] ) > 0 ){
  $_SESSION["confirm"] = "done";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0D6DFC" />
  <meta name="display" content="fullscreen" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Google Fonts - Lato -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="index.css" type="text/css" media="all" />
  <link rel="stylesheet" href="assets/style/navbar-style.css" type="text/css" media="all" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <title>
    Home Page - Sistem E Voting HIMA TI POLIHASNUR
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

  <section class="container container-md">
    <div id="wellcome-banner" class="row px-3 py-2 bg-white text-center mx-auto rounded shadow-sm border border-5 border-bottom-0 border-top-0 border-end-0 border-primary mt-3">
      <h2 class="fw-bold">Selamat Datang</h2>
      <p>
        Pemilihan Umum Ketua dan Wakil Ketua Umum HIMA TI Polihasnur Periode 2021/2022
      </p>
    </div>
  </section>
  
  <?php
    echo setValueJadwal();
  ?>

  <section class="container container-md">
    <div class="row d-flex justify-content-center bg-white px-3 py-4 mt-3 rounded shadow-sm mx-auto border border-5 border-top-0 border-end-0 border-bottom-0 border-success border-singgle">
      <div class="col-10">
        <h2 class="text-center fw-bold">
          <?php
            echo printCountUser();
          ?>
          <i class="fas fa-users"></i>
        </h2>
        <p class="text-center">
          Pemilih sudah menentukan pilihannya
        </p>
      </div>
      <div class="col-10 mt-4">
        <p data-role="countdown" class="text-center">
          
        </p>
        <h2 class="text-center fw-bold">
          <strong id="countDown"></strong>
        </h2>
      </div>
      <div class="col-10 mt-3">
        <a id="nextPages" href="pages/vote" class="btn btn-primary w-100 rounded-5">
          Next
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <div class="col-10 ">
        <div class="py-3">
          <a href="server/logout.php" class="btn px-5 w-100 text-center py-2 bg-light border rounded-pill text-muted fw-bold">
            <i class="fas fa-sign-out-alt text-danger fw-bold"></i>
            Logout
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php
    if ( isset($_SESSION["user_profile"]) || 
        isset($_SESSION["status_vote"]) ){
      printUserProfile($_SESSION["user_profile"]);
    }
  ?>

  <section class="container container-md">
    <div class="bg-white px-3 py-3 mx-auto mt-3 shadow-sm rounded border-5 border border-top-0 border-end-0 border-bottom-0 border-success">
      <p class="mb-0">
        Silahkan
        <a class="text-decoration-none" href="#">
          Unduh Disini
          <i class="fas fa-download"></i>
        </a>
        berkas PDF program kerja dan visi misi dari para calon pasangan.
      </p>
    </div>
  </section>

  <section class="container container-md">
    <div class="bg-white px-3 py-3 mx-auto mt-3 mb-3 shadow-sm rounded border border-5 border-top-0 border-end-0 border-bottom-0 border-primary">
      <strong>
        Petunjuk dalam memilih
      </strong>
      <ol>
        <li>Pemilih merupakan Mahasiswa aktif atau Tenaga Pendidik yang terdaftar berada di lingkungan Program Studi D3 TI Polihasnur</li>
        <li>Setiap user memiliki satu hak suara yang dapat diberikan kepada hanya salah satu calon</li>
        <li>Tap tombol 'Next' untuk mulai melakukan vote</li>
        <li>Jika mengalami kendala lainnya silahkan menghubungi
          <a class="text-decoration-none" href="#">Pusat Bantuan</a>
        </li>
      </ol>
    </div>
  </section>

  <section class="container container-md">

  </section>
  <script src="assets/scripts/countdown.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>