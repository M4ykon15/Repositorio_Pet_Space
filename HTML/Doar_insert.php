<?php
// Start session
if (!session_id()) {
    session_start();
}

require_once "../dados.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define os campos esperados
    $nome_pet = $_POST['nome_pet'];
    $sexo = $_POST['sexo'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $porte = $_POST['porte'];

    // Processamento dos dados do formulário
    try {
        // Conectar ao banco de dados com codificação UTF-8
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd, array(PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se um arquivo de imagem foi enviado com sucesso
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            // Ler o conteúdo da imagem em formato binário
            $imagem_content = file_get_contents($_FILES['imagem']['tmp_name']);

            // Prepare a declaração SQL para inserir o registro com um parâmetro de saída para a imagem
            $stmt = $conn->prepare("INSERT INTO animais (nome_pet, sexo, especie, raca, idade, porte, imagem) VALUES (:nome_pet, :sexo, :especie, :raca, :idade, :porte, :imagem)");
            $stmt->bindParam(':nome_pet', $nome_pet, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $stmt->bindParam(':especie', $especie, PDO::PARAM_STR);
            $stmt->bindParam(':raca', $raca, PDO::PARAM_STR);
            $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
            $stmt->bindParam(':porte', $porte, PDO::PARAM_STR);

            // Use um parâmetro de saída para a imagem
            $stmt->bindParam(':imagem', $imagem_content, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

            // Executar a declaração preparada
            if ($stmt->execute()) {
                // Verificar se o registro foi inserido com sucesso
                if ($stmt->rowCount() > 0) {
                    echo "Registro inserido com sucesso!";
                    header("Location: Doar.php");
                    exit();
                } else {
                    echo "Erro ao inserir o registro.";
                }
            } else {
                echo "Erro na execução da declaração: " . $stmt->errorInfo()[2];
            }

            $stmt->closeCursor(); // Fechar o cursor do banco de dados
        } else {
            echo "Erro ao enviar a imagem.";
        }

        // Fechar a conexão com o banco de dados
        $conn = null;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
}
?>
