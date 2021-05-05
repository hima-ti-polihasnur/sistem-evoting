const btnExpands = document.querySelectorAll('.expandForm');

for (const btn of btnExpands) {
  btn.addEventListener('click', function() {
    rotateIcon(this);
    removeClass(this);
  })
}

function removeClass (element) {
  let target = document.getElementById(element.dataset.expand);
  target.classList.toggle('active');
  if (target.classList.contains('active')) {
    target.classList.toggle('expand');
  } else {
    target.classList.toggle('expand');
  }
}

function rotateIcon (element) {
  let icons = element.childNodes;
  icons[1].classList.toggle('fa-chevron-right');
  icons[1].classList.toggle('fa-chevron-down');
}