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

        $sqlSelect = "SELECT * FROM animais WHERE id = :id";
        $stmt = $conn->prepare($sqlSelect);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $nome_pet = $row['nome_pet'];
            $sexo = $row['sexo'];
            $especie = $row['especie'];
            $raca = $row['raca'];
            $idade = $row['idade'];
            $porte = $row['porte'];
            $imagem = $row['imagem']; // Adicione essa linha para recuperar a imagem


        } else {
            header('Location: ../HTML/Adm1.php');
            exit;
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
} else {
    header('Location: ../HTML/Adm1.php');
    exit;
}
?>





<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">


    <title>Pet Space</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/javascript" src="../JS/Doar.js"></script>
  



  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <link rel="stylesheet" href="../CSS/Doar.css">



</head>

  <body>
  
  <nav class="navbar bg-body-tertiary" >
  <div class="container-fluid" style="margin-top: 10px;">
    <!-- <a class="navbar-brand">Bem vindo ao Painel de Controle </a> -->
    
    <div class ="d-flex">
      
      <a href="../HTML/Adm1.php" class="btn" style="color: #000; background-color: #90EE90; margin-right: 25px;">Voltar</a>
    </div>
  </div>
</nav>
    


    <div class="forms" style="margin: 25px 25px 25px 25px; padding-top: 25px;">
    <form method="POST" action="../saveEditA.php" enctype="multipart/form-data">

  
      <label for="nome_pet" style="font-size: 20px;">Nome do Pet:</label>
      <input type="text" id="nome_pet" name="nome_pet" value="<?php echo $nome_pet?>" required><br>
  
       <label for="sexo" style="font-size: 20px;">Sexo:</label> 
      <select id="sexo" name="sexo" style="font-size: 15px; padding-top: 10px;" required>
    <option value="" disabled selected><?php echo $sexo?></option>
    <option value="Macho">Macho</option>
    <option value="Fêmea">Fêmea</option>
</select>



   
      <label for="especie"style="font-size: 20px;">Espécie:</label>
      <input type="text"   id="especie" name="especie"  value="<?php echo $especie?>" required>
        
  
      <label for="raca"style="font-size: 20px;">Raça:</label>
      <input type="text" id="raca" name="raca" value="<?php echo $raca?>"   required>
        
   
      <label for="idade" style="font-size: 20px;">Idade:</label>
      <input type="text" id="idade" name="idade" min="0"  value="<?php echo $idade?>"   required><br>

   
      <label for="porte" style="font-size: 20px;">Porte:</label>
      <select id="porte" name="porte" style="font-size: 16px; padding-top: 10px;" required>
      <option value="" disabled selected><?php echo $porte ?></option>
    <option value="Pequeno">Pequeno</option>
    <option value="Médio">Médio</option>
    <option value="Grande">Grande</option>
</select>
   
     

<div class="custom-file">
        <input type="file" class="custom-file-input" name="imagem" id="imagem">
        <label class="custom-file-label" for="imagem">Escolha um arquivo</label>
      </div>

      <!-- <?php
       
        try {
            // Cria uma nova conexão PDO
            $query = "SELECT id,
                      imagem
                  FROM animais";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loop através dos resultados e exiba os cards com Bootstrap
            // Defina a largura e a altura desejadas fora do loop
$imgWidth = 240;
$imgHeight = 200;

foreach ($results as $row) {
    echo '<div class="card">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="' . '" class="img-fluid" style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px; margin-top: 10px; border-radius: 20px;">';
    echo '</div>';
  }
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?> -->

<?php
            // Exibir a imagem atual do animal, se houver
            if (!empty($imagem)) {
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imagem) . '" alt="Imagem do Animal Atual" class="img-fluid" style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px; margin-top: 10px; border-radius: 20px;">';
                echo '</div>';
            }
            ?>

<div class='justify-center'>
 <input type="hidden" name="id" value="<?php echo $id ?>">
<button type="submit" class="btn btn-success btn-lg" name="update" id="update"   style="margin-top: 50px;">Enviar</button>

    </form>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

</body>
</html>