let idade = document.querySelector('#idade');
let labelIdade = document.querySelector('#labelidade');
let validIdade = false;

idade.addEventListener('keyup', () => {
  let idadeValue = idade.value.trim();

  if (idadeValue.length === 0 || isNaN(idadeValue)) {
    labelIdade.setAttribute('style', 'color: red');
    labelIdade.innerHTML = 'Idade';
    idade.setAttribute('style', 'border-color: red');
    validIdade = false;
  } else {
    labelIdade.setAttribute('style', 'color: green');
    labelIdade.innerHTML = 'Idade';
    idade.setAttribute('style', 'border-color: green');
    validIdade = true;
  }
});

function entrar() {
  if (validIdade) {
    if (idade.value.trim() === '') {
      msgError.setAttribute('style', 'display: block');
      msgError.innerHTML = '<strong>Preencha a idade corretamente antes de entrar</strong>';
      msgSuccess.innerHTML = '';
      msgSuccess.setAttribute('style', 'display: none');
      return false;
    } else {
      msgSuccess.setAttribute('style', 'display: block');
      msgSuccess.innerHTML = '<strong>Aguarde</strong>';
      msgError.setAttribute('style', 'display: none');
      msgError.innerHTML = '';
    }
  } 
}
