<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Acervo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

    .conteudo {
        display: inline-block;
    }
    </style>
</head>

<body>

    <div class="container" style="margin-left:0px;">
        <br>
        <br>
        <div class="conteudo">
            <h1 style="padding-top: 30px;padding-left:30px; ">Acervo Recanto do Saber</h1>



            <table class="table w3-margin-left">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Nome</th>
                        <th>Data Emprestimo</th>
                        <th>Devolucao Prevista</th>
                        <th class='text-center'><b>Ação</b></th>
                    </tr>

                    <?php while ($dados = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $dados['cod_emprestimo'] ?></td>
                        <td><?php echo $dados['titulo'] ?></td>
                        <td><?php echo $dados['nome'] ?></td>
                        <td><?php echo $dados['data_emprestimo'] ?></td>
                        <td><?php echo $dados['data_prev_devolucao'] ?></td>


                        <td colspan="2" class="text-center">
                            <a class='btn btn-danger btn-sm' href='#'
                                onclick='confirmar("<?php echo $dados['cod_emprestimo'] ?>")'>Devolucao</a>
                            <a class='btn btn-info btn-sm'
                                href='renovar.php?cod_emprestimo=<?=$dados['cod_emprestimo'] ?>'>Renovar</a>
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