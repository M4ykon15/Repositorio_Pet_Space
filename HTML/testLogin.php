<?php
 
 session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
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

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: Login.php'); 
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            if ($email === 'admin@gmail.com' && $senha === 'admin123') {
                header('Location: ADM.php');
            } else {
                header('Location: PetSpace.html');
            }
        }
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
?>





