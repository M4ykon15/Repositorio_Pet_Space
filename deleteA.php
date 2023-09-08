<?php
if (!empty($_GET['id'])) {
    // Defina as configurações da conexão com o banco de dados aqui
    $serverName = "PetSpace.mssql.somee.com";
    $databaseName = "PetSpace";
    $uid = "CaioSilva_SQLLogin_1";
    $pwd = "bj8g3g8o2r";

    try {
        $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_GET['id'];


        if ($id != null ) {
            $sqlDeleteA = "DELETE FROM animais WHERE id = :id";
            $stmtDeleteA = $conn->prepare($sqlDeleteA);
            $stmtDeleteA->bindParam(':id', $id);
            $stmtDeleteA->execute();
        }

      
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

header('Location: ../Repositorio_Pet_Space/HTML/ADM.php');

?>