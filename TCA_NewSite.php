<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro do Aluno</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<?php
include('conexaobanco.php');
include('pag_logado.php');
include('bibliotecaria.php');
include('menu_funcionario.php');

if (isset($_POST['Enviar'])) { // Verifica se a variável foi iniciada (botão pressionado)
    $nome = $_POST['nome']; //Envia dados do formulário - campo nome
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade =  $_POST['cidade'];
    $uf =  $_POST['uf'];
    $numero = $_POST['numero'];
    $data_nasc =  $_POST['data_nasc'];
    $complemento =  $_POST['complemento'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $turno = $_POST['turno'];
    $regente = $_POST['regente'];
    $turma = $_POST['turma'];
    $matricula_aluno = $_POST['matricula_aluno'];
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    $pasta_uploads = "arquivos/";
    $extensao = strtolower(pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION));
    $arquivo_final = $pasta_uploads . time() . $username . '.'. $extensao;
    $uploadOk = 1;
  
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
  
    if($check == false) {
      $uploadOk = 0;
    }
    if (file_exists($arquivo_final)) {
      $uploadOk = 0;
    }
    if ($_FILES["foto"]["size"] > 500000) {
      $uploadOk = 0;
    }
  
    if($uploadOk == 0){
      echo "<script> alert('Ocorreu algum erro.') </script>";
      exit;
    }else{
      if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_final)) {
          echo "<script> alert('Ocorreu algum erro.') </script>";
          exit;
        }
    }
  
    $sql = "INSERT INTO usuario (nome, genero, telefone, rua, bairro, cidade, uf, numero, data_nasc,
    complemento, foto, cpf, email, username, senha) 
            VALUES ('$nome', '$genero', '$telefone', '$rua', '$bairro','$cidade', '$uf','$numero', '$data_nasc',
            '$complemento', '$arquivo_final', '$cpf','$email', '$username','$senha')";
    
    //Faltava essa linha    
    mysqli_query($conn, $sql);
    
    $sql = "INSERT INTO alunos ( turno, regente, turma, matricula_aluno, cod_usuario) 
            VALUES ('$turno', '$regente', '$turma', '$matricula_aluno', (select max(cod_usuario) from usuario))";
    
    
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) { 
        echo "<script> alert('Usuário cadastrado com sucesso.') </script>";
        } 
        else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<head>

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: "Open Sans", sans-serif;
        background: #f1f1f1;
    }

    /* Cabeçalho*/

    .card {
        text-align: justify;
        padding: 5px;
    }

    /* Crie duas colunas desiguais que flutuem uma ao lado da outra */
    /* Coluna Esquerda */
    .colunaesquerda {
        float: left;
        width: 75%;
    }

    /* Coluna Direita */
    .colunadireita {
        float: center;
        width: 25%;
        background-color: #f1f1f1;
        padding-left: 10px;
        padding-top: 20px;

    }

    /* Barra lateral */
    .fakeimg {
        background-color: #ddd;
        width: 100%;
        padding: 10px;
    }

    /* Adicione um efeito de cartão para artigos */
    .formulario {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
        height: 690px;
    }

    .form-group {
        float: left;
        padding: 5px;
    }

    /* Limpar floats após as colunas */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Rodapé */
    .footer {
        padding: 25px;
        padding-bottom: 10px;
        text-align: center;
        background: #ddd;
        margin-top: 10px;
        font-weight: bold;
    }

    /* Layout responsivo - quando a tela tiver menos de 800px de largura, 
faça as duas colunas empilharem uma sobre a outra em vez de uma ao lado da outra */
    @media screen and (max-width: 800px) {

        .colunaesquerda,
        .colunadireita {
            width: 100%;
            padding: 0;
        }
    }

    /* Layout responsivo - quando a tela tiver menos de 400px de largura, 
faça os links de navegação empilharem um sobre o outro em vez de um ao lado do outro*/
    @media screen and (max-width: 400px) {
        .menu a {
            float: none;
            width: 100%;
        }
    }
    </style>
</head>

<body>

    <div class="row">
        <div class="colunaesquerda">
            <div class="formulario">
                <form method="post" enctype="multipart/form-data">
                    <h1><span style="background: #ddd; border-radius:5px; padding:5px">Cadastro do Aluno</h1>
                    <br>

                    <div class="form-group">
                        Nome Completo:
                        <p> <input class="form-control" type="text" name="nome" size="51" />
                    </div>

                    <div class="form-group">
                        Gênero
                        <select class="form-control" name="genero">
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Prefiro não diser">Prefiro não responder</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Telefone:
                        <p> <input class="form-control size: 5" type="VARCHAR" name="telefone" size="25">
                    </div>

                    <div class="form-group">
                        Rua:
                        <input class="form-control" type="text" name="rua" size="50">
                    </div>
                    <br>

                    <div class="form-group">
                        Bairro:
                        <input class="form-control" type="text" name="bairro" size="30">
                    </div>
                    <br>

                    <div class="form-group">
                        Cidade:
                        <input class="form-control" type="text" name="cidade" size="13.99"></p>
                    </div>

                    <br>
                    <div class="form-group">
                        UF:
                        <p><select class="form-control" name="">uf
                                <option value="SC">SC</option>
                                <option value="PR">PR</option>
                                <option value="RS">RS</option>
                                <option value="Outra">Outra</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <p>Número Residencial: <input class="form-control" type="varchar" name="numero" /></p>
                    </div>

                    <div class="form-group">
                        <p>Data de Nascimento: <input class="form-control" type="date" name="data_nasc" /></p>
                    </div>

                    <div class="form-group">
                        <p> Complemento: <input class="form-control" type="text" name="complemento" size="51">
                        </p>
                    </div>

                    <div class="form-group">
                        Turno:
                        <p><select class="form-control" name="turno">
                                <option value="SC">Vespertino</option>
                                <option value="PR">Matutino</option>
                                <option value="RS">Integral</option>
                            </select>
                    </div>

                    <div class="form-group">
                        Regente de Turma:
                        <input class="form-control" type="text" name="regente" size="60"></p>
                    </div>
                    <div class="form-group">
                        Turma:
                        <input class="form-control" type="text" name="turma" size="25"></p>
                    </div>

                    <div class="form-group">
                        Matrícula do Aluno:
                        <input class="form-control " type="number" name="matricula_aluno" /></p>
                    </div>
                    <br> <br>
                    <div class="form-group">
                        CPF:
                        <p> <input class="form-control" type="number" name="cpf" size="20" />
                    </div>

                    <div class="form-group">
                        E-mail:
                        <p> <input class="form-control" type="email" name="email" size="53" />
                    </div>

                    <div class="form-group">
                        Escolha um Username:
                        <p> <input class="form-control" type="text" name="username" placeholde="Ex: MariaCunha" size="53" />
                    </div>

                    <br>
                    <div class="form-group">
                        Insira uma Senha:
                        <p><input class="form-control" name="senha" type="password" size="46">
                    </div>
                    <br>
                    <p> <input type="file" placeholder="Importe uma foto" name="foto"> </p>

                    <div class="form-group ">
                        <p><input class="w3-button w3-theme-l1 " type="submit" value="Enviar" name="Enviar">
                            <input class="w3-button w3-theme-l1" type="reset" value="Limpar tudo">
                        </p>
                    </div>
                    </span>
                </form>
            </div>
        </div>


        <div class="colunadireita">
            <div class="card">
                <p><a href="cronograma.php" class="w3-button w3-block w3-theme-l4">Cronograma</a></p>
            </div>
            <br>
            <div class="card">
                <h4 style="text-align: center;">Regulamento da Biblioteca</h4>
                <div class="fakeimg">
                    <p> - A Biblioteca Recanto do Saber é aberta de segunda a sexta das 7h45 até as 17h, tendo
                        seus horários de atendidos conforme as aulas de língua portuguesa.</p>
                    <p>- Os empréstimos são realizados semanalmente
                        podendo renovar dependendo da quantidade de páginas que venha ter o livro emprestado.</p>
                    <p>- Caso o exemplar emprestado seja perdido, cobramos um o valor respectivo.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
        <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
    </footer>


</body>

</html>