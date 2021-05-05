<?php
session_start();
require("functions.php");

//CEK APAKAH USER SUDAH LOGIN
if (empty($_SESSION["login"])) {
  header("Location: ../pages/login?error=ilegal");
  exit;
}

//CEK APAKAH TOMBOL confirmVote SUDAH DI KLIK
if ( isset($_POST["confirm_vote"]) ){
  
  if ( confirmPassword($_POST) > 0 ) {
    if ( setVote($_POST) > 0 ) {
      if ( setStatus($_SESSION["user_profile"]) > 0 ){
        $_SESSION["confirm"] = "true";
        header("Location: ../pages/info");
        exit;
      } else $error = 1;
    } else $error = 1;
  } else $error = 1;
  
  if ( isset($error) ){
    $_SESSION["confirm"] = "false";
    header("Location: ../pages/info");
    exit;
  }
}
?>