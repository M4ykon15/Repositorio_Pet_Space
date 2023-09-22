<?php
session_start();

// Verifique a sessão para autenticação
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: Login.php');
    exit;
}

$logado = $_SESSION['email'];

// Defina as configurações da conexão com o banco de dados aqui
$serverName = "PetSpace.mssql.somee.com";
$databaseName = "PetSpace";
$uid = "CaioSilva_SQLLogin_1";
$pwd = "bj8g3g8o2r";


try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlUsuarios = "SELECT * FROM usuarios
WHERE email <> 'admin@gmail.com'";
    
    $stmtUsuarios = $conn->prepare($sqlUsuarios);
    $stmtUsuarios->execute();

    $sqlAnimais = "SELECT * FROM animais ORDER BY id ASC";
    $stmtAnimais = $conn->prepare($sqlAnimais);
    $stmtAnimais->execute();
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>

    
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img src="../Imagens/icon_pata-removebg-preview.png" alt="" style="height: 85px; width: 85px;">
                <span>Pet Space</span>
            </div>
            
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="#">
                        <img  style="height: 50px; width: 40px; padding-bottom: 10px;"   src="../Imagens/icons8-pessoa-do-sexo-masculino-64.png" />
                        <span style="padding-left: 10px;">Usuários</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img style="padding-left: 5px;height: 35px; width: 40px;"  src="../Imagens/icons8-ano-do-cão-96.png"/>  
                          <span style="padding-left: 10px;">Animais</span>
                    </a>
                </li>
                <li>
                    
        </nav>


        

    <!-- <div style=" position: relative;">
        <div class="linea" style="margin-bottom: 100px;"></div>
            

                  <div style=""><?php
                                   echo "<h4> $logado</h4>";
        ?></div>
                
                     <button style="align-items: center;display: flex; gap: 20px; height: 50px; width: 130px;background-color: #ff0000; border-color: #ff0000;border-radius: 18px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25PX" height="25PX" fill="white" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        
                      
                      <a href="/Repositorio_Pet_Space/sair.php" style="font-size: 18px; text-decoration: none; color: #ffffff;">Logout</a>

                    </button>
                   
                
            </div>
    
            
        </div> -->


        <div style="position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 20px;">
    <div class="linea" style="margin-bottom: 50px;"></div>

    <div style="margin-bottom: 30px;">
        <?php echo "<h4> $logado</h4>"; ?>
    </div>

    <button style="align-items: center; display: flex; gap: 20px; height: 50px; width: 130px; background-color: #ff0000; border-color: #ff0000; border-radius: 18px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="25PX" height="25PX" fill="white" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
        <a href="../sair.php" style="font-size: 18px; text-decoration: none; color: #ffffff;">Logout</a>
    </button>
</div>





    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../JS/script.js"></script>
</body>
</html>