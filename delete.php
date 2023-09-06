
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
            $sqlDelete = "DELETE FROM usuarios WHERE id = :id";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bindParam(':id', $id);
            $stmtDelete->execute();
        }

      
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

header('Location: ../Repositorio_Pet_Space/HTML/ADM.php');

?>
