<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Acervo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="emprestimo.js" defer></script>
    <script src="busca_livros.js" defer></script>


    <?php
    include('conexaobanco.php');
    include('pag_logado.php');
    include('bibliotecaria.php');
    include('menu_simples_funcionario.php');

    $sql = "select cod_emprestimo, nome, titulo, data_emprestimo, data_prev_devolucao from emprestimo e
  inner join usuario u on u.cod_usuario = e.cod_usuario 
  inner join livros l on l.cod_livro = e.cod_livro
  where data_devolucao is null;";
    $query = mysqli_query($conn, $sql);
    ?>

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

        .hidden {
            display: none;
        }

        .table {
            width: 100%;
            margin-right: 350px;
            padding-left: 40px;
        }

        .conteudo {
            display: inline-block;
        }

        #customers {
            border-collapse: collapse;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
        }

        .td {
            text-align: center;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: white;
        }

        .form-control {
            margin: 5px;
            display: inline-block
        }

        #customers tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body class="w3-theme-l5">

    <div class="container">
        <br>
        <br>
        <div class="form-group">
        <div class="conteudo">
            <h1 style="padding-top: 30px;padding-right:200px;">Acervo Recanto do Saber</h1>
    </div>
            <input class="form-control w3-margin" class="w3-right" style="width: 40%;" type="text" name="nome" id="pesquisa" size="10%" placeholder="Pesquisar">
            <a href="lista_livros.php" style="margin-bottom: 40px; margin-right: 30px; margin-top: 5px;" type="button" class="btn form-group w3-theme-l1 w3-right">Novo empréstimo</a>

        </div> 
            
            <table id="customers" class="table w3-margin-">
                <thead>
                    <tr class="table w3-theme-l2">
                        <th>ID</th>
                        <th>Título</th>
                        <th>Nome</th>
                        <th>Data Empréstimo</th>
                        <th>Devolução Prevista</th>
                        <th class='text-center'><b>Ação</b></th>
                    </tr>

                    <?php while ($dados = mysqli_fetch_array($query)) { ?>
                        <tr class="div_user" nome_user="<?= $dados['nome'] ?>"id="div_<?= $dados['cod_emprestimo'] ?>">
                        <!--<tr class="div_livro" nome_titulo="<?= $dados['titulo'] ?>" id="div_<?= $dados['cod_emprestimo'] ?>">-->


                            <td class="text-center"><?php echo $dados['cod_emprestimo']?></td>
                            <td><?php echo $dados['titulo']?></td>
                            <td><?php echo $dados['nome']?></td>
                            <td><?php echo $dados['data_emprestimo']?></td>
                            <td><?php echo $dados['data_prev_devolucao']?></td>


                            <td colspan="2" class="text-center">
                                <a class='btn btn-danger' href='#' onclick='confirmar("<?php echo $dados['cod_emprestimo'] ?>")'>Devolução</a>
                                <a class='btn btn-info' href='renovar.php?cod_emprestimo=<?= $dados['cod_emprestimo'] ?>'>Renovar</a>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
        <script>
            function confirmar(cod_emprestimo) {
                if (confirm('Você realmente deseja fazer a devolução?'))
                    location.href = 'devolucao.php?cod_emprestimo=' + cod_emprestimo;
            }
        </script>

</body>

</html>