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

  $sql = "SELECT funcionarios.cod_funcionario, usuario.nome, usuario.genero, usuario.telefone, usuario.rua, usuario.bairro, usuario.cidade, usuario.uf, usuario.numero, usuario.data_nasc, usuario.complemento, usuario.foto, funcionarios.formacao, usuario.cpf, funcionarios.matricula_func, usuario.email, funcionarios.data_ingresso FROM funcionarios,usuario 
  where funcionarios.cod_usuario=usuario.cod_usuario";
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
    body{
        overflow-x: scroll;
    }
    </style>
</head>

<body>

    <div class="container" style="margin-left:0px;">
        <br>
        <br>
        <div class="conteudo">
            <h1 style="padding-top: 30px;padding-left:30px; ">Funcionários Cadastrados</h1>



            <table class="table w3-margin-left">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Gênero</th>
                        <th>Telefone</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>Nº Residencial</th>
                        <th>Data de Nascimento</th>
                        <th>Complemento</th>
                        <th>Foto</th>
                        <th>Formação</th>
                        <th>CPF</th>
                        <th>Matrícula</th>
                        <th>E-mail</th>
                        <th>Ingresso</th>

                        <th class='text-center'><b>Ação</b></th>
                    </tr>

                    <?php while ($dados = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $dados['cod_funcionario'] ?></td>
                        <td><?php echo $dados['nome'] ?></td>
                        <td><?php echo $dados['genero'] ?></td>
                        <td><?php echo $dados['telefone'] ?></td>
                        <td><?php echo $dados['rua'] ?></td>
                        <td><?php echo $dados['bairro'] ?></td>
                        <td><?php echo $dados['cidade'] ?></td>
                        <td><?php echo $dados['uf'] ?></td>
                        <td><?php echo $dados['numero'] ?></td>
                        <td><?php echo $dados['data_nasc'] ?></td>
                        <td><?php echo $dados['complemento'] ?></td>
                        <td><img src="<?=$dados['foto']?>" alt="foto funcionario" width="50"></td>
                        <td><?php echo $dados['formacao'] ?></td>
                        <td><?php echo $dados['cpf'] ?></td>
                        <td><?php echo $dados['matricula_func'] ?></td>
                        <td><?php echo $dados['email'] ?></td>
                        <td><?php echo $dados['data_ingresso'] ?></td>

                        <td colspan="2" class="text-center">
                            <a class='btn btn-info btn-sm'
                                href='editaUsuario.php?cod_funcionarios=<?php echo $dados['cod_funcionarios'] ?>'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='#'
                                onclick='confirmar("<?php echo $dados['cod_funcionarios'] ?>")'>Excluir</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
        <script>
        function confirmar(cod_funcionarios) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiUsuario.php?cod_funcionarios=' + cod_funcionarios;
        }
        </script>

</body>

</html>