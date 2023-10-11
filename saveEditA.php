
 <?php
include_once('dados.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome_pet = $_POST['nome_pet'];
    $sexo = $_POST['sexo'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $porte = $_POST['porte'];

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Atualize os dados do animal
        $sqlUpdateA = "UPDATE animais SET nome_pet = :nome_pet, sexo = :sexo, idade = :idade, porte = :porte, especie = :especie, raca = :raca WHERE id = :id";
        $stmtA = $conn->prepare($sqlUpdateA);
        $stmtA->bindParam(':nome_pet', $nome_pet);
        $stmtA->bindParam(':sexo', $sexo);
        $stmtA->bindParam(':idade', $idade);
        $stmtA->bindParam(':porte', $porte);
        $stmtA->bindParam(':raca', $raca);
        $stmtA->bindParam(':especie', $especie);
        $stmtA->bindParam(':id', $id);
        $stmtA->execute();

        // Verifique se uma nova imagem foi enviada
        if (isset($_FILES['nova_imagem']) && $_FILES['nova_imagem']['error'] === UPLOAD_ERR_OK) {
            // Ler o conteúdo da nova imagem em formato binário
            $nova_imagem_content = file_get_contents($_FILES['nova_imagem']['tmp_name']);

            // Atualize a imagem do animal
            $sqlUpdateImagem = "UPDATE animais SET imagem = :nova_imagem WHERE id = :id";
            $stmtImagem = $conn->prepare($sqlUpdateImagem);
            $stmtImagem->bindParam(':nova_imagem', $nova_imagem_content, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
            $stmtImagem->bindParam(':id', $id);
            $stmtImagem->execute();
        }

        header('Location: ../Repositorio_Pet_Space/HTML/Adm1.php');
        exit;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>

