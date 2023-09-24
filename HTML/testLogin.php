<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['emaill']) && !empty($_POST['senha'])) {
    
    $email = $_POST['emaill'];
    $senha = $_POST['senha'];

    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server= $serverName; Database = $databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta preparada para buscar o nível de acesso
        $busca = $conn->prepare("SELECT nivel_acesso FROM USUARIOS WHERE emaill = :emaill and senha = :senha");
        $busca->bindParam(':emaill', $email);
        $busca->bindParam(':senha', $senha);
        $busca->execute();
        $nivelAcesso = $busca->fetchColumn();

        // Consulta preparada para verificar o usuário
        $sql = "SELECT * FROM usuarios WHERE emaill = :emaill AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':emaill', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            unset($_SESSION['emaill']);
            unset($_SESSION['senha']);
            header('Location: ../HTML/Login.php'); 
        } else {
            if($nivelAcesso == 0 ){
                $_SESSION['emaill'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: ../HTML/Adm1.php');
            }
            else{
                $_SESSION['emaill'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: ..//HTML/PetSpace.php');
            }
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>
