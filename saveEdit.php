
<?php
include_once('dados.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlUpdate = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, cpf = :cpf WHERE id = :id";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: ../Repositorio_Pet_Space/HTML/Adm1.php');
        exit;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

?>
