

<?php
if (isset($_POST['submit'])) {
    // Recupere os dados do formulário
    $nome_pet = $_POST['nome_pet'];
    $sexo = $_POST['sexo'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $porte = $_POST['porte'];

    // Verifique se um arquivo foi enviado com sucesso
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Caminho temporário do arquivo
        $arquivo_temp = $_FILES['foto']['tmp_name'];

        // Verifique se o arquivo é uma imagem (opcional)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $arquivo_temp);
        finfo_close($finfo);

        // Permita apenas tipos de imagem específicos (opcional)
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($mime_type, $tipos_permitidos)) {
            echo "Apenas imagens JPEG, PNG ou GIF são permitidas.";
            exit();
        }

        // Leia o conteúdo do arquivo em um buffer de bytes
        $arquivo_bytes = file_get_contents($arquivo_temp);

        // Defina as configurações da conexão com o banco de dados aqui
        $serverName = "PetSpace.mssql.somee.com";
        $databaseName = "PetSpace";
        $uid = "CaioSilva_SQLLogin_1";
        $pwd = "bj8g3g8o2r";

        try {
            // Estabeleça a conexão com o banco de dados
            $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare uma consulta SQL para inserir os bytes no banco de dados
            $sqlInserirImagem = "INSERT INTO animais (nome_pet, sexo, especie, raca, idade, porte, foto) VALUES (:nome_pet, :sexo, :especie, :raca, :idade, :porte, :foto)";
            $stmt = $conn->prepare($sqlInserirImagem);
            $stmt->bindParam(':nome_pet', $nome_pet);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':especie', $especie);
            $stmt->bindParam(':raca', $raca);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':porte', $porte);
            $stmt->bindParam(':foto', $arquivo_bytes, PDO::PARAM_LOB); // Use PDO::PARAM_LOB para inserir dados BLOB

            // Execute a consulta SQL
            $stmt->execute();

            echo "Imagem inserida com sucesso no banco de dados.";
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    } else {
        echo "Erro no envio do arquivo ou tipo de arquivo não suportado.";
    }
}
?>
