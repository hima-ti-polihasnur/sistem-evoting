<?php

$conn = mysqli_connect("localhost", "root", "", "evoting_hima");

//FUNCTION AT LOGIN PAGE
function loginValidation ($data) {
  global $conn;
  session_start();
  $user = $data["username"];
  $pass = $data["password"];

  $query = "
  SELECT * FROM tabel_pemilih WHERE username = '$user'
  AND password = '$pass'";

  $results = mysqli_query($conn, $query);
  
  if ( mysqli_num_rows($results) > 0 ) {
    $_SESSION["user_profile"] = mysqli_fetch_assoc($results);
  }
  
  return (
    mysqli_num_rows($results)
  );
}

//GET DATA FROM tabel_paslon
function getDataPaslon (){
  global $conn;
  
  $query = "SELECT * FROM tabel_paslon";
  $tabel = [];
  $results = mysqli_query($conn, $query);
  
  while ( $result = mysqli_fetch_assoc($results) ){
    $tabel[] = $result;
  }
  
  return $tabel;
}

//SCRIPT FOR CONFIRM VOTE
function confirmPassword ($data) {
  session_start();
  $passwordOnClient = $data["pw_confirm_vote"];
  $passwordOnDataBase = $_SESSION["user_profile"]["password"];
  
  return (
    $passwordOnClient == $passwordOnDataBase ? 1 : 0
    );
}

//MASUKKAN VOTE
function setVote ($data) {
  global $conn;
  $key_paslon = $data["key_paslon"];
  $query = "
    SELECT jumlah_vote FROM tabel_paslon 
    WHERE no_paslon = '$key_paslon'
  ";
  
  $field = mysqli_query($conn, $query);
  $result = intval( mysqli_fetch_assoc($field)["jumlah_vote"] );
  $result ++;
  
  $newQuery = "
    UPDATE tabel_paslon SET jumlah_vote = '$result' 
    WHERE no_paslon = '$key_paslon'
  ";
  
  mysqli_query($conn, $newQuery);
  return(
    mysqli_affected_rows($conn)
    );
}

//TANDAI USER SUDAH MELAKUKAN VOTE
function setStatus ($data){
  session_start();
  global $conn;
  
  $username = $data["username"];
  $query = "UPDATE tabel_pemilih SET status_vote = 'true' WHERE username = '$username'";
  
  mysqli_query($conn, $query);
  $param = mysqli_affected_rows($conn);
  
  if ( $param > 0 ){
    $_SESSION["user_profile"]["status_vote"] = "true";
  }
  
  return $param;
}

//CEK APAKAH USER SUDAH MELAKUKAN VOTING
function cekStatus($data){
  global $conn;
  $username = $data["username"];
  $query = "
    SELECT * FROM tabel_pemilih WHERE username = '$username'
  ";
  
  $result = mysqli_query($conn, $query);
  return (
    mysqli_fetch_assoc($result)["status_vote"] == "true" ? 1 : 0
    );
}

//CEK APAKAH WAKTU SESI BELUM DIMULAI / SUDAH BERAKHIR
function checkTimeUp(){
  global $conn;
  //QUERY tabel_jadwal
  $query = "SELECT * FROM tabel_jadwal";
  $tabel = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($tabel);
  
  date_default_timezone_set("Asia/Singapore");
  $now = strtotime(date("Y-m-d H:i"));
  $sesi_mulai = strtotime($result["sesi_mulai"]);
  $sesi_akhir = strtotime($result["sesi_akhir"]);
  
    
  //JIKA $NOW LEBIH KECIL DARI $SESI_MULAI RETURN 0
  if ( $now < $sesi_mulai ){
    $_SESSION["confirm"] = "not_yet";
    header("location: ../info");
    exit;
  } 
  else if ( $now >= $sesi_akhir ) {
    $_SESSION["confirm"] = "time_over";
    header("Location: ../info");
    exit;
  }
  
}
?>