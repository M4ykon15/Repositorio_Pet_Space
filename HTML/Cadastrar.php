 <?php

if(isset($_POST['submit'])){

    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];
    $telefone = $_POST ['telefone'];
    $cpf = $_POST ['cpf'];

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server= $serverName; Database = $databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (preg_match('/^.{5,}@(gmail\.com|outlook\.com\.br|yahoo\.com\.br)$/', $email)) {
            $sql = "INSERT INTO usuarios (nome, email, senha, telefone, cpf) VALUES (:nome, :email, :senha, :telefone, :cpf)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            header('Location: ../HTML/Login.php');
        } else {
            header('Location: ../HTML/Cadastrar.php');
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

?>




<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">
    
    
 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     
     

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
    <link rel="stylesheet" href="../CSS/Cadastrar.css">

    <title>Pet Space</title>

</head>
  <body> 
    <div class="principal">


         <div class="div1">
            <a href="../HTML/PetSpace.php">
              <img id="img1" src="../Imagens/voltar.png">
              
            </a>
           </div>


  
           
           
          
         
       
         
        
            <div class='card'>
            
              <h1> CADASTRAR </h1>
              
              
              <div id='msgSuccess'></div>
              
              <form method="POST" action="">
                      <div class="label-float">
                         <input class="texto" type="text" name="nome" id="nome" placeholder=" " required>
                         <label class="letra" id="labelNome" for="nome">Nome</label>
                      </div>
          
                      <div class="label-float">
                         <input class="texto" type="text" name="email" id="email" placeholder=" " required>
                         <label class="letra" id="labelEmail" for="email">Email</label>
                      </div>

                      
                      <div class="label-float">
                        <input class="texto" type="password" name="senha"  id="senha" placeholder=" " required>
                        <label class="letra" id="labelSenha" for="senha">Senha</label>
                        <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
                      </div>


                      <div class="label-float">
                        <input class="texto" type="tel" name ="telefone" id="telefone" placeholder=" " required>
                        <label class="letra" id="labelTelefone" for="telefone">Telefone</label>
                      </div>
                      
                     
                      

                      <div class="label-float">
                        <input class="texto" type="text" name="cpf" id="cpf" placeholder=" " required>
                        <label class="letra" id="labelCpf" for="cpf">CPF</label>
                     </div>

                     <div class="label-float" style="display: none;">
                        <input disabled value="0"  class="texto" type="text" name="nivel_acesso" id="nivel_acesso" placeholder=" " required>
                        <label class="letra" id="labelAcesso" for="Acesso">Acesso</label>
                     </div>
                    
                      
                      <div class='justify-center'>
                         <button onclick='cadastrar()' name ="submit">Cadastrar</button>
                      </div>
                    
                    </form>

                      <div class='justify-center'>
                        <hr>
                      </div>


                      <p> Já possui login?
                        <a href='../HTML/Login.php' style ="">Clique aqui  </a>
                      </p>
          
              
            </div>
    </div>

            <script src="../JS/Cadastrar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            
      
    

</body>
</html>