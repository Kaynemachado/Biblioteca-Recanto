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
<?php 

include ('conexaobanco.php');

session_start();

if(isset($_POST['enviar'])){
    $erros = array();
    if(!isset($_POST['nome']) || !isset($_POST['senha'])){
        array_push($erros, 'O campo login/senha precisa ser preenchido!');
    }else{
        $usuario = mysqli_escape_string($conn, $_POST['nome']);
        $senha = mysqli_escape_string($conn, $_POST['senha']);
        $sql = "select * from usuario where username = '$usuario'";
        $resultado = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultado) > 0){
            $sql = "update usuario set senha = '$senha' where username = '$usuario'";
            $resultado = mysqli_query($conn, $sql);
            header('Location: Login.php');
        }else{
            array_push($erros, "Usuário Inexistente");
        }
    }
}
?>

<head>
    <title>Redefinir Senha</title>
    <style>
    * {
        box-sizing: border-box;

    }


    body {
        font-family: "Open Sans", sans-serif;
        padding: 20px;
        background: #A9A9A9;
    }

    /* Cabeçalho*/

    .ls-login-logo {
        padding-top: 15px;
    }

    .box-parent-login {
        padding-top: 60px;
        padding-bottom: 90px;
        padding-right: 430px;
        padding-left: 430px;
        margin: 10px;
    }

    .well {
        padding: 50px;
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
            <div class=" w3-top">
                <div class="w3-bar w3-large">
                    <a class="w3-bar-item w3-button  w3-hide-  w3-hover " href="javascript:void(0);"
                        onclick="openNav()"><i></i></a>
                    <a href="Login.php"
                        class="w3-bar-item w3-button w3-panel w3-border w3 border:16px w3-round-large w3-text-white"
                        style="margin-left:-30px;" title="Meu Perfil"><i class=></i>Voltar</a>
                </div>
            </div>
        </div>
    </header>

    <div class="box-parent-login ">
        <div class="well bg-white box-login ">
            <h1 class="login-logo">Recuperar senha</h1>
            <script>
                <?php
                if (!empty($erros)):
                    foreach($erros as $erro): ?>
                        alert('<?=$erro?>')
                    <?php endforeach;
                endif;
                ?>
            </script>



            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
                <div class="form-group ls-login-user ">
                    <input class="form-control" name="nome" type="nome" required placeholder="Insira seu usuario"
                        size="10">
                </div>
                <br>
                <div class="form-group ls-login-password">
                    <input class="form-control" name="senha" type="password" required placeholder="Nova senha" size="10">
                </div>
                
                <br>
                <input href="Tela1_Bibliotecario.php" type="submit" value="Salvar"
                    class="btn btn-lg btn-block w3-text-white w3-hover-dark-grey" name="enviar">
            </form>
        </div>
    </div>
</body>

</html>