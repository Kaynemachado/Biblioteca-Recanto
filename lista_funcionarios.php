<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Recanto do Saber</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="emprestimo.js" defer></script>


    <?php
    include('conexaobanco.php');
    include('pag_logado.php');
    include('bibliotecaria.php');
    include('menu_simples_funcionario.php');

    $sql = "SELECT funcionarios.cod_funcionario, usuario.cod_usuario, usuario.nome, usuario.genero, usuario.telefone, usuario.rua, usuario.bairro, usuario.cidade, usuario.uf, usuario.numero, usuario.data_nasc, usuario.complemento, usuario.foto, funcionarios.formacao, usuario.cpf, funcionarios.matricula_func, usuario.email, funcionarios.data_ingresso FROM funcionarios,usuario 
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

        .hidden {
            display: none;
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
            margin-top: 30px;
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
                <h1 style="padding-top: 30px; padding-right: 200px;">Funcionários cadastrados</h1>
            </div>
            <input class="form-control w3-margin" class="w3-right" style="width: 40%;" type="text" name="nome_usuario" id="pesquisa" size="10%" placeholder="Pesquisar">
            <a href="newsite.php" style="margin-bottom: 40px; margin-right: 20px; margin-top: 5px;" type="button" class="btn form-group w3-theme-l1 w3-right">Cadastrar Novo</a>
        </div>
    </div>



    <table id="customers" class="table">
        <thead>
            <tr class="w3-theme-l2">
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
                <tr class="div_user" nome_user="<?= $dados['nome'] ?>" id="div_<?= $dados['cod_funcionario'] ?>">

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
                    <td><img src="<?= $dados['foto'] ?>" alt="foto funcionario" width="50"></td>
                    <td><?php echo $dados['formacao'] ?></td>
                    <td><?php echo $dados['cpf'] ?></td>
                    <td><?php echo $dados['matricula_func'] ?></td>
                    <td><?php echo $dados['email'] ?></td>
                    <td><?php echo $dados['data_ingresso'] ?></td>

                    <td colspan="2" class="text-center btn-group-vertical">
                        <button type="submit" class='btn w3-theme-l1 btn-sm' style="margin:2px;" data-bs-toggle="modal" href="editaFuncionarios.php" data-bs-target="#modal<?= $dados['cod_funcionario'] ?>">Editar</a>
                        
                        <button class='btn w3-theme-l1 btn-sm' style="margin:2px;" onclick="confirmar('<?= $dados['cod_usuario'] ?>')">Excluir</button>
                    </td>
                </tr>

                <div class="modal fade" id="modal<?= $dados['cod_funcionario'] ?>" tabindex="-1" aria-labelledby="<?= $dados['cod_funcionario'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="editaFuncionarios.php" method="post" enctype="multipart/form-data">
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
                                        <input style="width: 47%;"  title="Formação Acadêmica" class="form-control" type="text" name="formacao" id="" value="<?= $dados['formacao'] ?>">
                                        <input style="width: 47%;"  title="CPF" class="form-control" type="number" name="cpf" id="" value="<?= $dados['cpf'] ?>">
                                        <input style="width: 47%;"  title="Matrícula" class="form-control" type="text" name="matricula_func" id="" value="<?= $dados['matricula_func'] ?>">
                                        <input style="width: 47%;"  title="E-mail" class="form-control" type="email" name="email" id="" value="<?= $dados['email'] ?>">
                                        <input style="width: 97%;"  title="Data de Ingresso" class="form-control" type="date" name="data_ingresso" id="" value="<?= $dados['data_ingresso'] ?>">
                                        
                                        <input type="file" name="foto" id="foto_input"  onchange="document.querySelector('#modal<?= $dados['cod_funcionario'] ?> #nochange').value = false;">
                                        <input type="hidden" name="nochange" id="nochange" value="true"><input type="hidden" name="cod_funcionario" value="<?= $dados['cod_funcionario'] ?>">
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
        function confirmar(cod_funcionario) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiFuncionarios.php?cod_funcionario=' + cod_funcionario;
        }
    </script>

</body>

</html>