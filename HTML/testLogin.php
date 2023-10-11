<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    
    $email = $_POST['email'];
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
        $busca = $conn->prepare("SELECT nivel_acesso FROM USUARIOS WHERE email = :email and senha = :senha");
        $busca->bindParam(':email', $email);
        $busca->bindParam(':senha', $senha);
        $busca->execute();
        $nivelAcesso = $busca->fetchColumn();

        // Consulta preparada para verificar o usuário
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($row === false) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../HTML/Login.php'); 
        } else {
            // Verifique se o email é diferente de 'admin@gmail.com' antes de atualizar o nível de acesso
            if ($email != 'admin@gmail.com') {
                // Comando SQL de atualização
                $updateSql = "UPDATE usuarios SET nivel_acesso = 0 WHERE email = :email";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bindParam(':email', $email);
                $updateStmt->execute();
            }

            if ($nivelAcesso == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: ../HTML/PetSpace.php');
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: ../HTML/Adm1.php');
            }
        }
        
        

    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>
