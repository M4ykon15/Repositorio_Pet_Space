<?php




$serverName = "PetSpace.mssql.somee.com";
$databaseName = "PetSpace";
$uid = "CaioSilva_SQLLogin_1";
$pwd = "bj8g3g8o2r";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}

catch (PDOException $e){
    die("Erro na conxão:" . $e->getMessage());
}


?>