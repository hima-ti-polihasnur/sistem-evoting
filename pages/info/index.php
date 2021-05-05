<?php
require("../../server/template/templating.php");

//CEK APAKAH USER SUDAH LOGIN
session_start();
if (empty($_SESSION["login"])) {
  header("Location: pages/login?error=ilegal");
  exit;
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

  <!-- Custom CSS -->
  <link rel="stylesheet" href="modal.css" type="text/css" media="all" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <title>
    Informasi - Sistem E Voting HIMA TI Polihasnur
  </title>
</head>
<body>

  <!-- Modals -->
  <section class="cstm-modal">
    <?php
      if ( isset($_SESSION["confirm"]) ){
        
        $status = $_SESSION["confirm"];
        
        switch ($status) {
          case 'false' : printInfo($status);
          break;
          case 'true' :
            printInfo($status);
            $_SESSION["status_vote"] = "true";
          break;
          case 'done' : 
            printInfo($status);
            $_SESSION["status_vote"] = "true";
          break;
          case 'not_yet' : printInfo($status);
          break;
          case 'time_over' : printInfo($status);
          break;
        }
        
      }
    ?>
  </section>

</body>
</html>