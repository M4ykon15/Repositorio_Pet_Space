let btn = document.querySelector('#eyeSvg1')
let btnConfirm = document.querySelector('#eyeSvg2')


let nome = document.querySelector('#nome')
let labelNome = document.querySelector('#labelNome')
let validNome = false

let email = document.querySelector('#email')
let labelEmail = document.querySelector('#labelEmail')
let validEmail = false

let cpf = document.querySelector('#cpf')
let labelCpf = document.querySelector('#labelCpf')
let validCpf = false

let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false

let confirmSenha = document.querySelector('#confirmSenha')
let labelConfirmSenha = document.querySelector('#labelConfirmSenha')
let validConfirmSenha = false

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')



nome.addEventListener('keyup', () => {
  const nomeSemEspacos = nome.value.trim()
  if(nomeSemEspacos.length === 0 || nomeSemEspacos.search(/\d/) !== -1) {
    labelNome.setAttribute('style', 'color: red')
    labelNome.innerHTML = 'Nome (Insira um nome válido, sem números)'
    nome.setAttribute('style', 'border-color: red')
    validNome = false
  } else if (nomeSemEspacos.length <= 4) {
    labelNome.setAttribute('style', 'color: red')
    labelNome.innerHTML = 'Nome (Insira no mínimo 5 caracteres)'
    nome.setAttribute('style', 'border-color: red')
    validNome = false
  } else {
    labelNome.setAttribute('style', 'color: green')
    labelNome.innerHTML = 'Nome'
    nome.setAttribute('style', 'border-color: green')
    validNome = true
  }
})



email.addEventListener('keyup', () => {
  if(email.value.length<= 5 || !email.value.includes('@yahoo.com') && !email.value.includes('@gmail.com')){
    labelEmail.setAttribute('style', 'color: red')
    labelEmail.innerHTML = 'Preencha com @gmail.com ou @yahoo.com'
    email.setAttribute('style', 'border-color: red')
    validEmail = false
  } else {
    labelEmail.setAttribute('style', 'color: green')
    labelEmail.innerHTML = 'Usuário'
    email.setAttribute('style', 'border-color: green')
    validEmail = true
  }
})



cpf.addEventListener('keyup', () => {
  const cpfSemMascara = cpf.value.replace(/\D/g, '') // remove a máscara do CPF
  const cpfComMascara = cpfSemMascara.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4") // adiciona a máscara no CPF

  if (cpfSemMascara.length !== 11) {
    labelCpf.setAttribute('style', 'color: red')
    labelCpf.innerHTML = 'CPF incorreto. Insira 11 números'
    cpf.setAttribute('style', 'border-color: red')
    validCpf = false
  } else {
    labelCpf.setAttribute('style', 'color: green')
    labelCpf.innerHTML = 'CPF'
    cpf.value = cpfComMascara // atribui o valor com máscara ao campo de CPF
    cpf.setAttribute('style', 'border-color: green')
    validCpf = true
  }
})


senha.addEventListener('keyup', () => {
  if(senha.value.length <= 5){
    labelSenha.setAttribute('style', 'color: red')
    labelSenha.innerHTML = 'Senha *Insira no minimo 6 caracteres'
    senha.setAttribute('style', 'border-color: red')
    validSenha = false
  } else {
    labelSenha.setAttribute('style', 'color: green')
    labelSenha.innerHTML = 'Senha'
    senha.setAttribute('style', 'border-color: green')
    validSenha = true
  }
})

confirmSenha.addEventListener('keyup', () => {
  if(senha.value != confirmSenha.value && (" ")){
    labelConfirmSenha.setAttribute('style', 'color: red')
    labelConfirmSenha.innerHTML = 'As senhas não são iguais'
    confirmSenha.setAttribute('style', 'border-color: red')
    validConfirmSenha = false
  } else {
    labelConfirmSenha.setAttribute('style', 'color: green')
    labelConfirmSenha.innerHTML = 'Confirmar Senha'
    confirmSenha.setAttribute('style', 'border-color: green')
    validConfirmSenha = true
  }
})

confirmSenha.addEventListener('keyup', () => {
  if (confirmSenha.value.length === 0) { // verifica se a classe confirmSenha está vazia
    labelConfirmSenha.setAttribute('style', 'color: red')
    labelConfirmSenha.innerHTML = 'Confirme a senha'
    confirmSenha.setAttribute('style', 'border-color: red')
    validConfirmSenha = false
  } else if (senha.value !== confirmSenha.value) {
    labelConfirmSenha.setAttribute('style', 'color: red')
    labelConfirmSenha.innerHTML = 'As senhas não são iguais'
    confirmSenha.setAttribute('style', 'border-color: red')
    validConfirmSenha = false
  } else {
    labelConfirmSenha.setAttribute('style', 'color: green')
    labelConfirmSenha.innerHTML = 'Confirmar Senha'
    confirmSenha.setAttribute('style', 'border-color: green')
    validConfirmSenha = true
  }
})


function cadastrar(){
  if(validNome && validEmail && validCpf && validSenha && validConfirmSenha){

    msgSuccess.setAttribute('style', 'display: block')
    msgSuccess.innerHTML = '<strong>Cadastrando usuário...</strong>'
    msgError.setAttribute('style', 'display: none')
    msgError.innerHTML = ''
    
    setTimeout(()=>{
        window.location.href = 'PetSpace.html'
  
    }, 3000)
  
    
  } else {
    msgError.setAttribute('style', 'display: block')
    msgError.innerHTML = '<strong> Preencha os campos obrigatórios antes de prosseguir</strong>'
    msgSuccess.innerHTML = ''
    msgSuccess.setAttribute('style', 'display: none')
    return false;
  }
}

//icone do botão de ver senha!!
btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})

btnConfirm.addEventListener('click', ()=>{
  let inputConfirmSenha = document.querySelector('#confirmSenha')
  
  if(inputConfirmSenha.getAttribute('type') == 'password'){
    inputConfirmSenha.setAttribute('type', 'text')
  } else {
    inputConfirmSenha.setAttribute('type', 'password')
  }
})