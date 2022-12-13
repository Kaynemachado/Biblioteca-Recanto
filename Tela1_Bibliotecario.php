<?php
include('conexaobanco.php');
include('pag_logado.php');
include('bibliotecaria.php');
$sql = "SELECT l.foto_livro, u.foto, DATEDIFF(NOW(), e.data_prev_devolucao) AS valor FROM emprestimo e 
  inner join livros l on l.cod_livro = e.cod_livro
  inner join usuario u on u.cod_usuario = e.cod_usuario
  where DATEDIFF(NOW(), e.data_prev_devolucao) > 0  and e.data_devolucao is null";
$emprestimos = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Recanto do Saber | Início</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: "Open Sans", sans-serif
    }

    .ColunaEsquerdaB {
      margin-top: -10px;
    }

    .ColunaEsquerdaC {
      margin-top: -10px;
    }

    .ColunaDireitaA {
      margin-left: -10px;
    }

    .fotos {
      margin-left: 15px;
      margin-bottom: 5px;
    }

    .livro_usuario {
      display: flex;
      flex-direction: column;
    }
  </style>
</head>

<body class="w3-theme-l5">


  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-l1 w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="capa.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-home w3-margin-right"></i>Início</a>
      <a href="Tela1_Bibliotecario.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Novidades"><i class=""></i>Meu Perfil</a>
      <a href="lista_livros.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Meu Perfil"><i class=""></i>Acervo</a>

      <div class="w3-dropdown-hover w3-hide-small">
        <a class="w3-button w3-padding-large">Usuários</a>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="lista_usuarios.php" class="w3-bar-item w3-button">Alunos</a>
          <a href="lista_funcionarios.php" class="w3-bar-item w3-button">Funcionário</a>
        </div>
      </div>

      <div class="w3-dropdown-hover w3-hide-small">
        <a class="w3-button w3-padding-large" title="Notifications">Cadastrar</a>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="TCA_NewSite.php" class="w3-bar-item w3-button">Alunos</a>
          <a href="Tela_cadastro_prof.php" class="w3-bar-item w3-button">Funcionário</a>
          <a href="newsite.php" class="w3-bar-item w3-button">Livros</a>
        </div>
      </div>
      <a href="lista_emprestimos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Empréstimos</a>

      <?php
      if (isset($usuario_logado)) { ?>
        <a href="Logout.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white"><i></i>Sair</a>
      <?php } else { ?>
        <a href="Login.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white"><i></i>Login</a>
      <?php } ?>

    </div>
  </div>


  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px; ">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <div class="ColunaEsquerdaA">
          <div class="w3-card w3-round w3-white" style="height:300px;width:330px">
            <div class="w3-container w3-padding">
              <h4 class="w3-center">Meu perfil</h4>
              <p class="w3-center"><img src="<?= $usuario_logado['foto'] ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
              <br>
              <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['nome'] ?></p>
              <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['cidade'] ?>/SC</p>
              <p><i class="fa fa-users fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['rua'] ?></p>
            </div>
          </div>
        </div>
        <br>

        <!-- Accordion -->
        <div class="ColunaEsquerdaB">
          <div class="w3-card w3-round">
            <div class="w3-dropdown-hover">
              <a href=cronograma.php class="w3-button w3-block w3-theme-l1 w3-left-align" style="width:330px"><i class="fa fa-users fa-fw w3-margin-right"></i> Cronograma </a>
              <a href=lista_emprestimos.php class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Empréstimos</a>
              <a href=lista_usuarios.php class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user fa-fw w3-margin-right"></i> Editar perfil</a>
            </div>
          </div>
        </div>
        <br>


        <!-- Alert Box -->
        <div class="ColunaEsquerdaC">
          <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small w3-fixed" style="width:330px">
            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
              <i class="fa fa-remove"></i>
            </span>
            <div class="w3-margin-top">
              <p><strong>Avisos</strong></p>
            </div>
            <p>Os empréstimos dos exemplares seguem um padrão de 7 dias.</p>
          </div>
        </div>
      </div>

      <!-- Middle Column -->
      <div class="w3-col m9" style="margin-top: -15px;">
        <div class="w3-container w3-card w3-white w3-round w3-margin" style="width: 970px;"><br>
          <div class="fotos" style="display: flex;">
            <?php while ($emprestimo = mysqli_fetch_array($emprestimos)) { ?>
              <div class="livro_usuario">
                <h2>R$<?= $emprestimo['valor'] ?>,00</h2>
                <img src="<?= $emprestimo['foto_livro'] ?>" class="w3-center w3-margin-bottom w3-margin-right" style="width:130px">
                <img src="<?= $emprestimo['foto'] ?>" class="w3-center w3-margin-bottom w3-margin-right" style="width:130px">
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </DIV>
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
    <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
  </footer>


  <script>
    // Accordion
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
      } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
          x.previousElementSibling.className.replace(" w3-theme-d1", "");
      }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

</body>

</html>