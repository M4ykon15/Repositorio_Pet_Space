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
    <title>Sidebar</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 

    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    

    <div class="barra-lateral">
        <div>
        <div class="nombre-pagina">
                <img id="cloud"   src="../Imagens/icon_pata-removebg-preview.png" alt="" style="height: 80px; width: 80px;">
                <span>Pet Space</span>
            </div>
            
        </div>

        <nav class="navegacion">
            <ul>
            <li>
                   
                    <a class="inbox" href="#">
                    <img style="height: 50px; width: 40px; padding-bottom: 10px;" src="../Imagens/icons8-pessoa-do-sexo-masculino-64.png" />
                    <button id="btnUsuarios" name="User">Usuários</button>
</a>

                </li>
                <li>
                    <a href="#">
                        <img style="padding-left: 5px;height: 35px; width: 40px;"  src="../Imagens/icons8-ano-do-cão-96.png"/>  
                       <button id="btnAnimais" name="animals">Animais</button>
                     
                  
                    </a>
                </li>
                <li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div style="margin-bottom: 30px; font-size: 20px;">
        <?php echo "<h5> $logado</h5>"; ?>
    </div>

    <a href="../sair.php" style="text-decoration: none; color: #ffffff; ">
    <button style="cursor: pointer;align-items: center; display: flex; gap: 20px; height: 50px; width: 130px; background-color: #ff0000; border-color: #ff0000; border-radius: 18px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="25PX" height="25PX" fill="white" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
        <p style="color: #ffffff; cursor: pointer; padding-top: 15px;">Logout</p>
    </button>
</a>

<a href="../HTML/PetSpace.php" style="text-decoration: none; color: #00ff00; ">
<button class="inicio">
        
        <p id="inicio">Tela inicial</p>
    </button>
    </a>

            
            
        </div>

    </div>


    <main>
        <h2> Painel de Administração</h2>

    <h4  id="Usuariostxt" style="margin-top: 20px; margin-bottom: -20px; margin-left: 25px; display: none;">Usuários:</h4>
<div class="m-5" id="tabelaUsuarios">
    <table class="table table-bg">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Telefone</th>
            <th scope="col">CPF</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $stmtUsuarios->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['senha'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>
                  <a class='btn btn-sm btn-primary' href='../HTML/EditarUsuario.php?id=$row[id]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                      </svg>
                  </a>
                  <a class='btn btn-sm btn-danger' href='../delete.php?id=$row[id]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                          <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                      </svg>
                  </a>
              </td>";
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>
</div>


<h4 id="Animaistxt"  style="margin-top: 20px; margin-bottom: -20px; margin-left: 25px; display: none;">Animais:</h4>
<div class="m-5" id="tabelaAnimais">
    <table class="table table-bg">
        <thead>
        <tr>
             <th scope="col">#</th>
            <th scope="col">Nome do Pet</th>
            <th scope="col">Sexo</th>
            <th scope="col">Espécie</th>
            <th scope="col">Raça</th>
            <th scope="col">Porte</th>
            <th scope="col">Idade</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($rowA = $stmtAnimais->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";

            echo "<td>" . $rowA['id'] . "</td>";
            echo "<td>" . $rowA['nome_pet'] . "</td>";
            echo "<td>" . $rowA['sexo'] . "</td>";
            echo "<td>" . $rowA['especie'] . "</td>";
            echo "<td>" . $rowA['raca'] . "</td>";
            echo "<td>" . $rowA['porte'] . "</td>";
            echo "<td>" . $rowA['idade'] . "</td>";
            echo "<td>
                  <a class='btn btn-sm btn-primary' href='../HTML/EditarAnimal.php?id=$rowA[id]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                      </svg>
                  </a>
                  <a class='btn btn-sm btn-danger' href='../deleteA.php?id=$rowA[id]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                          <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                      </svg>
                  </a>
              </td>";
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>


</div>




  </main>

  

  <script src="../JS/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>