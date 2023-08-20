<?php
 session_start();
// print_r($_SESSION);
include_once('../dados.php');


if((!isset($_SESSION['email']) == true) and (!isset($SESSION['senha']) == true))
{
  
  unset($_SESSION['email']);
    unset($_SESSION['senha']);
  header('Location : Login.php');
}
  $logado = $_SESSION['email'];
  

  $sql = "SELECT * FROM usuarios ORDER BY id ASC";

  $result = $conexao -> query($sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">

    
    <title>Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/ADM.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand">Bem vindo ao Painel de Controle </a> -->
    <?php
       echo"<h4> Bem Vindo, $logado</h4>";
        
    ?>
    
    <div class ="d-flex">
      <a href="../sair.php" class="btn btn-danger">Sair</a>
    </div>
  </div>
</nav>
    
  
<div class="m-5 ">
  <table class="table table-bg">
    <thead>
      <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Telefone</th>
            <th scope="col">CPF</th>
            <th scope="col">.</th>
        </tr>
    </thead>
    <tbody>
      
      <?php
        while($user_data = mysqli_fetch_assoc($result))
        {

          echo "<tr>";
          echo "<td>" .$user_data['id']."</td>";
          echo "<td>" .$user_data['nome']."</td>";
          echo "<td>" .$user_data['email']."</td>";
          echo "<td>" .$user_data['senha']."</td>";
          echo "<td>" .$user_data['telefone']."</td>";
          echo "<td>" .$user_data['cpf']."</td>";
          echo "<td>
          <a class='btn btn-sm btn-primary' href='../HTML/EditarUsuario.php?id=$user_data[id]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          
  
  </svg> 
          </a>
          <a class='btn btn-sm btn-danger' href='../delete.php?id=$user_data[id]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
        </a>
          </td>";
          echo "<tr>";
        }
      ?>

    </tbody>
  </table>
</div>



    <div id="estatisticas">
        <h2>Estatísticas</h2>
        <ul>
            <li>Animais divulgados: <span id="adoptions">0</span></li>
            <li>Solicitações pendentes (Doações): <span id="requests">0</span></li>
            <li>Solicitações pendentes (Parcerias) <span id="requestsp">0</span></li>
        </ul>
    </div>

    

        <div style="text-align: center; background-color: snow;">
          <h1>Animais divulgados</h1>
        </div>
        
        <table class="animais_divulgados">
          <thead>
            <tr>
              <th>FOTO</th>
              <th>NOME DO RESPONSÁVEL</th>
              <th>SEXO</th>
              <th>ESPÉCIE</th>
              <th>RAÇA</th>
              <th>IDADE</th>
              <th>PORTE</th>
              <th>NOME DO PET</th>
              <th>CARACTERÍSTICAS</th>
              <th>REGIAO</th>
              <th>HISTÓRIA</th>
              <th>AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="../Imagens/dog_5.webp" alt="Foto do animal"></td>
              <td>João</td>
              <td>Macho</td>
              <td>Cachorro</td>
              <td>Poodle</td>
              <td>3 anos</td>
              <td>Pequeno</td>
              <td>Max</td>
              <td>Docíl, Vive bem em apartamento</td>
              <td>Osasco</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/cat_1.webp" alt="Foto do animal"></td>
              <td>Maria</td>
              <td>Fêmea</td>
              <td>Gato</td>
              <td>Siamês</td>
              <td>2 anos</td>
              <td>Pequeno</td>
              <td>Luna</td>
              <td>Brincalhão, Sociável</td>
              <td>Barueri</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/dog_6.webp" alt="Foto do animal"></td>
              <td>Carlos</td>
              <td>Macho</td>
              <td>Cachorro</td>
              <td>Labrador</td>
              <td>1 ano</td>
              <td>Grande</td>
              <td>Bobby</td>
              <td>Calmo, Gosta de crianças</td>
              <td>Carapicuiba</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
              </td>
            </tr>
          </tbody>
        </table>
        
        <div style="text-align: center; background-color: snow;">
          <h1>Solicitações pendentes (Doações)</h1>
        </div>
        
        <table class="animais_pendentes">
          <thead>
            <tr>
              <th>FOTO</th>
              <th>NOME DO RESPONSÁVEL</th>
              <th>SEXO</th>
              <th>ESPÉCIE</th>
              <th>RAÇA</th>
              <th>IDADE</th>
              <th>PORTE</th>
              <th>NOME DO PET</th>
              <th>CARACTERÍSTICAS</th>
              <th>REGIAO</th>
              <th>HISTÓRIA</th>
              <th>AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="../Imagens/cat_3.jpg" alt="Foto do animal"></td>
              <td>Lucas</td>
              <td>Fêmea</td>
              <td>Gato</td>
              <td>Sphynx</td>
              <td>1 ano</td>
              <td>Pequeno</td>
              <td>Lola</td>
              <td>Curiosa, Independente</td>
              <td>Cotia</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="accept-btn">Aceitar Solicitação</button>
                <button class="reject-btn">Recusar Solicitação</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/dog_16.webp" alt="Foto do animal"></td>
              <td>Felipe</td>
              <td>Macho</td>
              <td>Cachorro</td>
              <td>Bulldog</td>
              <td>3 anos</td>
              <td>Grande</td>
              <td>Rex</td>
              <td>Leal, Protetor</td>
              <td>Embu das artes</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="accept-btn">Aceitar Solicitação</button>
                <button class="reject-btn">Recusar Solicitação</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/dog_11.jpeg" alt="Foto do animal"></td>
              <td>Ana</td>
              <td>Macho</td>
              <td>Cachorro</td>
              <td>Golden Retriever</td>
              <td>2 anos</td>
              <td>Médio</td>
              <td>Toby</td>
              <td>Ativo, Amigável</td>
              <td>Diadema</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="accept-btn">Aceitar Solicitação</button>
                <button class="reject-btn">Recusar Solicitação</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/cat_4.webp" alt="Foto do animal"></td>
              <td>Felipe</td>
              <td>Fêmea</td>
              <td>Gato</td>
              <td>Maine Coon</td>
              <td>4 anos</td>
              <td>Grande</td>
              <td>Bella</td>
              <td>Carinhosa, Sociável</td>
              <td>Barueri</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="accept-btn">Aceitar Solicitação</button>
                <button class="reject-btn">Recusar Solicitação</button>
              </td>
            </tr>
            <tr>
              <td><img src="../Imagens/cat_3.jpg" alt="Foto do animal"></td>
              <td>Pedro</td>
              <td>Fêmea</td>
              <td>Gato</td>
              <td>Siamês</td>
              <td>2 anos</td>
              <td>Pequeno</td>
              <td>Luna</td>
              <td>Brincalhão, Sociável</td>
              <td>Campinas</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
              <td>
                <button class="accept-btn">Aceitar Solicitação</button>
                <button class="reject-btn">Recusar Solicitação</button>
              </td>
            </tr>
          </tbody>
        </table>
       
        
      
        

  
  

        
    <script src="../JS/ADM.js"></script>
</body>
</html>
