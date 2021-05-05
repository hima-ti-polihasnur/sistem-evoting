<?php

  // PRINT ERROR AT LOGIN PAGE
function printError($error) {

  switch ($error) {
    case "failed" :
      $text = "Login anda gagal, Username atau Password salah!";
      break;
    case "ilegal" :
      $text = "Anda harus login terlebih dahulu!";
      break;
  }

  $message = <<<"EOT"
    <div class="container container-md px-1 py-2">
      <div class="alert alert-warning rounded mt-1 mb-1 alert-dismissible fade show" role="alert">
        <strong>$text</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
EOT;
  echo $message;
}

//PRINT INFORMATION OF USER PROFILE TO HOME PAGE
function printUserProfile ($data) {
  $fullname = $data["fullname"];
  $job = $data["job"];
  
  if ( $data["status_vote"] == "true" ) {
    $status = "Sudah melakukan vote";
  } else {
    $status = "Belum melakukan vote";
  }
  
  $template = <<<"EOT"
  <section class="container mb-2 px-3 py-2">
    <div class="row d-flex flex-nowrap mb-0 mt-2 mx-0 bg-white shadow-sm rounded py-2 px-3 border border-5 border-top-0 border-end-0 border-bottom-0 border-primary">
      <div class="col-3 mx-0 grid-center">
        <i class="fas fa-user-circle fw-bold txt-profile"></i>
      </div>
      <div class="col-9">
        <p class="mb-0 fs-5 fw-bold">
          $fullname
        </p>
        <p class="mb-0 text-muted">
          $job
        </p>
        <p class="mb-0 text-muted">
          Status :
          <strong class="text-info">
            $status
          </strong>
        </p>
      </div>
    </div>
  </section>
EOT;
  
  echo $template;
}

//PRINT PASANGAN CALON
function printPaslon ($data) {
  $path = "../../assets/img/";
  $calon_ketum = $data["calon_ketum"];
  $calon_waketum = $data["calon_waketum"];
  $foto_ketum = $path . $data["foto_ketum"];
  $foto_waketum = $path . $data["foto_waketum"];
  $no_paslon = $data["no_paslon"];
  $data_form = "confirmVote-" . $data["no_paslon"];
  
  $template = <<<"EOT"
    <div class="row bg-white rounded shadow-sm mx-auto px-3 py-3 mt-3 border border-5 border-top-0 border-end-0 border-bottom-0 border-success">
      <span class="text-center fw-bold text-secondary fs-1 mb-3 bg-light">
        $no_paslon
      </span>
      <div class="col-6">
        <img class="rounded-circle mx-auto mb-2 d-block" src="$foto_ketum" alt="$foto_ketum" width="120" />
        <p class="text-center mb-0 fw-bold">
          $calon_ketum
        </p>
        <p class="text-center card-subtitle text-muted">
          Calon Ketua Umum
        </p>
      </div>

      <div class="col-6">
        <img class="rounded-circle mx-auto mb-2 d-block" src="$foto_waketum" width="120" />
        <p class="text-center fw-bold mb-0">
          $calon_waketum
        </p>
        <p class="text-center card-subtitle text-muted">
          Calon Wakil Ketum
        </p>
      </div>

      <button data-click="false" data-expand="$data_form" class="expandForm btn btn-success w-100 rounded-pill px-3 py-2 text-center mt-3 fw-bold fs-5" type="button">
        Vote
        <i class="fas fa-chevron-right mx-1"></i>
      </button>

      <div class="col mt-4 confirmVote" id="$data_form">
        <hr class="fw-bold" />
        <form action="../../server/confirm.php" method="POST">
          <div class="mb-3">
            <input type="hidden" name="key_paslon" id="keywordPaslon" value="$no_paslon" />
            <label for="passwordOnFormExpand" class="form-label text-center text-muted">Confirm your Password</label>
            <input type="password" name="pw_confirm_vote" class="form-control rounded-pill" id="passwordOnFormExpand" required>
          </div>
          <button data-role="confirmPassword" type="submit" name="confirm_vote" class="btn btn-primary rounded-pill w-100 fw-bold mt-2">
            Confirm
            <i class="fas fa-vote-yea mx-1"></i>
          </button>
        </form>
      </div>
    </div>
EOT;
    echo $template;
}

//PRINT INFORMATION VOTE
function printInfo ($status){
  switch ($status) {
    case 'false' : 
      $status_text= '<strong class="text-danger">Gagal</strong>';
      $status_icon = "fa-times text-danger";
      $action_text = 'Try again';
      $action_icon = "fa-redo";
      break;
    case 'true' :
      $status_text= '<strong class="text-success">Berhasil</strong>';
      $status_icon = "fa-check-double text-success";
      $action_text = "Back to home";
      $action_icon = "fa-home";
      break;
    case 'not_yet' :
      $time = true;
      $status_text= 'Sesi voting belum dimulai !';
      $status_icon = "fa-ban text-warning";
      $action_text = "Back to home";
      $action_icon = "fa-home";
      break;
    case 'time_over' :
      $time = true;
      $status_text= 'Sesi voting telah berakhir !';
      $status_icon = "fa-ban text-warning";
      $action_text = "Back to home";
      $action_icon = "fa-home";
      break;
    case 'done' :
      $done = true;
      $template = <<<"EOT"
        <section class="modal-card px-3 py-5 bg-white mx-auto text-center rounded shadow-lg w-75">
          <i class="far fa-smile-beam text-primary fw-bold mb-3 bg-light px-3 py-3 rounded-circle" style="font-size: 2.5rem"></i>
          <p class="fs-3">
            Anda sudah melakukan vote, terima kasih atas partisipasi anda
          </p>
          <a href="../../" class="btn btn-light px-3 py-2 mt-5 rounded-pill text-muted" type="button">
            <i class="fas fa-home"></i>
            Back to home
          </a>
        </section>
EOT;
      break;
  }
  
  if ($time) {
    $template = <<<"EOT"
      <section class="modal-card px-3 py-5 bg-white mx-auto text-center rounded shadow-lg w-75">
        <i class="fas $status_icon fw-bold mb-3 bg-light px-3 py-3 rounded-circle" style="font-size: 2.5rem"></i>
        <p class="fs-3">
          $status_text
        </p>
        <a href="../../" class="btn btn-light px-3 py-2 mt-5 rounded-pill text-muted" type="button">
          <i class="fas $action_icon"></i>
          $action_text
        </a>
      </section>
EOT;
  }
  else if ( !isset($done) ) {
    $template = <<<"EOT"
      <section class="modal-card px-3 py-5 bg-white mx-auto text-center rounded shadow-lg w-75">
        <i class="fas $status_icon fw-bold mb-3 bg-light px-3 py-3 rounded-circle" style="font-size: 2.5rem"></i>
        <p class="fs-3">
          Vote telah
          $status_text
          dilakukan !
        </p>
        <a href="../../" class="btn btn-light px-3 py-2 mt-5 rounded-pill text-muted" type="button">
          <i class="fas $action_icon"></i>
          $action_text
        </a>
      </section>
EOT;
  }
    echo $template;
}

//PRINT JUMLAH AKUMULASI PEMILIH YANG SUDAH VOTE
function printCountUser (){
  global $conn;
  $query = "
    SELECT status_vote FROM tabel_pemilih WHERE status_vote = 'true'
  ";
  mysqli_query($conn, $query);
  return (
    mysqli_affected_rows($conn)
    );
}

//SAVE DATA SESI MULAI DAN AKHIR DALAM INPUT HIDDEN

function setValueJadwal (){
  global $conn;
  $query = "SELECT * FROM tabel_jadwal";
  $tabel = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($tabel);
  
  $sesi_mulai = $result["sesi_mulai"];
  $sesi_akhir = $result["sesi_akhir"];
  
  $template = <<<"EOT"
    <input type="hidden" id="sesi_mulai" value="$sesi_mulai">
    <input type="hidden" id="sesi_akhir" value="$sesi_akhir">
EOT;
  
  return ($template);
}
?>