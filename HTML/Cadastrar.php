 
<?php

if(isset($_POST['submit'])) {
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];
    $telefone = $_POST ['telefone'];
    $cpf = $_POST ['cpf'];
    $nivel = 1;

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server= $serverName; Database = $databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o CPF já existe no banco de dados
        $sqlCheckCPF = "SELECT cpf FROM usuarios WHERE cpf = :cpf";
        $stmtCheckCPF = $conn->prepare($sqlCheckCPF);
        $stmtCheckCPF->bindParam(':cpf', $cpf);
        $stmtCheckCPF->execute();
        $cpfExists = $stmtCheckCPF->fetch(PDO::FETCH_ASSOC);

        // Verificar se o email já existe no banco de dados
        $sqlCheckEmail = "SELECT email FROM usuarios WHERE email = :email";
        $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
        $stmtCheckEmail->bindParam(':email', $email);
        $stmtCheckEmail->execute();
        $emailExists = $stmtCheckEmail->fetch(PDO::FETCH_ASSOC);

        // Verificar se o telefone já existe no banco de dados
        $sqlCheckTelefone = "SELECT telefone FROM usuarios WHERE telefone = :telefone";
        $stmtCheckTelefone = $conn->prepare($sqlCheckTelefone);
        $stmtCheckTelefone->bindParam(':telefone', $telefone);
        $stmtCheckTelefone->execute();
        $telefoneExists = $stmtCheckTelefone->fetch(PDO::FETCH_ASSOC);

        if (!$cpfExists && !$emailExists && !$telefoneExists) {
            // Nenhum dos dados existe no banco, pode inserir
            $sql = "INSERT INTO usuarios (nome, email, senha, telefone, cpf, nivel_acesso) VALUES (:nome, :email, :senha, :telefone, :cpf, :nivel_acesso)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nivel_acesso', $nivel);
            $stmt->execute();
            header('Location: ../HTML/Login.php');
        } else {
            // Pelo menos um dos dados já existe, redirecione para a tela de cadastro
            header('Location: ../HTML/Cadastrar.php');
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

?>





<!doctype html>
<html lang="pt-br" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">
    
    
 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     
     

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
    <link rel="stylesheet" href="../CSS/Cadastrar.css">

    <title>Pet Space</title>

</head>
  <body style="position: absolute;"> 



  <div class="div1" style="width: 10px; position: absolute;">
            <a href="../HTML/PetSpace.php">
              <img id="img1" src="../Imagens/voltar.png">
              
            </a>
          </div>
         

    
    
          

         
   
   
        
            <div class='card' style="height: 580px; margin-left: 500px; position: absolute; margin-top: 100px;">

            


              <h1> CADASTRAR </h1>
              
              
              <div id='msgSuccess'></div>
              <div id='msgError'></div>
              
              <form method="POST" action="">
                       
              <div class="label-float">
    <svg xmlns="http://www.w3.org/2000/svg" id="iconnome"  width="16" heigth="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
    </svg>   
    <input class="texto" type="text" name="nome" id="nome" placeholder=" " required>
    <label class="letra" id="labelNome" for="nome">Nome</label>
</div>

          
                      <div class="label-float">
                      <svg xmlns="http://www.w3.org/2000/svg" id="iconemail"  width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg>
                         <input class="texto" type="text" name="email" id="email" placeholder=" " required>
                         <label class="letra" id="labelEmail" for="email">Email</label>
                      </div>

                      
                      <div class="label-float">
                      
                        <input class="texto" type="password" name="senha"  id="senha" placeholder=" " required>
                        <label class="letra" id="labelSenha" for="senha">Senha</label>
                        <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
                      </div>


                      <div class="label-float">
                      <svg xmlns="http://www.w3.org/2000/svg" id="icontel"  width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
                        <input class="texto" type="tel" name ="telefone" id="telefone" placeholder=" " required>
                        <label class="letra" id="labelTelefone" for="telefone">Telefone</label>
                      </div>
                      
                     
                      

                      <div class="label-float">
                        <img id="cpficon" src="../Imagens/contact_96967.png" />
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
   

            <script src="../JS/Cadastrar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            
      
    

</body>
</html>