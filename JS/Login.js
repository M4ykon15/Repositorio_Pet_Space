let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')

let email = document.querySelector('#email')
let labelEmail = document.querySelector('#labelEmail')
let validEmail = false
  
let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false


let btn = document.querySelector('#eyeIcon');

btn.addEventListener('click', () => {
  let inputSenha = document.querySelector('#senha');

  if (inputSenha.getAttribute('type') === 'password') {
    inputSenha.setAttribute('type', 'text');
    btn.classList.remove('fa-eye');
    btn.classList.add('fa-eye-slash');
  } else {
    inputSenha.setAttribute('type', 'password');
    btn.classList.remove('fa-eye-slash');
    btn.classList.add('fa-eye');
  }
});



  email.addEventListener('keyup', () => {
    if(email.value.length === 0 && (" ")) {
      labelEmail.setAttribute('style', 'color: red')
    email.setAttribute('style', 'border-color: red')
      return false;
    }
    if (!email.value.endsWith("@gmail.com") || email.value.length <= 5) {
      labelEmail.setAttribute('style', 'color: red');
      labelEmail.innerHTML = 'Email';
      email.setAttribute('style', 'border-color: red');
      validEmail = false;
    } else {
      labelEmail.setAttribute('style', 'color: green');
      labelEmail.innerHTML = 'Email';
      email.setAttribute('style', 'border-color: green');
      validEmail = true;
    }
    
  })

  senha.addEventListener('keyup', () => {
    if(senha.value.length === 0 && (" ")) {
      labelSenha.setAttribute('style', 'color: red')
    labelSenha.innerHTML = 'Preencha a senha '
    senha.setAttribute('style', 'border-color: red')
      return false;
   }

     else if(senha.value.length <= 7 ){
      labelSenha.setAttribute('style', 'color: red')
    
      senha.setAttribute('style', 'border-color: red')
       validSenha = false
    } else {
       labelSenha.setAttribute('style', 'color: green')
      labelSenha.innerHTML = 'Senha'
     senha.setAttribute('style', 'border-color: green')
      validSenha = true
     }
   })

  
  function entrar() {
    if (validEmail && validSenha) {
      if (email.value.trim() === '') {
        msgError.setAttribute('style', 'display: block')
        msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de cadastrar</strong>'
        msgSuccess.innerHTML = ''
        msgSuccess.setAttribute('style', 'display: none')
        return false
      } else {
        msgSuccess.setAttribute('style', 'display: block')
        msgSuccess.innerHTML = '<strong>Aguarde</strong>'
        msgError.setAttribute('style', 'display: none')
        msgError.innerHTML = ''

        setTimeout(()=>{
          window.location.href = 'PetSpace.html'
    
      }, 3000)

      }
    } else {
      msgError.setAttribute('style', 'display: block')
      msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de entrar</strong>'
      msgSuccess.innerHTML = ''
      msgSuccess.setAttribute('style', 'display: none')
      return false
    }
  }
  