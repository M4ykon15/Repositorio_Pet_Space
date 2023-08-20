<?php

include_once('dados.php');

if(isset($_POST['update']))
{

    $id = $_POST ['id'];
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];
    $telefone = $_POST ['telefone'];
    $cpf = $_POST ['cpf'];


$sqlUpdate = "UPDATE usuarios SET nome ='$nome', email= '$email', senha ='$senha', telefone='$telefone', cpf='$cpf'

   WHERE id ='$id' ";

   $result = $conexao->query($sqlUpdate);


}

header('Location: ../Repositorio_Pet_Space/HTML/ADM.php');


?>