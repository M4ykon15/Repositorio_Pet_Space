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
    
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    
    
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
    

<a href="../HTML/Doar.php" class="btn" style="background-color: #90EE90 ;color: #000000; font: size 10px; margin-left: 20px;margin-top: 25px;">Cadastrar pets</a>


<h4 style="margin-top: 20px; margin-bottom: -20px; margin-left: 25px">Usúarios:</h4>
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


<h4 style="margin-top: 20px; margin-bottom: -20px; margin-left: 25px">Animais:</h4>
    <div class="m-5 ">
  <table class="table table-bg">
    <thead>
      <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Pet</th>
            <th scope="col">Sexo</th>
            <th scope="col">Espécie</th>
            <th scope="col">Raça</th>
            <th scope="col">Idade</th>
            <th scope="col">Porte</th>
            <th scope="col">Características</th>
        </tr>
    </thead>
    <tbody>
      
<tr>
         <td>1</td>
         <td>Thor</td>
         <td>Macho</td>
         <td>Cachorro</td>
         <td>Russill</td>
         <td>1 ano</td>
         <td> Pequeno</td>
         <td>Dócil, Brincalhão e Sociavel</td></tr>

         <tr>
         <td>1</td>
         <td>Thor</td>
         <td>Macho</td>
         <td>Cachorro</td>
         <td>Russill</td>
         <td>1 ano</td>
         <td> Pequeno</td>
         <td>Dócil, Brincalhão e Sociavel</td></tr>

         <tr>
         <td>1</td>
         <td>Thor</td>
         <td>Macho</td>
         <td>Cachorro</td>
         <td>Russill</td>
         <td>1 ano</td>
         <td> Pequeno</td>
         <td>Dócil, Brincalhão e Sociavel</td></tr>

         <tr>
         <td>1</td>
         <td>Thor</td>
         <td>Macho</td>
         <td>Cachorro</td>
         <td>Russill</td>
         <td>1 ano</td>
         <td> Pequeno</td>
         <td>Dócil, Brincalhão e Sociavel</td></tr>

         <tr>
         <td>1</td>
         <td>Thor</td>
         <td>Macho</td>
         <td>Cachorro</td>
         <td>Russill</td>
         <td>1 ano</td>
         <td> Pequeno</td>
         <td>Dócil, Brincalhão e Sociavel</td></tr>


      
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
 
        
      

    </tbody>
  </table>
</div>

    

       
        
      
        

  
  

        
    <script src="../JS/ADM.js"></script>
</body>
</html>
