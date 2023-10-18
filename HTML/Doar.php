<?php

// Start session
if (!session_id()) {
  session_start();
}
require_once "../dados.php";

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">


  <title>Pet Space</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/javascript" src="../JS/Doar.js"></script>




  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <link rel="stylesheet" href="../CSS/Doar.css">



</head>

<body>

  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid" style="margin-top: 10px;">
      <!-- <a class="navbar-brand">Bem vindo ao Painel de Controle </a> -->

      <div class="d-flex">

        <a href="../HTML/Adm1.php" class="btn" style="color: #000; background-color: #90EE90; margin-right: 25px;">Voltar</a>
      </div>
    </div>
  </nav>

  <?php
    if (isset($_SESSION['mensagem_sucesso'])) {
        echo '<div id="sucesso">' . $_SESSION['mensagem_sucesso'] . '</div>';
        unset($_SESSION['mensagem_sucesso']); // Limpe a mensagem para que ela não seja exibida novamente na atualização da página.
    }
?>


  <div id='msgSuccess'></div>
              <div id='msgError'></div>

  <div class="forms" style="margin: 25px 25px 25px 25px; padding-top: 25px;">
    <form method="POST" action="../HTML/Doar_insert.php" enctype="multipart/form-data">


      <label for="nome_pet" style="font-size: 20px;">Nome do Pet:</label>
      <input type="text" id="nome_pet" name="nome_pet" placeholder="Ex: Atenas" required><br>

     

      <label for="sexo" style="font-size: 20px;">Sexo:</label>
<select id="sexo" name="sexo" style="font-size: 15px; padding-top: 10px;" required>
    <option value="" disabled selected>Ex: Fêmea</option>
    <option value="Macho">Macho</option>
    <option value="Fêmea">Fêmea</option>
</select>





      <label for="especie" style="font-size: 20px;">Espécie:</label>
      <input type="text" id="especie" name="especie" placeholder="Ex: Cachorro" required>


      <label for="raca" style="font-size: 20px;">Raça:</label>
      <input type="text" id="raca" name="raca" placeholder="Ex: Border Collie" required>


      <label for="labelidade" style="font-size: 20px;">Idade:   </label>
      <input type="text" id="idade" name="idade" min="0" placeholder="Ex: 6 Meses " required><br>
      <span id="idadeErro" style="color: red;"></span>


      <label for="porte" style="font-size: 20px;">Porte:</label>
      <select id="porte" name="porte" style="font-size: 16px; padding-top: 10px;" required>
      <option value="" disabled selected>Ex: Pequeno</option>
    <option value="Pequeno">Pequeno</option>
    <option value="Médio">Médio</option>
    <option value="Grande">Grande</option>
</select>


      <div class="custom-file">
        <input type="file" class="custom-file-input" name="imagem" id="imagem" required>
        <label class="custom-file-label" for="imagem">Escolha um arquivo</label>
      </div>


      <input type="submit" class="btn btn-success btn-lg" name="submit" onclick="entrar()"
      value="Enviar" style="margin-top: 50px;">

    </form>


  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script src="../Doar.js"></script>

</body>

</html>