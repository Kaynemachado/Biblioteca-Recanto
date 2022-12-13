<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

img {
  width: 100%;
  height: 100%;
  padding-top: 20px;
  margin:0px;
}

.header {
  text-align: center;
  background: white;
} 

.menu{
  background: dark-grey;
}
</style>
</head>


<!-- Navbar -->

<header>
    <div>
        <figure>
            <img class="imagem"src="header.png" alt="Imagem não carregada"/>
        </figure>
    </div>
</div>

<div class="menu">
</html><div class="w3-top">
 <div class="w3-bar w3-theme-l1 w3-left-align w3-large">
  <a class="w3-bar-item w3-button  w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"href="javascript:void(0);" onclick="openNav()"></a>
  <a href="capa.php" class="w3-bar-item w3-button w3-padding-large "><i class="fa fa-home w3-margin-right"></i>Início</a>
  <a href="Tela1_Bibliotecario.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Meu Perfil"><i class=""></i>Meu Perfil</a>
  <a href="lista_livros.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Acervo"><i></i>Acervo</a>
  
  <div class="w3-dropdown-hover w3-hide-small ">
  <a class="w3-button w3-padding-large">Usuários</a>
  <div class="w3-dropdown-content w3-card w3-bar-block">
      <a href="lista_usuarios.php" class="w3-bar-item w3-button w3-left">Aluno</a>
      <a href="lista_funcionarios.php" class="w3-bar-item w3-button w3-left">Funcionários</a>
    </div>
  </div>

  <div class="w3-dropdown-hover w3-hide-small">
    <a class="w3-button w3-padding-large">Cadastrar</a>    
    <div class="w3-dropdown-content w3-card w3-bar-block">
      <a href="TCA_NewSite.php" class="w3-bar-item w3-button w3-left">Alunos</a>
      <a href="Tela_cadastro_prof.php" class="w3-bar-item w3-button w3-left">Funcionários</a>
      <a href="newsite.php" class="w3-bar-item w3-button w3-left">Livros</a>
    </div>
  </div>
  <a href="lista_emprestimos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Empréstimos</a>
<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="bi bi-search"></i></a>
  <?php
  if(isset($usuario_logado)){?>
  <a href="Logout.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white"><i></i>Sair</a>
  <?php }else{ ?>
  <a href="Login.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white"><i></i>Login</a>
  <?php } ?>
</div>
</div>
</div>
</body>
</html>