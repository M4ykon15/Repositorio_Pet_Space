<?php
session_start();

unset($_SESSION['emaill']);
unset($_SESSION['senha']);
header('Location: ../Repositorio_Pet_Space/HTML/Login.php');
?>