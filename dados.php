<?php

$dbhost = 'localhost';
$dbUsername = 'root';
$dbPassword = '123456';
$dbName = 'login';

$conexao = new mysqli($dbhost,$dbUsername, $dbPassword, $dbName);

// if($conexao->connect_errno)
// {
// echo"Erro";
// }
// else
// {
//     echo "Conexão conectada";
// }


?>