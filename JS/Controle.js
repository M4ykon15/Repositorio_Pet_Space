const editButtons = document.querySelectorAll('.edit-btn');
const deleteButtons = document.querySelectorAll('.delete-btn');

const pets = [
  {
    COD_PET: "001",
    COD_ADOT: "1001",
    SEXO: "Macho",
    ESPECIE: "Cachorro",
    RACA: "Poodle",
    IDADE: "3 anos",
    PORTE: "Pequeno",
    NOME_PET: "Max",
    CARACTERISTICAS: "Docíl, Vive bem em apartamento",
    ENDERECO: "Rua A, 123"
  },
  {
    COD_PET: "002",
    COD_ADOT: "1002",
    SEXO: "Fêmea",
    ESPECIE: "Gato",
    RACA: "Siamês",
    IDADE: "2 anos",
    PORTE: "Pequeno",
    NOME_PET: "Luna",
    CARACTERISTICAS: "Brincalhão, Sociável",
    ENDERECO: "Rua B, 456"
  },
  {
    COD_PET: "003",
    COD_ADOT: "1003",
    SEXO: "Macho",
    ESPECIE: "Cachorro",
    RACA: "Labrador",
    IDADE: "1 ano",
    PORTE: "Grande",
    NOME_PET: "Bobby",
    CARACTERISTICAS: "Calmo, Gosta de crianças",
    ENDERECO: "Rua C, 789"
  }
];

// Função para criar as linhas da tabela com os dados dos pets
function createPetRows() {
  const tableBody = document.createElement("tbody");
  pets.forEach((pet, index) => {
    const row = document.createElement("tr");
    
    Object.keys(pet).forEach(key => {
      const cell = document.createElement("td");
      cell.textContent = pet[key];
      row.appendChild(cell);
    });

    const editCell = document.createElement("td");
    const editButton = document.createElement("button");
    editButton.textContent = "Editar";
    editButton.classList.add("edit-btn");
    editButton.addEventListener("click", () => {
      editPet(index);
    });
    editCell.appendChild(editButton);
    row.appendChild(editCell);

    const deleteCell = document.createElement("td");
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Excluir";
    deleteButton.classList.add("delete-btn");
    deleteButton.addEventListener("click", () => {
      deletePet(index);
    });
    deleteCell.appendChild(deleteButton);
    row.appendChild(deleteCell);

    tableBody.appendChild(row);
  });

  const petTable = document.getElementById("pet-table");
  petTable.appendChild(tableBody);
}

// Função para editar um pet


// Função para excluir um pet
function deletePet(index) {
  // Lógica para excluir um pet
  console.log("Excluir pet de índice:", index);
}

// Chamada da função para criar as linhas da tabela
createPetRows();
// Adicione o código para lidar com a edição e exclusão aqui

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

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
document.getElementById('formato').addEventListener('submit', function(event) {
  event.preventDefault(); // impede o envio do formulário

  // Obtém os valores dos campos do formulário
  var nomePet = document.getElementById('nome_pet').value;
  var sexo = document.getElementById('sexo').value;
  var especie = document.getElementById('especie').value;
  var raca = document.getElementById('raca').value;
  var idade = document.getElementById('idade').value;
  var porte = document.getElementById('porte').value;
  var caracteristicas = Array.from(document.querySelectorAll('input[name="caracteristicas[]"]:checked')).map(function(element) {
    return element.value;
  });
  var endereco = document.getElementById('endereco').value;

  // Cria uma nova linha na tabela com os valores do formulário
  var tabela = document.querySelector('#tabela-dados tbody');
  var novaLinha = tabela.insertRow();
  novaLinha.innerHTML = `
    <td><img src="#" alt="Foto"></td>
    <td>${sexo}</td>
    <td>${especie}</td>
    <td>${raca}</td>
    <td>${idade}</td>
    <td>${porte}</td>
    <td>${nomePet}</td>
    <td>${caracteristicas.join(', ')}</td>
    <td>${endereco}</td>
    <td>Pendente</td>
    <td>
      <button class="edit-btn">Editar</button>
      <button class="delete-btn">Excluir</button>
    </td>
  `;

  // Limpa os campos do formulário após adicionar na tabela
  document.getElementById('formato').reset();
});

function exibirRacas() {
  var especieSelecionada = document.getElementById("especie").value;
  var racaSelect = document.getElementById("raca");

  // Limpar as opções existentes
  racaSelect.innerHTML = "";

  // Adicionar as opções de raças de acordo com a espécie selecionada
  if (especieSelecionada === "cachorro") {
    var racasCachorro = ["Labrador Retriever",
      "Pastor Alemão",
     "Bulldog Francês",
      "Golden Retriever",
      "Beagle",
      "Poodle",
      "Boxer",
      "Rottweiler",
      "Yorkshire Terrier",
      "Dachshund (Teckel)",
      "Border Collie",
      "Schnauzer",
      "Chihuahua",
      "Bichon Frisé",
      "Husky Siberiano",
      "Doberman Pinscher",
      "Shih Tzu",
      "Cavalier King Charles Spaniel",
      "Bulldog Inglês",
      "Maltese",
      "Pug",
      "Staffordshire Bull Terrier",
      "Great Dane",
      "Cocker Spaniel",
      "Australian Shepherd",
      "Bernese Mountain Dog",
      "Boston Terrier",
      "West Highland White Terrier",
      "Scottish Terrier",
      "Newfoundland",
    "Outro" ]; // Exemplo de raças de cachorros

    for (var i = 0; i < racasCachorro.length; i++) {
      var option = document.createElement("option");
      option.text = racasCachorro[i];
      racaSelect.add(option);
    }
  } else if (especieSelecionada === "gato") {
    var racasGato = ["Siamês",
      "Persa",
      "Maine Coon",
      "Ragdoll",
      "Bengal",
      "British Shorthair",
      "Sphynx",
      "Exotic Shorthair",
      "Abissínio",
      "Scottish Fold (Dobra Escocesa)",
     " Siamese Oriental (Oriental de Pelo Curto)",
     " Birmanês",
     " Himalaio",
      "Devon Rex",
      "Azul Russo",
      "Savannah",
     " Tonquinês",
      "Maine Coon",
    "Outro"]; // Exemplo de raças de gatos

    for (var i = 0; i < racasGato.length; i++) {
      var option = document.createElement("option");
      option.text = racasGato[i];
      racaSelect.add(option);
    }
  }
}