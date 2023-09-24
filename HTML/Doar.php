<?php

include_once('../dados.php');

$nome_pet = $_POST['nome_pet'];
$sexo = $_POST['sexo'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$idade = $_POST['idade'];
$porte = $_POST['porte'];

if (isset($_POST['submit'])) {


    try {
        // Estabeleça a conexão com o banco de dados
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
        $imagem = file_get_contents($_FILES['foto']['tmp_name']);

        $array = array($imagem);
        // Prepare uma consulta SQL para inserir os bytes no banco de dados
        $sqlA = "INSERT INTO animais (nome_pet, sexo, especie, raca, idade, porte, foto) VALUES (:nome_pet, :sexo, :especie, :raca, :idade, :porte, CONVERT(varbinary(max), :foto))";
        $stmtA = $conn->prepare($sqlA);
        $stmtA->bindParam(':nome_pet', $nome_pet);
        $stmtA->bindParam(':sexo', $sexo);
        $stmtA->bindParam(':especie', $especie);
        $stmtA->bindParam(':raca', $raca);
        $stmtA->bindParam(':idade', $idade);
        $stmtA->bindParam(':porte', $porte);
        $stmtA->bindParam(':foto', $array); 

        // Execute a consulta SQL
        $stmtA->execute();
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }

         header("Location: ../HTML/Adm1.php");
         exit();
    } else {
        echo "Erro no envio do arquivo ou tipo de arquivo não suportado.";
    }

?>







