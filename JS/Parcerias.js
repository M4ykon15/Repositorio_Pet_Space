
// Função para realizar o logout
function logout() {
  // Aqui você pode adicionar o código para realizar o logout, como redirecionar para a página de login, limpar os dados de autenticação, etc.
  alert("Logout realizado com sucesso!");
}

// Definindo a aba "perfil" como a aba inicialmente ativa
document.getElementById("perfil").style.display = "block";

function logout() {
  // Código para realizar o logout
  alert("Logout realizado com sucesso!");
}
function mostrarFoto(event) {
  var imagem = document.getElementById('imagem');
  imagem.src = URL.createObjectURL(event.target.files[0]);
}


