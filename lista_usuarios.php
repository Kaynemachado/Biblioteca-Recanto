<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Recanto do Saber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="emprestimo.js" defer></script>

    <?php
    include('conexaobanco.php');
    include('pag_logado.php');
    include('bibliotecaria.php');
    include('menu_simples_funcionario.php');

    $sql = "SELECT alunos.cod_aluno, usuario.cod_usuario, usuario.username, usuario.nome, usuario.genero, usuario.telefone, usuario.rua, usuario.bairro, usuario.cidade, usuario.uf, usuario.numero, usuario.data_nasc, usuario.complemento, alunos.turno, alunos.regente, alunos.turma, alunos.matricula_aluno, usuario.foto, usuario.cpf, usuario.email FROM alunos,usuario
  where alunos.cod_usuario=usuario.cod_usuario";
    $query = mysqli_query($conn, $sql);
    ?>

    <style>
        .hidden {
            display: none;
        }

        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Open Sans", sans-serif
        }

        #customers {
            border-collapse: collapse;
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

        #customers td,
        #customers th {
            border: 1px solid #ddd;
        }

        table {
            margin: 5px;
            margin-top: 60px;
        }
        .conteudo {
            display: inline-block;
        }

        body {
            overflow-x: scroll;
        }

        .form-control {
            margin: 5px;
            display: inline-block
        }

        .form-group{
            margin-top: 30px;
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
                <h1 style="padding-top: 30px;padding-right:250px;">Usuários cadastrados</h1>
            </div>
            <input class="form-control w3-margin" class="w3-right" style="width: 40%;" type="text" name="nome_usuario" id="pesquisa" size="10%" placeholder="Pesquisar">
            <a href="TCA_NewSite.php" style="margin-bottom: 40px; margin-right:40px; margin-top: 5px;" type="button" class="btn form-group w3-theme-l1 w3-right">Cadastrar Novo</a>
        </div>
    </div>

    <table id="customers" class="table">
        <thead>
            <tr class="w3-theme-l2">
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
                <th>Turno</th>
                <th>Regente</th>
                <th>Turma</th>
                <th>Matrícula</th>
                <th>Foto</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Senhas</th>

                <th class='text-center'><b>Ação</b></th>
            </tr>

            <?php while ($dados = mysqli_fetch_array($query)) { ?>
                <tr class="div_user" nome_user="<?= $dados['nome'] ?>" id="div_<?= $dados['cod_aluno'] ?>">

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
                    <td><?php echo $dados['turno'] ?></td>
                    <td><?php echo $dados['regente'] ?></td>
                    <td><?php echo $dados['turma'] ?></td>
                    <td><?php echo $dados['matricula_aluno'] ?></td>
                    <td><img src="<?= $dados['foto'] ?>" alt="foto aluno" width="50"></td>
                    <td><?php echo $dados['cpf'] ?></td>
                    <td><?php echo $dados['email'] ?></td>
                    <td><?php echo $dados['username'] ?></td>
                    <td>***********</td>

                    <td colspan="2" class="text-center btn-group-vertical">
                        <button type="submit" class="btn w3-theme-l1 btn-sm" style="margin:2px;" data-bs-toggle="modal" href="editaAlunos.php" data-bs-target="#modal<?= $dados['cod_aluno'] ?>">
                            Editar
                        </button>
                        <button class='btn w3-theme-l1 btn-sm' style="margin:2px;" onclick="confirmar('<?= $dados['cod_usuario'] ?>')"> Excluir</button>
                    </td>

                </tr>

                <div class="modal fade" id="modal<?= $dados['cod_aluno'] ?>" tabindex="-1" aria-labelledby="<?= $dados['cod_aluno'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="editaAlunos.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input style="width: 47%;"  title="Nome Completo" class="form-control" type="text" name="nome" value="<?= $dados['nome'] ?>">
                                        <select style="width: 47%;"  title="Gênero" class="form-control" name="genero">
                                            <option value="Feminino" <?= $dados['genero'] == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                                            <option value="Masculino" <?= $dados['genero'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                            <option value="Prefiro não responder" <?= $dados['genero'] == 'manutençao' ? 'selected' : '' ?>>Prefiro não responder</option>
                                        </select>
                                        <input style="width: 47%;"  title="Telefone" class="form-control" type="varchar" name="telefone" id="" value="<?= $dados['telefone'] ?>">
                                        <input style="width: 47%;"  title="Rua" class="form-control" type="text" name="rua" id="" value="<?= $dados['rua'] ?>">
                                        <input style="width: 47%;"  title="Bairro" class="form-control" type="text" name="bairro" id="" value="<?= $dados['bairro'] ?>">
                                        <input style="width: 47%;"  title="Cidade" class="form-control" type="text" name="cidade" id="" value="<?= $dados['cidade'] ?>">
                                        <select style="width: 47%;"  title="UF" class="form-control" type="text" name="uf">
                                            <option value="SC" <?= $dados['uf'] == 'SC' ? 'selected' : '' ?>>SC</option>
                                            <option value="PR" <?= $dados['uf'] == 'PR' ? 'selected' : '' ?>>PR</option>
                                            <option value="RS" <?= $dados['uf'] == 'RS' ? 'selected' : '' ?>>RS</option>
                                            <option value="Outra" <?= $dados['uf'] == 'Outra' ? 'selected' : '' ?>>Outra</option>
                                        </select>
                                        <input style="width: 47%;"  title="Número Residencial" class="form-control" type="varchar" name="numero" id="" value="<?= $dados['numero'] ?>">
                                        <input style="width: 47%;"  title="Data de Nascimento" class="form-control" type="date" name="data_nasc" id="" value="<?= $dados['data_nasc'] ?>">
                                        <input style="width: 47%;"  title="Complemento" class="form-control" type="text" name="complemento" id="" value="<?= $dados['complemento'] ?>">
                                        <input style="width: 47%;"  title="CPF" class="form-control" type="number" name="cpf" id="" value="<?= $dados['cpf'] ?>">
                                        <input style="width: 47%;"  title="E-mail" class="form-control" type="email" name="email" id="" value="<?= $dados['email'] ?>">
                                        <select style="width: 47%;" title="Turno" class="form-control" type="text" name="turno">
                                            <option value="Vespertino" <?= $dados['turno'] == 'Vespertino' ? 'selected' : '' ?>>Vespertino</option>
                                            <option value="Matutino" <?= $dados['turno'] == 'Matituno' ? 'selected' : '' ?>>Mastutino</option>
                                            <option value="Integral" <?= $dados['turno'] == 'Integral' ? 'selected' : '' ?>>Integral</option>
                                        </select>
                                        <input style="width: 47%;"  title="Regente da Turma" class="form-control" type="text" name="regente" id="" value="<?= $dados['regente'] ?>">
                                        <input style="width: 47%;"  title="Turma" class="form-control" type="text" name="turma" id="" value="<?= $dados['turma'] ?>">
                                        <input type="hidden" name="cod_aluno" value="<?= $dados['cod_aluno'] ?>">
                                        <input style="width: 47%;"  title="Matrícula" class="form-control" type="number" name="matricula_aluno" id="" value="<?= $dados['matricula_aluno'] ?>">
                                        <input type="file" name="foto" id="foto_input"  onchange="document.querySelector('#modal<?= $dados['cod_aluno'] ?> #nochange').value = false;">
                                        <input type="hidden" name="nochange" id="nochange" value="true">
                                        <input type="hidden" name="old" value="<?= $dados['foto'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" name="Salvar">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
    </table>
    </div>
    <script>
        function confirmar(cod_aluno) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiUsuarios.php?cod_aluno=' + cod_aluno;
        }
    </script>

</body>

</html>