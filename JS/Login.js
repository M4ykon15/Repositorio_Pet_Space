let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')

let email = document.querySelector('#email')
let labelEmail = document.querySelector('#labelEmail')
let validEmail = false
  
let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false


let btn = document.querySelector('.fa-eye')

btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})


  email.addEventListener('keyup', () => {
    if(email.value.length === 0 && (" ")) {
      labelEmail.setAttribute('style', 'color: red')
    labelEmail.innerHTML = 'Preencha o email'
    email.setAttribute('style', 'border-color: red')
      return false;
    }
    else if(email.value.length <= 5 || !email.value.includes('admin@gmail.com')) {
      labelEmail.setAttribute('style', 'color: red')
      labelEmail.innerHTML = 'Email ("Preencha com admin@gmail.com")'
      email.setAttribute('style', 'border-color: red')
      validEmail = false
    } else {
      labelEmail.setAttribute('style', 'color: green')
      labelEmail.innerHTML = 'Email'
      email.setAttribute('style', 'border-color: green')
      validEmail = true
    }
  })

  senha.addEventListener('keyup', () => {
    if(senha.value.length === 0 && (" ")) {
      labelSenha.setAttribute('style', 'color: red')
    labelSenha.innerHTML = 'Preencha a senha '
    senha.setAttribute('style', 'border-color: red')
      return false;
   }

    else if(senha.value.length <= 5 || !senha.value.includes('admin123')){
      labelSenha.setAttribute('style', 'color: red')
      labelSenha.innerHTML = 'Senha (Preencha com "admin123")'
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
      if (email.value.trim() === '' || email.value.trim() !== 'admin@gmail.com') {
        msgError.setAttribute('style', 'display: block')
        msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de cadastrar</strong>'
        msgSuccess.innerHTML = ''
        msgSuccess.setAttribute('style', 'display: none')
        return false
      } else {
        msgSuccess.setAttribute('style', 'display: block')
        msgSuccess.innerHTML = '<strong>Cadastrando usuário...</strong>'
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
  
  
 
   
  

   