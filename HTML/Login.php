<?php

if(isset($_POST['submit'])){

  // print_r($_POST['email']);
  // print_r('<br>');
  // print_r($_POST['senha']);

 include_once('../dados.php');

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $result = mysqli_query($conexao, "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')");

  if (strlen($email) == 5 && substr($email, -10) === '@gmail.com' && strlen($senha) == 6) {
    // Redirecionar para a página PetSpace.html
    header("Location: PetSpace.html");
    exit();
  }
 
  else if ($email == 'email@especial.com' && $senha == 'senhaespecial') {
    // Redirecionar para a página ADM.html
    header("Location: ADM.html");
    exit();

  }  

}


?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="../CSS/Login.css">
        <title>Pet Space</title>
        <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        
        <body>
      
          <div class="div_1">
            <a href="../HTML/PetSpace.html">
              <img src="../Imagens/voltar.png">
              <button id="btn1"> Voltar para o início</button>
            </a>
           </div>

        <div class='container'>

        
          <div class='card'>
            <h1> LOGIN </h1>
            

            
            <div id='msgError'></div>
            <div id='msgSuccess'></div>
                    
            <form  method="POST" action="">

            <div class='label-float'>
              <input type='text' id='email' name="email" required>
              <label id='labelEmail' for='email'>Email</label>
            </div>
            
            <div class='label-float'>
              <input type='password' id='senha' name="senha" required>
              <label id='labelSenha' for='senha'>Senha</label>

              <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            
            <div class='justify-center'>
              <button id="btn" name ="submit" onclick='entrar()'>Entrar</button>
              
            </div>
            
            </form>

            <div class='justify-center'>
              <hr>
            </div>
            
            <p> Não possui uma conta?
              <a href='../HTML/Cadastrar.html'> Cadastre-se </a>
            </p>
            
          </div>
          </div>


        
          <script src="../JS/Login.js"></script>

        </body>


</html>