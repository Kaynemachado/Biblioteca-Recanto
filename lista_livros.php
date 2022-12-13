<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Acervo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="busca_livros.js" defer></script>

    <?php
    include('conexaobanco.php');
    include('pag_logado.php');
    include('bibliotecaria.php');
    include('menu_simples_funcionario.php');

    $sql = "SELECT * FROM livros";
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

        .hidden {
            display: none;
        }

        .conteudo {
            display: inline-block;
        }

        .form-control {
            margin: 5px;
            display: inline-block
        }

        body {
            overflow-x: scroll;
        }

        #customers tr:hover {
            background-color: #ddd;
        }
        .bolinha{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
           
    </style>
</head>

<body class="w3-theme-l5">

    <div class="container">
        <br>
        <br>
        <div class="form-group">
            <div class="conteudo">
                <h1 style="padding-top: 30px; padding-right: 200px;">Acervo Recanto do Saber</h1>
            </div>
            <input class="form-control w3-margin" class="w3-right" style="width: 40%;" type="text" name="nome_titulo" id="pesquisa" size="10%" placeholder="Pesquisar">
            <a href="newsite.php" style="margin-bottom: 20px; margin-right:31px;" type="button" class="btn form-group w3-theme-l1 w3-right">Cadastrar Novo</a>
        </div>
    </div>


    <table id="customers" class="table">
        <thead>
            <tr class="w3-theme-l2">
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>ISBN</th>
                <th>Foto</th>
                <th>Série</th>
                <th>Nº de Páginas</th>
                <th>Nº de Exemplares</th>
                <th>Gênero</th>
                <th>Cor</th>
                <th>Status</th>
                <th>Fonte</th>
                <th>Data Lançamento</th>
                <th>Comentários</th>

                <th class="text-center" style="vertical-align: center;"><b>Ação</b></th>
            </tr>

            <?php while ($dados = mysqli_fetch_array($query)) { ?>
                <tr class="div_livro" nome_titulo="<?= $dados['titulo'] ?>" id="div_<?= $dados['cod_livro'] ?>">

                    <td class="text-center"><?php echo $dados['cod_livro'] ?></td>
                    <td><?php echo $dados['titulo'] ?></td>
                    <td><?php echo $dados['autor'] ?></td>
                    <td><?php echo $dados['editora'] ?></td>
                    <td><?php echo $dados['isbn'] ?></td>
                    <td><img src="<?= $dados['foto_livro'] ?>" alt="foto livro" width="50"></td>
                    <td><?php echo $dados['serie'] ?></td>
                    <td><?php echo $dados['numero_pag'] ?></td>
                    <td><?php echo $dados['quant_disponivel'] ?></td>
                    <td><?php echo $dados['genero_livro'] ?></td>
                    <td>
                        <div class="bolinha" style="background-color: <?=$dados['cor']?>;"></div>
                    </td>
                    <td><?php echo $dados['status_livro'] ?></td>
                    <td><?php echo $dados['fonte'] ?></td>
                    <td><?php echo $dados['data_lancamento'] ?></td>
                    <td><?php echo $dados['comentarios'] ?></td>


                    <td colspan="2" class="text-center btn-group-vertical" >
                        <button type="button" class="btn w3-theme-l1 btn-sm" style="margin:2px;" data-bs-toggle="modal" data-bs-target="#modal<?= $dados['cod_livro'] ?>">
                            Editar
                        </button>
                        <a class='btn w3-theme-l1 btn-sm' style="margin:2px;" href='#' onclick='confirmar(<?php echo $dados['cod_livro'] ?>)'>Excluir</a>
                        <a class='btn w3-theme-l1 btn-sm' style="margin:2px;" href='emprestimo.php?cod_livro=<?= $dados['cod_livro'] ?>'>Emprestar</a>
                    </td>
                </tr>
                <div class="modal fade" id="modal<?= $dados['cod_livro'] ?>" tabindex="-1" aria-labelledby="<?= $dados['cod_livro'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="editaLivros.php" method="post">
                                    <div class="form-group">
                                        <input style="width: 47%;" title="Título" class="form-control" type="text" name="titulo" value="<?= $dados['titulo'] ?>">
                                        <input style="width: 47%;" title="Autor" class="form-control" type="text" name="autor" id="" value="<?= $dados['autor'] ?>">
                                        <input style="width: 47%;" title="Editora" class="form-control" type="text" name="editora" id="" value="<?= $dados['editora'] ?>">
                                        <input style="width: 47%;" title="ISBN" class="form-control" type="text" name="isbn" id="" value="<?= $dados['isbn'] ?>">
                                        <input style="width: 47%;" title="Foto do Exemplar" class="form-control" type="file  " name="foto_livro" id="" value="<?= $dados['foto_livro'] ?>">
                                        <input style="width: 47%;" title="Série" class="form-control" type="text" name="serie" id="" value="<?= $dados['serie'] ?>">
                                        <input style="width: 47%;" title="N° de Páginas" class="form-control" type="text" name="numero_pag" id="" value="<?= $dados['numero_pag'] ?>">
                                        <input style="width: 47%;" title="N° de Exemplares" class="form-control" type="text" name="quant_disponivel" id="" value="<?= $dados['quant_disponivel'] ?>">

                                        <select style="width: 47%;" title="Gênero Textual" class="form-control" name="genero_livro">
                                            <option value="Fabula_Infantil" <?= $dados['genero_livro'] == 'Fabula_Infantil' ? 'selected' : '' ?>>Fábula Infantil</option>
                                            <option value="Literatura_Infantil" <?= $dados['genero_livro'] == 'Literatura_Infantil' ? 'selected' : '' ?>>Literatura Infantil</option>
                                            <option value="Fantasia" <?= $dados['genero_livro'] == 'Fantasia' ? 'selected' : '' ?>>Fantasia</option>
                                            <option value="Novela_Teatro" <?= $dados['genero_livro'] == 'Novela_Teatro' ? 'selected' : '' ?>>Novelas / Teatro</option>
                                            <option value="Literatura_Religiosa" <?= $dados['genero_livro'] == 'Literatura_Religiosa' ? 'selected' : '' ?>>Literatura Religiosa</option>
                                            <option value="Folclore" <?= $dados['genero_livro'] == 'Folclore' ? 'selected' : '' ?>>Folclore</option>
                                            <option value="Informativos" <?= $dados['genero_livro'] == 'Informativos' ? 'selected' : '' ?>>Informativos</option>
                                            <option value="Quadrinhos" <?= $dados['genero_livro'] == 'Quadrinhos' ? 'selected' : '' ?>>História em Quadrinhos</option>
                                            <option value="Livros_Pre" <?= $dados['genero_livro'] == 'Livros_Pre' ? 'selected' : '' ?>>Livros Pré</option>
                                            <option value="Ficcao" <?= $dados['genero_livro'] == 'Ficcao' ? 'selected' : '' ?>>Ficção Científica</option>
                                            <option value="Distopia" <?= $dados['genero_livro'] == 'Distopia' ? 'selected' : '' ?>>Distopia</option>
                                            <option value="Terror" <?= $dados['genero_livro'] == 'Terror' ? 'selected' : '' ?>>Terror</option>
                                            <option value="Poemas" <?= $dados['genero_livro'] == 'Poemas' ? 'selected' : '' ?>>Poemas</option>
                                            <option value="Policial" <?= $dados['genero_livro'] == 'Policial' ? 'selected' : '' ?>>Ficção Policial</option>
                                            <option value="Acao_e_aventura" <?= $dados['genero_livro'] == 'Acao_e_aventura' ? 'selected' : '' ?>>Ação e Aventura</option>
                                            <option value="Conto" <?= $dados['genero_livro'] == 'Conto' ? 'selected' : '' ?>>Conto Infantil</option>
                                            <option value="Cronica" <?= $dados['genero_livro'] == 'Cronica' ? 'selected' : '' ?>>Crônica</option>
                                            <option value="Literatura" <?= $dados['genero_livro'] == 'Literatura' ? 'selected' : '' ?>>Literatura Infanto-Juvenil</option>
                                            <option value="Autoajuda" <?= $dados['genero_livro'] == 'Autoajuda' ? 'selected' : '' ?>>Autoajuda</option>
                                            <option value="Memorias" <?= $dados['genero_livro'] == 'Memorias' ? 'selected' : '' ?>>Memórias e Autobiografias</option>
                                        </select>

                                        <select style="width: 47%;" title="Status do Exemplar" class="form-control" name="status_livro">
                                            <option value="disponivel" <?= $dados['status_livro'] == 'disponivel' ? 'selected' : '' ?>>Disponível</option>
                                            <option value="indisponivel" <?= $dados['status_livro'] == 'indisponivel' ? 'selected' : '' ?>>Indisponível</option>
                                            <option value="manutençao" <?= $dados['status_livro'] == 'manutençao' ? 'selected' : '' ?>>Em manutenção</option>
                                        </select>

                                        <select style="width: 47%;" title="Fonte" class="form-control" name="fonte">
                                            <option value="Normal" <?= $dados['fonte'] == 'Normal' ? 'selected' : '' ?>>Normal</option>
                                            <option value="Caixa_Alta" <?= $dados['fonte'] == 'Caixa_Alta' ? 'selected' : '' ?>>Caixa Alta</option>
                                        </select>

                                        <input style="width: 47%;" title="Cor" class="form-control" type="color" name="cor" id="" value="<?= $dados['cor'] ?>">

                                        <input style="width: 47%;" title="Data de Registro" class="form-control" type="date" name="data_lancamento" id="" value="<?= $dados['data_lancamento'] ?>">
                                        <input style="width: 97%;" title="Comentários" class="form-control" type="text" name="comentarios" id="" value="<?= $dados['comentarios'] ?>">
                                        <input type="hidden" name="cod_livro" value="<?= $dados['cod_livro'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" value="Salvar" name="Salvar">Salvar</button>
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
        function confirmar(cod_livro) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiLivros.php?cod_livro=' + cod_livro;
        }
    </script>

</body>

</html>