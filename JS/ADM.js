// Função para atualizar as estatísticas
function atualizarEstatisticas() {
  // Obter a quantidade de linhas nas tabelas de animais divulgados e solicitações pendentes
  var animaisDivulgados = document.querySelectorAll('.animais_divulgados tbody tr').length;
  var solicitacoesPendentes = document.querySelectorAll('.animais_pendentes tbody tr').length;

  // Atualizar os elementos HTML com as novas estatísticas
  document.getElementById('adoptions').textContent = animaisDivulgados;
  document.getElementById('requests').textContent = solicitacoesPendentes;
}

// Chamar a função inicialmente para exibir as estatísticas iniciais
atualizarEstatisticas();

// Adicionar um evento para chamar a função sempre que houver uma alteração nas tabelas
var tableObserver = new MutationObserver(atualizarEstatisticas);
var tableConfig = { childList: true, subtree: true };
var animaisDivulgadosTable = document.querySelector('.animais_divulgados tbody');
var solicitacoesPendentesTable = document.querySelector('.animais_pendentes tbody');
tableObserver.observe(animaisDivulgadosTable, tableConfig);
tableObserver.observe(solicitacoesPendentesTable, tableConfig);


  function editarAnimal(event) {
    var button = event.target;
    var row = button.parentNode.parentNode;

    // Obtenha os valores atuais dos campos na linha
    var nomeResponsavel = row.cells[1].textContent;
    var sexo = row.cells[2].textContent;
    var especie = row.cells[3].textContent;
    var raca = row.cells[4].textContent;
    var idade = row.cells[5].textContent;
    var porte = row.cells[6].textContent;
    var nomePet = row.cells[7].textContent;
    var caracteristicas = row.cells[8].textContent;
    var endereco = row.cells[9].textContent;
    var historia = row.cells[10].textContent;

    // Crie inputs para os campos que deseja editar
    var inputNomeResponsavel = document.createElement("input");
    inputNomeResponsavel.value = nomeResponsavel;
    var inputSexo = document.createElement("input");
    inputSexo.value = sexo;
    var inputEspecie = document.createElement("input");
    inputEspecie.value = especie;
    var inputRaca = document.createElement("input");
    inputRaca.value = raca;
    var inputIdade = document.createElement("input");
    inputIdade.value = idade;
    var inputPorte = document.createElement("input");
    inputPorte.value = porte;
    var inputNomePet = document.createElement("input");
    inputNomePet.value = nomePet;
    var inputCaracteristicas = document.createElement("input");
    inputCaracteristicas.value = caracteristicas;
    var inputEndereco = document.createElement("input");
    inputEndereco.value = endereco;
    var inputHistoria = document.createElement("input");
    inputHistoria.value = historia;

    // Substitua as células da linha pelos inputs criados
    row.cells[1].textContent = "";
    row.cells[1].appendChild(inputNomeResponsavel);
    row.cells[2].textContent = "";
    row.cells[2].appendChild(inputSexo);
    row.cells[3].textContent = "";
    row.cells[3].appendChild(inputEspecie);
    row.cells[4].textContent = "";
    row.cells[4].appendChild(inputRaca);
    row.cells[5].textContent = "";
    row.cells[5].appendChild(inputIdade);
    row.cells[6].textContent = "";
    row.cells[6].appendChild(inputPorte);
    row.cells[7].textContent = "";
    row.cells[7].appendChild(inputNomePet);
    row.cells[8].textContent = "";
    row.cells[8].appendChild(inputCaracteristicas);
    row.cells[9].textContent = "";
    row.cells[9].appendChild(inputEndereco);
    row.cells[10].textContent = "";
    row.cells[10].appendChild(inputHistoria);

    // Altere o botão "Editar" para "Salvar" e atribua uma nova função
    button.textContent = "Salvar";
    button.removeEventListener("click", editarAnimal);
    button.addEventListener("click", salvarEdicao);
  }

  function salvarEdicao(event) {
    var button = event.target;
    var row = button.parentNode.parentNode;

    // Obtenha os valores atualizados dos campos
    var nomeResponsavel = row.cells[1].querySelector("input").value;
    var sexo = row.cells[2].querySelector("input").value;
    var especie = row.cells[3].querySelector("input").value;
    var raca = row.cells[4].querySelector("input").value;
    var idade = row.cells[5].querySelector("input").value;
    var porte = row.cells[6].querySelector("input").value;
    var nomePet = row.cells[7].querySelector("input").value;
    var caracteristicas = row.cells[8].querySelector("input").value;
    var endereco = row.cells[9].querySelector("input").value;
    var historia = row.cells[10].querySelector("input").value;

    // Atualize as células da linha com os valores atualizados
    row.cells[1].textContent = nomeResponsavel;
    row.cells[2].textContent = sexo;
    row.cells[3].textContent = especie;
    row.cells[4].textContent = raca;
    row.cells[5].textContent = idade;
    row.cells[6].textContent = porte;
    row.cells[7].textContent = nomePet;
    row.cells[8].textContent = caracteristicas;
    row.cells[9].textContent = endereco;
    row.cells[10].textContent = historia;

    // Altere o botão "Salvar" de volta para "Editar" e atribua a função editarAnimal
    button.textContent = "Editar";
    button.removeEventListener("click", salvarEdicao);
    button.addEventListener("click", editarAnimal);
  }

  var editButtons = document.querySelectorAll(".edit-btn");
  editButtons.forEach(function(button) {
    button.addEventListener("click", editarAnimal);
  });


  function excluirLinha(event) {
    var confirmation = confirm("Tem certeza que deseja excluir esta linha? os dados serão apagados permanentemente.");
    if (confirmation) {
      var button = event.target;
      var row = button.closest("tr");
  
      // Remove a linha da tabela
      row.parentNode.removeChild(row);
    }
  }
  
  var deleteButtons = document.querySelectorAll(".delete-btn");
  deleteButtons.forEach(function(button) {
    button.addEventListener("click", excluirLinha);
  });
  
// Obtém todos os botões "Aceitar Solicitação"
const acceptButtons = document.querySelectorAll('.animais_pendentes .accept-btn');

// Adiciona o evento de clique a cada botão
acceptButtons.forEach(button => {
  button.addEventListener('click', function() {
    // Exibe uma mensagem de confirmação ao usuário
    const confirmResult = confirm('Tem certeza que deseja aceitar essa solicitação?');

    // Se o usuário confirmar a ação
    if (confirmResult) {
      // Obtém a linha (tr) que contém o botão clicado
      const row = this.closest('tr');

      // Substitui a classe dos botões para "edit-btn" e "delete-btn"
      const editButton = row.querySelector('.accept-btn');
      editButton.classList.remove('accept-btn');
      editButton.classList.add('edit-btn');
      editButton.textContent = 'Editar';

      const deleteButton = row.querySelector('.reject-btn');
      deleteButton.classList.remove('reject-btn');
      deleteButton.classList.add('delete-btn');
      deleteButton.textContent = 'Excluir';

      // Move a linha da tabela de animais pendentes para a tabela de animais divulgados
      const divulgadosTable = document.querySelector('.animais_divulgados tbody');
      divulgadosTable.appendChild(row);
    }
  });
});
// Seleciona todos os botões de recusar solicitação
const rejectButtons = document.querySelectorAll(".reject-btn");

// Função para excluir a linha quando o botão "Recusar Solicitação" for clicado
function excluirLinha() {
  // Obtém a linha atual
  const linha = this.parentNode.parentNode;

  // Confirmação do usuário
  const confirmacao = confirm("Tem certeza que deseja recusar essa solicitação?");

  if (confirmacao) {
    // Remove a linha da tabela
    linha.remove();
  }
}

// Adiciona um event listener a cada botão de recusar solicitação
rejectButtons.forEach((button) => {
  button.addEventListener("click", excluirLinha);
});




// Simulando uma lista de usuários registrados
const usuariosRegistrados = [
  {
    id: 1,
    nome: "João Silva",
    email: "joao@example.com",
    telefone: "(00) 1234-5678"
  },
  {
    id: 2,
    nome: "Maria Souza",
    email: "maria@example.com",
    telefone: "(00) 9876-5432"
  }
];

// Atualiza a lista de usuários
const listaUsuarios = document.getElementById("lista-usuarios").getElementsByTagName("tbody")[0];
usuariosRegistrados.forEach((usuario) => {
  const row = listaUsuarios.insertRow();
  const cell = row.insertCell();
  cell.textContent = usuario.nome;
  cell.addEventListener("click", () => {
    exibirPerfilUsuario(usuario);
  });
});

// Função para exibir o perfil do usuário selecionado
function exibirPerfilUsuario(usuario) {
  document.getElementById("nome").textContent = usuario.nome;
  document.getElementById("email").textContent = usuario.email;
  document.getElementById("telefone").textContent = usuario.telefone;

  // Exibe o perfil do usuário e oculta a lista de usuários
  document.getElementById("usuarios").style.display = "none";
  document.getElementById("perfil-usuario").style.display = "block";
}

// Botão de voltar
const btnVoltar = document.getElementById("btn-voltar");
btnVoltar.addEventListener("click", () => {
  document.getElementById("perfil-usuario").style.display = "none";
  document.getElementById("usuarios").style.display = "block";
});


