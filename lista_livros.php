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
<script src="busca_livros.js" defer ></script>

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

    .hidden{
            display:none;
        }
    .conteudo {
        display: inline-block;
    }

    .form-control{
        margin: 5px;
        display: inline-block
    }
    </style>
</head>

<body class="w3-theme-l5">

    <div class="container">
        <br>
        <br>
        <div class="form-group">
        <div class="conteudo" style="40%">
            <h1 style="padding-top: 30px; padding-right: 200px;">Acervo Recanto do Saber</h1>
        </div>
<input class="form-control w3-margin" class="w3-right" style="width: 40%;" type="text" name="nome_titulo" id="pesquisa" size="10%" placeholder="Pesquisar">
</div>
</div>


            <table class="table w3-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>ISBN</th>
                        <th>Foto</th>
                        <th>Faixa Etária</th>
                        <th>Nº de Páginas</th>
                        <th>Nº de Exemplares</th>
                        <th>Gênero</th>
                        <th>Status</th>
                        <th>Fonte</th>
                        <th>Data Lançamento</th>
                        <th>Comentários</th>

                        <th class='text-center'><b>Ação</b></th>
                    </tr>

                    <?php while ($dados = mysqli_fetch_array($query)) { ?>
                        <tr class="div_livro" nome_titulo="<?=$dados['titulo']?>" id="div_<?=$dados['cod_livro']?>">

                        <td class="text-center"><?php echo $dados['cod_livro'] ?></td>
                        <td><?php echo $dados['titulo'] ?></td>
                        <td><?php echo $dados['autor'] ?></td>
                        <td><?php echo $dados['editora'] ?></td>
                        <td><?php echo $dados['isbn'] ?></td>
                        <td><img src="<?=$dados['foto_livro']?>" alt="foto livro" width="50"></td>
                        <td><?php echo $dados['faixa_etaria'] ?></td>
                        <td><?php echo $dados['numero_pag'] ?></td>
                        <td><?php echo $dados['quant_disponivel'] ?></td>
                        <td><?php echo $dados['genero_livro'] ?></td>
                        <td><?php echo $dados['status_livro'] ?></td>
                        <td><?php echo $dados['fonte'] ?></td>
                        <td><?php echo $dados['data_lancamento'] ?></td>
                        <td><?php echo $dados['comentarios'] ?></td>


                        <td colspan="2" class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$dados['cod_livro']?>">
                         Editar
                        </button>
                        
                        
                            <a class='btn btn-danger btn-sm' href='#'
                                onclick='confirmar(<?php echo $dados['cod_livro'] ?>)'>Excluir</a>
                            <a class='btn btn-info btn-sm'
                                href='emprestimo.php?cod_livro=<?=$dados['cod_livro'] ?>'>Empréstimo</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?=$dados['cod_livro']?>" tabindex="-1" aria-labelledby="<?=$dados['cod_livro']?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <input style="width: 47%;" class="form-control" type="text" name="titulo" value="<?=$dados['titulo']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="autor" id="" value="<?=$dados['autor']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="editora" id="" value="<?=$dados['editora']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="isbn" id="" value="<?=$dados['isbn']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="faixa_etaria" id="" value="<?=$dados['faixa_etaria']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="npaginas" id="" value="<?=$dados['numero_pag']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="nexemplares" id="" value="<?=$dados['quant_disponivel']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="genero" id="" value="<?=$dados['genero_livro']?>">
                                <select style="width: 97%;" class="form-control" name="status_livro">
                                    <option value="disponivel" <?=$dados['status_livro'] == 'disponivel' ? 'selected' : ''?>>Disponível</option>
                                    <option value="indisponivel" <?=$dados['status_livro'] == 'indisponivel' ? 'selected' : ''?>>Indisponível</option>
                                    <option value="manutençao"  <?=$dados['status_livro'] == 'manutençao' ? 'selected' : ''?>>Em manutenção</option>
                                </select>
                                <input style="width: 47%;" class="form-control" type="text" name="genero" id="" value="<?=$dados['fonte']?>">
                                <input style="width: 47%;" class="form-control" type="date" name="genero" id="" value="<?=$dados['data_lancamento']?>">
                                <input style="width: 47%;" class="form-control" type="text" name="genero" id="" value="<?=$dados['comentarios']?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Salvar</button>
                            </div>
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