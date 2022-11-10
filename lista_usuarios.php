<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>| Acervo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="emprestimo.js" defer ></script>

    <?php
  include('conexaobanco.php');
  include('pag_logado.php');
  include('bibliotecaria.php');
  include('menu_simples_funcionario.php');
  /*include('edita_usuario.php');*/

  $sql = "SELECT alunos.cod_aluno, usuario.username, usuario.nome, usuario.genero, usuario.telefone, usuario.rua, usuario.bairro, usuario.cidade, usuario.uf, usuario.numero, usuario.data_nasc, usuario.complemento, alunos.turno, alunos.regente, alunos.turma, alunos.matricula_aluno, usuario.foto, usuario.cpf, usuario.email FROM alunos,usuario
  where alunos.cod_usuario=usuario.cod_usuario";
$query = mysqli_query($conn, $sql);
  ?>

    <style>
                        .hidden{
            display:none;
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

    .conteudo{
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
        <h1 style="padding-top: 30px;padding-left:30px; width:50%;">Usuários cadastrados</h1>
</div>
<div class="form-group">
<input class="form-control w3-margin " style="width: 50%; " type="text" name="nome_usuario" id="pesquisa" size="10%" placeholder="Pesquisar">
</div>
</div>
      
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
                        <tr class="div_user" nome_user="<?=$dados['nome']?>" id="div_<?=$dados['cod_aluno']?>">
                        
                        <td class="text-center"><?php echo $dados['cod_aluno'] ?></td>
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
                        <td><img src="<?=$dados['foto']?>" alt="foto aluno" width="50"></td>
                        <td><?php echo $dados['cpf'] ?></td>
                        <td><?php echo $dados['email'] ?></td>
                        <td><?php echo $dados['username'] ?></td>
                        <td>***********</td>

                        <td colspan="2" class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$dados['cod_livro']?>">
                         Editar
                        </button>
                        </td>

                        <td colspan="2" class="text-center">
                            <a class='btn btn-danger btn-sm' href='excluiUsuario.php'
                                onclick='confirmar("<?php echo $dados['cod_aluno']?>"> Excluir</a>
                        </td>

                    </tr>
                    <?php } ?>
            </table>
        </div>
        <script>
        function confirmar(cod_aluno) {
            if (confirm('Você realmente deseja excluir esta linha?'))
                location.href = 'excluiUsuario.php?cod_aluno=' + cod_aluno;
        }
        </script>

</body>

</html>