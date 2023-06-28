<?php
 session_start();
// print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($SESSION['senha']) == true))
{
  
  unset($_SESSION['email']);
    unset($_SESSION['senha']);
  header('Location : Login.php');
}
  $logado = $_SESSION['email'];
  
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
       
        
      
        <div id="usuarios">
    <h2 >Usuários Registrados</h2>
    <table id="lista-usuarios">
      <tbody>
        <!-- Os usuários serão adicionados dinamicamente aqui -->
      </tbody>
    </table>
  </div>

  <div id="perfil-usuario">
    <h2>Perfil do Usuário</h2>
    <table>
      <tr>
        <td><strong>Nome:</strong></td>
        <td><span id="nome"></span></td>
      </tr>
      <tr>
        <td><strong>E-mail:</strong></td>
        <td><span id="email"></span></td>
      </tr>
      <tr>
        <td><strong>Telefone:</strong></td>
        <td><span id="telefone"></span></td>
      </tr>
    </table>

    <button id="btn-voltar">Voltar</button>
  </div>
  

        
    <script src="../JS/ADM.js"></script>
</body>
</html>
