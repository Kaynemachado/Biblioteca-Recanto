<?php
  include('conexaobanco.php');
  include('pag_logado.php');
  include('bibliotecaria.php');

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
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

.ColunaEsquerdaA{
  position: ;
}

.ColunaEsquerdaB{
  position:;
  margin-top: -10px;
}

.ColunaEsquerdaC{
  position:;
  margin-top: -10px;
}

.ColunaDireitaA{
  margin-left: -10px;
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
  if(isset($usuario_logado)){?>
  <a href="Logout.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white"><i></i>Sair</a>
  <?php }else{ ?>
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
         <p class="w3-center"><img src="<?=$usuario_logado['foto']?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
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
          <a href= cronograma.php class="w3-button w3-block w3-theme-l1 w3-left-align" style="width:330px"><i class="fa fa-users fa-fw w3-margin-right"></i> Cronograma </a>    
          <a href= lista_emprestimos.php class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Empréstimos</a>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user fa-fw w3-margin-right"></i> Editar perfil</button>
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
        <div class="w3-margin-top" ><p><strong>Avisos</strong></p></div>
        <p>Colocar aqui alertas de renovação de livros</p>
      </div>
    </div>
</div>
    <!-- Middle Column -->
    <div class="w3-col m9" style="margin-top: -15px;">
                
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="mansfild.png" alt="Avatar" class="w3-left w3-margim-bottom w3-margin-right" style="width:130px">
        <h4>Mansfild Park</h4><br>
        <p> Por Jane Austen</p>
        <p class="w3-justify">Aos dez anos, Fanny é enviada por seus pais empobrecidos para morar em Mansfield Park, a propriedade de sir Thomas, o marido rico e nobre de sua tia. A garota cresce bonita, estudiosa e inteligente, torna-se escritora e, a certa altura, apaixona-se.</p>
        <br>
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="ocolecionador.png" alt="Avatar" class="w3-left w3-margin-bottom w3-margin-right" style="width:130px">
        <h4>O Colecionador</h4><br>
        <p>Por John Fowles</p>
        <p class="w3-justify">O COLECIONADOR é a história de Frederick Clegg, um homem solitário, de origem humilde, menosprezado por uma sociedade esnobe, que encontra o grande amor de sua vida. Tudo o que ele deseja é passar um tempo a sós com ela, demonstrar seus nobres sentimentos e deixar claro que eles nasceram um para o outro.</p>
       
      </div> 
      
    <!-- End Middle Column -->
    </div>
       
</DIV>
      

      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
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
