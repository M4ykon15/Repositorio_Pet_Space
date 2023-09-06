



<?php
include_once('../dados.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlSelect = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $conn->prepare($sqlSelect);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $nome = $row['nome'];
            $email = $row['email'];
            $senha = $row['senha'];
            $telefone = $row['telefone'];
            $cpf = $row['cpf'];
        } else {
            header('Location: ../HTML/ADM.php');
            exit;
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
} else {
    header('Location: ../HTML/ADM.php');
    exit;
}
?>




<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">
    
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Edit.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Edit.css">
    <title>Pet Space</title>

</head>
  <body style="background-color: gray"> 
    <div class="principal">

       
    <div class="div1">
            <a href="../HTML/ADM.php">
              <img id="img1" src="../Imagens/voltar.png">
              
            </a>
           </div>
      


         <div class='container'>
          <!-- <div id='msgError'></div> -->


          


            <div class='card'>
              <h2> Editar usuário </h2>
              
              
              <!-- <div id='msgSuccess'></div> -->
              
              <form method="POST" action="../saveEdit.php">
                      <div class="label-float">
                         <input class="texto" type="text" name="nome" id="nome"  value="<?php echo $nome ?>"   placeholder=" " required>
                         <label class="letra" id="labelNome" for="nome">Nome</label>
                      </div>
          
                      <div class="label-float">
                         <input class="texto" type="text" name="email" id="email"  value="<?php echo $email ?>" placeholder=" " required>
                         <label class="letra" id="labelEmail" for="email">Email</label>
                      </div>

                      
                      <div class="label-float">
                        <input class="texto" type="password" name="senha" value="<?php echo $senha ?>" id="senha" placeholder=" " required>
                        <label class="letra" id="labelSenha" for="senha">Senha</label>
                        <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
                      </div>


                      <div class="label-float">
                        <input class="texto" type="tel" name ="telefone"  value="<?php echo $telefone ?>"
                        id="telefone" placeholder=" " required>
                        <label class="letra" id="labelTelefone" for="telefone">Telefone</label>
                      </div>
                      
                     
                      

                      <div class="label-float">
                        <input class="texto" type="text" name="cpf" value="<?php echo $cpf ?>"
                        id="cpf" placeholder=" " required>
                        <label class="letra" id="labelCpf" for="cpf">CPF</label>
                     </div>
                     
                     
                    
                      
                      <div class='justify-center'>
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                         <button type="submit" name ="update" id="update">Salvar</button>
                      </div>
                    
                    </form>
            
            </div>

            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../JS/Cadastrar.js"></script>

</body>
</html>