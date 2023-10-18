<?php
session_start();

// Verifique a sessão para autenticação
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
  // Se as variáveis de sessão não estiverem definidas, redirecione para a página de login
  header('Location: login.php');
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

  $sqlUsuarios = "SELECT * FROM usuarios ORDER BY id ASC";
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../Imagens/icon_pata.ico" type="image/x-icon">

  <title>Pet Space</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">





  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="../CSS/PetSpace.css">

  <title>Pet Space</title>



</head>

<body>





  <nav class="nav" style="z-index: 999; background-color: #000;    width: 100%;  height: 75px;  position: fixed;  line-height: 65px;  text-align: center; padding-top: 12px;">

    <div class="container">

      <div class="logo">
        <a href="#">PET SPACE</a>
      </div>


      <div id="mainListDiv" class="main_list">
        <ul class="navlinks">

          <li><a href="#Sobre" style="font-size: 30px;">Mais informações</a></li>
          <li>

            <a href="#meuModal" data-bs-toggle="modal">
              <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
            </a>

           
            <div class="modal" id="meuModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h5>Email: </h5>
                    <h6>
                      <?php echo $logado ?>
                    </h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>


                    <a href="../sair.php" class="btn btn-danger" style="font-size: 20px; line-height: 25px;">Sair
                    </a>





                  </div>
                </div>
              </div>
            </div>


          </li>



        </ul>
      </div>


      <!-- <a href="../HTML/Login.php">
        <button type="button-entrar" class="btn btn-outline-light btn-lg" data-toggle="modal" style="margin-right: 10px;font-size: 15px;" data-target="#Login">Entrar</button>
      </a>
      <a href="../HTML/Cadastrar.php">
        <button type="button-cadastrar" class="btn btn-outline-light btn-lg" data-toggle="modal" style="margin-right: 10px; font-size: 15px;" data-target="#Login">Cadastrar</button>
      </a> -->









    </div>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-top: 75px;">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../Imagens/dog_1.webp" alt="Primeiro Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../Imagens/dog_20.jpeg" alt="Segundo Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../Imagens/dog_3.jpg" alt="Terceiro Slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>


  </section>



  </nav>



  <div class="lg:py-10 py-5" style="background-color:snow; text-align: center; ">
    <h1 class="title-lg" style="font-size: 40px;">Novos animais por aqui</h1>
    <p class="mt-3 sm:mt-4">
    </p>
    <div class="text-xl text-gray-500" style="font-size: 30px;">Nosso site está cheio de doguinhos e gatinhos ansiosos
      por uma família.</div>

    <div class="text-xl text-gray-500" style="font-size: 30px;">Vem ver!</div>


  </div>



<div class="card-container">
    
        <?php
        // Continue com o restante do código
        include '../dados.php';

        try {
            // Cria uma nova conexão PDO
            $query = "SELECT id,
                      nome_pet as nome,
                      sexo,
                      imagem,
                      idade,
                      porte,
                      especie,
                      raca
                  FROM animais";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loop através dos resultados e exiba os cards com Bootstrap
            // Defina a largura e a altura desejadas fora do loop
$imgWidth = 240;
$imgHeight = 200;

foreach ($results as $row) {
    echo '<div class="card">';
    echo '<div class="text-center">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="' . '" class="img-fluid" style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px; margin-top: 10px; border-radius: 20px;">';
    echo '</div>';
    echo '<h4 style="padding-top: 20px;padding-left:20px">' . $row['nome'];
    echo '</h4>';
   
    if ($row['sexo'] === 'Fêmea') {
      echo '<span class="material-symbols-outlined" style="position:absolute;font-size: 50px; padding-left:200px; margin-top:247px ;color:deeppink">female</span>';
  } else if ($row['sexo'] === 'Macho') {
      echo '<span class="material-symbols-outlined" style="position:absolute;font-size: 50px; padding-left:200px; margin-top:247px ;color:darkblue;">male</span>';
  }
  echo '<button type="button" class="btn btn-primary" style="margin-left:20px ;width: 220px; margin-top: 30px;" data-bs-toggle="modal" data-bs-target="#modal' . $row['id'] . '">Mais Informações</button>';

    
    echo '</div>';
    
    // Modal para exibir informações detalhadas
    echo '<div class="modal fade" id="modal' . $row['id'] . '" tabindex="-1" aria-labelledby="modalLabel' . $row['id'] . '" aria-hidden="true">';
    echo '<div class="modal-dialog modal-dialog-centered">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title" id="modalLabel' . $row['id'] . '">' . $row['nome'] . '</h5>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<p>';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="' . '" class="img-fluid" style="width: ' . $imgWidth . 'px; height: ' . $imgHeight . 'px; margin-top: 10px; margin-bottom:20px;border-radius: 20px;">' . '</br>';
   
    echo '<strong>Sexo:</strong> ' . $row['sexo'] . '<br>';
    echo '<strong>Espécie:</strong> ' . $row['especie'] . '<br>';
    echo '<strong>Raça:</strong> ' . $row['raca'] . '<br>';
    echo '<strong>Idade:</strong> ' . $row['idade'] . '<br>';
    echo '<strong>Porte:</strong> ' . $row['porte'] . '<br>';
    // Adicione outras informações aqui, como espécie, raça, porte, idade, etc.
    echo '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
        ?>
    
</div>

  



      <!-- Modal para cada animal -->
      <div class="modal fade" id="modal<?php echo $rowA['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $rowA['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel<?php echo $rowA['id']; ?>"><?php echo $rowA['nome_pet']; ?></h5>

            </div>
            <div class="modal-body">
              <p>
                <strong>Sexo:</strong> <?php echo $rowA['sexo']; ?><br>
                <strong>Espécie:</strong> <?php echo $rowA['especie']; ?><br>
                <strong>Raça:</strong> <?php echo $rowA['raca']; ?><br>
                <strong>Porte:</strong> <?php echo $rowA['porte']; ?><br>
                <strong>Idade:</strong> <?php echo $rowA['idade']; ?><br>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>










  </div>
  <section id="Sobre"> </section>
  <div class="text-center" style="background-color: snow;font-size: 30px;text-align: center;">

    <div class="title-adote" style="margin-bottom: 50px;">

      <h1>Porquê você deve adotar um bichinho: </h1>


    </div>
    <div class="center-card" style="background-color: snow;font-size: 5px;text-align: center;">
      <div class="card bg-light mb-3; card border-info " style="max-width: 20rem;  border-radius: 20px; margin-right: 50px; margin-top: 15px; height: 80%;">
        <div class="text-card">
          <p class="card-title" style="font-size: 20px;"><b>Você terá um companheiro para todas as horas</b></p>
          <p class="card-text1">Animais são companheiros leais e fieis, ter um bichinho é ter um grande amigo para te
            acompanhar
            em todas as aventuras.</p>
        </div>
      </div>
      <div class="card bg-light mb-3;card border-info" style="max-width: 20rem;border-radius: 20px;margin-right: 50px; height: 80%;">
        <div class="text-card">
          <p class="card-title" style="font-size: 20px;"><b>Animais estimulam a sociabilidade</b></p>
          <p class="card-text1" style="font-size: 14.3px;">Se você é declaradamente antissocial, um pet pode te ajudar a resolver uma parte
            desse
            problema. Estudos mostram que os animais,
            principalmente os cães, fazem com que você se torne mais ativo, saia mais de casa e conviva mais com
            outras
            pessoas.</p>
        </div>
      </div>
      <div class="card bg-light mb-3;card border-info" style="max-width: 20rem; border-radius: 20px;margin-right: 50px; height: 80%;">
        <div class="text-card">
          <p class="card-title" style="font-size: 18px; "><b>Adoção salva a vida de um animal</b></p>
          <p class="card-text1" style="font-size: 14px;">Adotar um animal é uma grande responsabilidade, e não é só porque você precisará
            cuidar
            dele em casa. A adoção é capaz de salvar a vida
            de um bichinho que poderia estar nas ruas, abandonado, morrendo de fome e possivelmente sofrendo de maus
            tratos.</p>
        </div>
      </div>
      <div class="card bg-light mb-3;card border-info" style="max-width: 20rem; border-radius: 20px;margin-right: 50px; height: 80%;">
        <div class="text-card">
          <p class="card-title" style="font-size: 20px;"><b>Quem vive com pet tem menos estresse</b></p>
          <p class="card-text1">Pesquisas feitas na Universidade da Virgínia, nos EUA, concluíram que pessoas que
            convivem com animais são menos
            estressadas e ansiosas do que as que moram sozinhas.</p>
        </div>
      </div>
      <div class="card bg-light mb-3;card border-info" style="max-width: 20rem; border-radius: 20px;margin-right: 50px; height: 80%;">
        <div class="text-card">
          <p class="card-title" style="font-size: 18px;"><b> Animais ajudam a desenvolver responsabilidade</b></p>
          <p class="card-text1">Um pet ajuda você a ser mais responsável. Como os bichinhos precisam de constante
            cuidado
            com água, alimentação, exercícios e higiene, o cuidador cria noções de
            responsabilidade que levará para o resto da vida, inclusive para o ambiente de trabalho e nos estudos.
          </p>
        </div>
      </div>
    </div>
  </div>




  <div class="lg:py-10 py-5" style="background-color: snow;;text-align: center;max-width: 1000px;margin: auto;margin-top: 100px;">
    <h1 class="title-lg" style="font-size:35px">Sobre nós</h1>
    <p class="mt-3 sm:mt-4">
    </p>
    <div class="text-xl text-gray-500" style="font-size: 19px; text-align: justify; padding-right: 100px; padding-left: 100px;"> Pet Space é uma ONG que visa a adoção e doação de animais,
      onde os diversos pets serão divulgados no site.
      <p></p>A Pet Space possui com o intuito de oferecer aos pets um lar e para aquelas pessoas que não possuen
      condições de
      cuidar de algum pet agora criamos um site para ajuda-lo
      <p></p>Este é um projeto desenvolvido por um grupo de 6 desenvolvedores para ajudar PetSpace e todos aqueles que se comovem com a situação dos animais em
      que
      a grande maioria dos animais estão nas ruas abandonados
      <div class="text-xl text-gray-500" style="font-size: 20px;"></div>
      <p></p>
    </div>
  </div>



  <div class="lg:py-10 py-5" style="background-color: snow; text-align: center;max-width: 1000px;margin: auto;">
    <h1 class="title-lg" style="font-size:35px">Nossa missão</h1>

    <div class="text-xl text-gray-500" style="font-size: 19px; text-align: justify; padding-right: 100px; padding-left: 100px;">
      A nossa missão é fornecer uma plataforma online que facilite o encontro de animais em busca de um lar
      permanente e pessoas interessadas em adotar ou doar um animal de estimação. O objetivo principal é promover o
      bem-estar dos animais, ajudando-os a encontrar um lar amoroso e responsável, ao mesmo tempo em que
      conscientiza sobre a importância da adoção e do cuidado adequado aos animais de estimação.

      Através desse site, o objetivo é conectar animais resgatados, abandonados, perdidos ou em situação de risco
      com pessoas que desejam adotar um companheiro peludo.<p> Além disso, o site também pode permitir que
        indivíduos que não podem mais cuidar de seus animais os doem para encontrar um novo lar adequado, evitando
        que sejam abandonados ou maltratados.</p>
      <p>O nosso propósito é, portanto, ser uma plataforma confiável, segura e de fácil acesso para promover a
        adoção responsável, a conscientização sobre o abandono de animais e o bem-estar animal. Através dessa
        plataforma, espera-se criar um impacto positivo na vida de animais em necessidade, conectando-os com
        famílias amorosas e dedicadas, proporcionando-lhes uma segunda chance de ter um lar feliz e carinhoso.</p>
    </div>
  </div>


  <div class="lg:py-10 py-5" style="background-color:snow; text-align: center;max-width: 1000px; margin: auto; margin-bottom: 50px;">
    <h1 class="title-lg" style="font-size: 33px">Quer divulgar um cão ou gato para adoção?</h1>

    <div class="text-xl text-gray-500" style="font-size: 19px; text-align: justify; padding-right: 100px; padding-left: 100px;">
      Se você está dando lar temporário ou quer divulgar um animal para adoção, entre em contato com a PetSpace.
      A PetSpace irá encontrar alguém que realmente combine com o pet, assim ajudando a evitar decepção e futuros abandonos.
      <p></p>Importante: este é um site de adoção e a venda de animais é proibida, ok? Usuários que tentarem vender
      animais serão banidos do site.
    </div>
  </div>






  <footer class="text-center1" style="font-size: 20px; font-size: 20px;  background-color: #333;  color: #ffffff;  padding: 20px 0;
  text-align: center;
  bottom: 0;
  width: 100%;
  background-color: #333; 
  padding-top: 50px; 
  height: 290px; color: #ffffff;">


    <p style="margin-right: 40%; font-size: 20px;">Contato: <br />(11) 95470-5679</p>
    <p style="margin-top: -75px; margin-left: 35%;font-size: 20px;">Endereço: <br />Rua Onze de Outubro - Barueri - SP</p> </br>


    <p style="font-size: 20px; margin-top: 50px;"> PetSpace Copyright © 2022 - 2023.
      © Todos os direitos reservados - Desde 2022 no mercado. </p>

  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>