<?php 

include ('conexaobanco.php');

if (isset($_POST['usuario']) || isset($_POST['senha'])) {

    if(strlen($_POST['usuario']) == 0) {
        echo "<script>alert('Prencha seu usuário');</script>";
    } else if(strlen($_POST['senha']) == 0) {
        echo "<script>alert('Preencha sua senha');</script>";
    }else {
        
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    
        $sql_code = "SELECT nome, senha, username, cod_usuario FROM usuario WHERE username = '$usuario' and senha='$senha'";
        $sql_query = mysqli_query($conn, $sql_code) or die("Falha na execução");

        $quantidade = mysqli_affected_rows($conn);

        if($quantidade == 1) {
            
            $usuario = mysqli_fetch_assoc($sql_query);

            if(!isset($_SESSION)) {
                SESSION_START();
            }

            $_SESSION['cod_usuario'] = $usuario['cod_usuario'];

            header("Location: Tela1_Bibliotecario.php");

        }else {
            echo"<script>alert('Falha ao logar! Usuário ou senha incorretos');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<head>
    <title>Login</title>
    <style>
    * {
        box-sizing: border-box;

    }


    body {
        font-family: "Open Sans", sans-serif;
        padding: 70px;
        background: #A9A9A9;
    }

    /* Cabeçalho*/

    .ls-login-logo {
        font-size: 50;
        padding-top: 15px;
        border-radius: 16px;
    }

    .box-parent-login {
        padding-top: 50px;
        padding-bottom: 80px;
        padding-right: 420px;
        padding-left: 420px;
        margin: 10px;
    }

    .well {

        text-align: center;
        border-radius: 10px;
    }

    .btn {
        background: #A9A9A9;

    }

    .ls {
        font-size: 13px;
    }

    .form {
        margin-top: 10px;
        padding: 20px;
    }

    .footer {
        position: absolute;
        padding: 25px;
        padding-bottom: 10px;
        text-align: center;
        background: #ddd;
        margin-top: 10px;
        font-weight: bold;
    }
    </style>

</head>

<body>
    <header>
    <div class="menu">
            <div class=" ls w3-top">
                <div class="w3-bar w3-large">
                    <a class="w3-bar-item w3-button  w3-hide-small w3-right  w3-hover " href="javascript:void(0);"
                        onclick="openNav()"><i></i></a>
                    <div class="w3-dropdown-hover w3-right w3-margin-right" style="padding-right: 40px;">
                        <a class=" w3-button w3-padding w3-panel w3-border w3-border:16px w3-round-large w3-text-white w3-margin-left"
                            style="width:140px;" title="Cadastre-se">Cadastre-se</a>
                        <div class="w3-dropdown-content w3-bar-block w3-transparent w3-center">
                            <a href="TCA_NewSite.php"
                                class="w3-bar-item w3-button w3-padding w3-border w3 border:16px w3-round-large w3-text-white w3-margin-left"
                                style="width:140px;">Aluno</a>
                            <a href="Tela_cadastro_prof.php"
                                class="w3-bar-item w3-button w3-padding w3-panel w3-border w3 border:16px w3-round-large w3-text-white w3-margin-left"
                                style="width:140px;">Funcionário</a>
                        </div>
                    </div>
                    <a href="Redefinir_Senha.php"
                        class="w3-bar-item w3-button w3-right w3-padding w3-panel w3-border w3 border:16px w3-round-large w3-text-white"
                        title="Meu Perfil"><i class=></i>Esqueci minha senha</a>
                </div>
            </div>
        </div>
    </header>

    <div class="box-parent-login ">
        <div class="well bg-white box-login">
            <h1 class="ls-login-logo">Login</h1>
            
           


            <form action="" method="POST" class="form">
                <div class="form-group ls-login-user ">
                    <input class="form-control" name="usuario" type="text" placeholder="Usuário" size="10">
                </div>
                <br>
                <div class="form-group ls-login-password">
                    <input class="form-control" name="senha" type="password" placeholder="Senha" size="10">
                </div>
                <br>
                <input type="submit" value="Entrar" class="btn btn-lg btn-block w3-text-white w3-hover-dark-grey"
                    name="Entrar">
            </form>
        </div>
    </div>
</body>

</html>