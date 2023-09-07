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

        // Prepare uma consulta SQL para inserir os bytes no banco de dados
        $sqlA = "INSERT INTO animais (nome_pet, sexo, especie, raca, idade, porte, foto) VALUES (:nome_pet, :sexo, :especie, :raca, :idade, :porte, CONVERT(varbinary(max), :foto))";
        $stmtA = $conn->prepare($sqlA);
        $stmtA->bindParam(':nome_pet', $nome_pet);
        $stmtA->bindParam(':sexo', $sexo);
        $stmtA->bindParam(':especie', $especie);
        $stmtA->bindParam(':raca', $raca);
        $stmtA->bindParam(':idade', $idade);
        $stmtA->bindParam(':porte', $porte);
        $stmtA->bindParam(':foto', $arquivo_bytes, PDO::PARAM_LOB); 

        // Execute a consulta SQL
        $stmtA->execute();
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }

       


    // Verifique se o campo 'foto' foi enviado corretamente
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Recupere os dados do formulário
       
        // Caminho temporário do arquivo
        $arquivo_temp = $_FILES['foto']['tmp_name'];

        // Leia o conteúdo do arquivo em um buffer de bytes
        $arquivo_bytes = file_get_contents($arquivo_temp);

         // Certifique-se de sair para evitar que o código continue sendo executado após o redirecionamento.
       
         header("Location: ../HTML/ADM.php");
         exit();
    } else {
        echo "Erro no envio do arquivo ou tipo de arquivo não suportado.";
    }
}
?>
