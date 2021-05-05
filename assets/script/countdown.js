const countDownEl = document.querySelector('#countDown');

function countdown(date, sesiMulai) {
  const target = new Date(date).getTime();


  const timerStart = setInterval(() => {
    const now = new Date().getTime();
    if (now < sesiMulai) {
      printAlert("Sesi Voting belum dimulai");
    } else {
      //COUNT TIME
      let diff = target - now;
      days = Math.floor(diff / 86400000),
      hours = Math.floor((diff - (days * 86400000)) / 3600000),
      minutes = Math.floor((diff - (days * 86400000 + hours * 3600000)) / 60000),
      seconds = Math.floor((diff - (days * 86400000 + hours * 3600000 + minutes * 60000)) / 1000);

      if (days < 0) {
        printAlert("Sesi voting telah berakhir !");
        clearInterval(timerStart);

      } else printScreen(days, hours, minutes, seconds, date);
    }
  },
    1000);
}

function printScreen(days, hours, minutes, seconds, date) {
  document.querySelector('[data-role=countdown]').innerHTML = 'Hitung mundur dalam ';
  countDownEl.innerHTML = `${hours} : ${minutes} : ${seconds}`;
}

function printAlert(str1) {
  countDownEl.innerHTML = str1;
  document.querySelector('[data-role=countdown]').style.display = 'none';
}

// GET JADWAL
const sesiMulai = new Date(document.querySelector('#sesi_mulai').value).getTime();
const sesiAkhir = new Date(document.querySelector('#sesi_akhir').value).getTime();

//alert(new Date().getTime() < sesiMulai);
//RUN FUNCTION
countdown(sesiAkhir, sesiMulai);