
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

let telefone = document.querySelector('#telefone');
let labelTelefone = document.querySelector('#labelTelefone');
let validTelefone = false;

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')


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



nome.addEventListener('keyup', () => {
  const nomeSemEspacos = nome.value.trim()
  if(nomeSemEspacos.length === 0 || nomeSemEspacos.search(/\d/) !== -1) {
    labelNome.setAttribute('style', 'color: red')
    labelNome.innerHTML = 'Nome (Insira um nome válido, sem números)'
    nome.setAttribute('style', 'border-color: red')
    validNome = false
  } else if (nomeSemEspacos.length < 3) {
    labelNome.setAttribute('style', 'color: red')
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
if(email.value.length <= 3 || !email.value.includes('@yahoo.com') && !email.value.includes('@gmail.com') && !email.value.includes('@outlook.com') 
  && !email.value.includes('@protonmail.com') && !email.value.includes('@aol.com')){
    labelEmail.setAttribute('style', 'color: red')
    labelEmail.innerHTML = 'Email Preencha com algum dominio'
    email.setAttribute('style', 'border-color: red')
    validEmail = false
  } else {
    labelEmail.setAttribute('style', 'color: green')
    labelEmail.innerHTML = 'Usuário'
    email.setAttribute('style', 'border-color: green')
    validEmail = true
  }
})




telefone.addEventListener('keyup', () => {
  const telefoneSemMascara = telefone.value.replace(/\D/g, ''); // Remove a máscara do telefone
  const telefoneComMascara = telefoneSemMascara.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Adiciona a máscara do telefone

  if (telefoneSemMascara.length !== 11) {
    labelTelefone.setAttribute('style', 'color: red');
    labelTelefone.innerHTML = 'Telefone incorreto. Insira 11 números';
    telefone.setAttribute('style', 'border-color: red');
    validTelefone = false;
  } else {
    labelTelefone.setAttribute('style', 'color: green');
    labelTelefone.innerHTML = 'Telefone';
    telefone.value = telefoneComMascara; // Atribui o valor com a máscara ao campo de telefone
    telefone.setAttribute('style', 'border-color: green');
    validTelefone = true;
  }
});







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
    labelSenha.innerHTML = 'Senha Insira no minimo 6 caracteres'
    senha.setAttribute('style', 'border-color: red')
    validSenha = false
  } else {
    labelSenha.setAttribute('style', 'color: green')
    labelSenha.innerHTML = 'Senha'
    senha.setAttribute('style', 'border-color: green')
    validSenha = true
  }
})




function cadastrar(){
  if(validNome && validEmail && validCpf && validSenha && validTelefone){

    msgSuccess.setAttribute('style', 'display: block')
    msgSuccess.innerHTML = '<strong>Cadastrando usuário</strong>'
    msgError.setAttribute('style', 'display: none')
    msgError.innerHTML = ''
    
    
  
    
  } else {
    msgError.setAttribute('style', 'display: block')
    msgError.innerHTML = '<strong> Preencha os campos obrigatórios antes de prosseguir</strong>'
    msgSuccess.innerHTML = ''
    msgSuccess.setAttribute('style', 'display: none')
    return false;
  }
}


