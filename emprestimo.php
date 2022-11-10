<?php

include('menu_simples_funcionario.php');

if(!isset($_GET['cod_livro'])){
    header('Location: lista_livros.php');
    exit;
}
date_default_timezone_set("America/Sao_Paulo");
include('conexaobanco.php');
if(isset($_POST['submit'])){
    $cod_usuario = $_POST['user'];
    $cod_livro = $_POST['cod_livro'];
    $data_emprestimo = date("Y-m-d");
    $data_prev_devolucao = date('Y-m-d', strtotime($data_emprestimo. ' + 7 days'));
    $sql = "INSERT INTO emprestimo (data_prev_devolucao, data_emprestimo, cod_livro, cod_usuario) VALUES
    ('$data_prev_devolucao', '$data_emprestimo', '$cod_livro', '$cod_usuario')";
    mysqli_query($conn, $sql);
    header('Location: lista_livros.php');
    exit;
}
$sql = "SELECT * from usuario";
$result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Emprestimo</title>
    <script src="emprestimo.js" defer ></script>
    <style>
        html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

        .hidden{
            display:none;
        }

        .conteudo{
            margin-top: 70px;
        }

        .card{
            background: white;
        }
        form{
            height: 50vh;
            overflow-y: scroll;
            width: 50vw;
        }
        </style>
</head>



<body class="w3-theme-l5">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width: 1000px; padding-left: 100px;"><br>
    <div class="conteudo">
    <input class="form-control me-4" class="w3-margin" type="text" name="nome_usuario" id="pesquisa" size="40px">
    <form class="w3-margin" action="" method="post">
        <?php while($user = mysqli_fetch_array($result)){ ?>
            <div class="div_user" nome_user="<?=$user['nome']?>" id="div_<?=$user['cod_usuario']?>">
                <input required type="radio" name="user" id="<?=$user['cod_usuario']?>" value="<?=$user['cod_usuario']?>">
                <label for="<?=$user['cod_usuario']?>"><?=$user['nome']?></label>
            </div>
        <?php } ?>
        <input type="hidden" name="cod_livro" value="<?=$_GET['cod_livro']?>">
        <input class="w3-theme-l1 w3-hover" type="submit" value="Fazer emprestimo" name="submit">
    </form>
        </div>
        </div>
</body>
</html>

