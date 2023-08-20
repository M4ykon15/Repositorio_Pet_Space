<?php
 
 session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
include_once('../dados.php');

$email = $_POST['email'];
$senha = $_POST['senha'];



$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha ='$senha'";
$result = $conexao->query($sql);


if (mysqli_num_rows($result) < 1) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: Login.php'); 
} else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

    if ($email === 'admin@gmail.com' && $senha === 'admin123') {
        header('Location: ADM.php');
    } else {
        header('Location: PetSpace.html');
    }
}
}



?>