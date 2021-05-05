const passwordArea = document.querySelector('#password');
const showPassword = document.querySelector('#showPassword');

showPassword.addEventListener('input', function() {
  if (this.checked) passwordArea.setAttribute('type', 'text');
  else passwordArea.setAttribute('type', 'password');
})