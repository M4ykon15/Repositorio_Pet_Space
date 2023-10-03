<!DOCTYPE html>
<html lang="pt-br">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pet Space</title>

   
    

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        
       
     
        <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">
       
        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        

        <link rel="stylesheet" href="../CSS/Login.css">
        </head>
        
        
      <body>
      
   
          <div class="div_1">
            <a href="../HTML/PetSpace.php">
              <img src="../Imagens/voltar.png">
              
            </a>
           </div>

        <div class='container' style="margin-left: 15%;">


       
          <div class='card' style="margin-left: 40%;">
            <h1> LOGIN </h1>
            
            <div id='msgSuccess'></div>
              <div id='msgError'></div>
                    
            <form  method="POST" action="../HTML/testLogin.php">

            <div class='label-float'>
            <svg xmlns="http://www.w3.org/2000/svg" id="iconnome"  width="16" heigth="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
    </svg>  
              <input type='text' id='email' name="email" required>
              <label id='labelEmail' for='email'>Email</label>
            </div>
            
            <div class="label-float">
              <input type="password" id="senha" name="senha" placeholder=" " required>
                <label class="letra" id="labelSenha" for="senha">Senha</label>
                 <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
            </div>
            
            <div class='justify-center'>
              <button id="btn" name ="submit" onclick='entrar()'>Entrar</button>
              
            </div>
            
            </form>

            <div class='justify-center'>
              <hr>
            </div>
            
            <p> Não possui uma conta?
              <a href='../HTML/Cadastrar.php'> Cadastre-se </a>
            </p>
            
          </div>
          </div>


        
          
        
          <script src="../JS/Login.js"></script>
        </body>
</html>