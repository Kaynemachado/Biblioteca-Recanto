<!DOCTYPE html>
<html>
<title>Cadastro do Funcionário</title>
<?php

include('conexaobanco.php');
include('pag_logado.php');
include('bibliotecaria.php');
include('menu_funcionario.php');

if (isset($_POST['Enviar'])) { // Verifica se a variável foi iniciada (botão pressionado)
  $nome = $_POST['nome']; //Envia dados do formulário - campo nome
  $genero = $_POST['genero'];
  $telefone = $_POST['telefone'];
  $rua =  $_POST['rua'];
  $bairro = $_POST['bairro'];
  $cidade =  $_POST['cidade'];
  $uf =  $_POST['uf'];
  $numero = $_POST['numero'];
  $data_nasc =  $_POST['data_nasc'];
  $complemento = $_POST['complemento'];
  $formacao =  $_POST['formacao'];
  $cpf =  $_POST['cpf'];
  $matricula_func =  $_POST['matricula_func'];
  $email =  $_POST['email'];
  $data_ingresso =  $_POST['data_ingresso'];
  $username =  $_POST['username'];
  $senha =  $_POST['senha'];

  if($_FILES["foto"]["tmp_name"] != ''){

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
      $sql = "INSERT INTO usuario (nome, genero, telefone, rua, bairro, cidade, uf, numero, data_nasc, complemento, foto, email, username, senha)
              VALUES ('$nome', '$genero', '$telefone', '$rua', '$bairro','$cidade', '$uf', '$numero','$data_nasc', '$complemento', '$arquivo_final','$email', '$username', '$senha')";
    
    
    mysqli_query($conn, $sql);
  }else{
    $sql = "INSERT INTO usuario (nome, genero, telefone, rua, bairro, cidade, uf, numero, data_nasc, complemento, email, username, senha)
    VALUES ('$nome', '$genero', '$telefone', '$rua', '$bairro','$cidade', '$uf', '$numero','$data_nasc', '$complemento','$email', '$username', '$senha')";


mysqli_query($conn, $sql);
  }

if (mysqli_affected_rows($conn) > 0) { 
    $sql = "INSERT INTO funcionarios (formacao, matricula_func, data_ingresso, cod_usuario)
          VALUES ('$formacao', '$matricula_func', '$data_ingresso', (select max(cod_usuario) from usuario))";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) { 
            echo "<script> alert('Usuário cadastrado com sucesso.') </script>";
        } 
        else {
            echo "<script> alert('Ocorreu algum erro.') </script>";
        }
    } 
    else {
    echo "<script> alert('Ocorreu algum erro.') </script>";

        
    }
 
}
?>
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<head>

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        background: #f1f1f1;
        font-family: "Open Sans", sans-serif;
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

    /* Limpar floats após as colunas */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .form-group {
        float: left;
        padding: 5px;
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
                    <h1><span style="background: #ddd; border-radius:5px; padding:5px">Cadastro do Funcionário</h1>
                    <br>

                    <div class="form-group">
                        Nome Completo:
                        <p> <input class="form-control" type="text" name="nome" size="51">
                    </div>

                    <div class="form-group">
                        Gênero:
                        <select class="form-control" name="genero">
                            <option value="Feminino">Feminino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Prefiro não dizer">Prefiro não responder</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Telefone:
                        <p> <input class="form-control" type="VARCHAR" name="telefone" size="25">
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
                        <input class="form-control" type="text" name="cidade" size="13"></p>
                    </div>

                    <br>
                    <div class="form-group">
                        UF:
                        <p><select class="form-control" name="uf">
                                <option value="SC">SC</option>
                                <option value="PR">PR</option>
                                <option value="RS">RS</option>
                                <option value="Outra">Outra</option>
                            </select>
                    </div>

                    <div class="form-group">
                        Número Residencial:
                        <input class="form-control" type="number" name="numero">
                    </div>


                    <div class="form-group">
                        <p>Data de Nascimento: <input class="form-control" type="date" name="data_nasc"></p>
                    </div>

                    <br>
                    <div class="form-group">
                        <p>Complemento: <input class="form-control" type="text" name="complemento" size="50">
                        </p>
                    </div>

                    <div class="form-group">
                        Formação Acadêmica:
                        <p> <input class="form-control" type="text" name="formacao" size="78"></p>
                    </div>

                    <div class="form-group">
                        CPF:
                        <p><input class="form-control" type="number" name="cpf" size="20">
                    </div>

                    <div class="form-group">
                        Matrícula:
                        <input class="form-control" type="number" name="matricula_func" size="15">
                    </div>
                    <br>

                    <div class="form-group">
                        E-mail:
                        <p><input class="form-control" type="email" name="email" size="65"></p>
                    </div>

                    <div class="form-group">
                        <p>Data de Ingresso: <input class="form-control" type="date" name="data_ingresso">
                    </div>

                    <div class="form-group">
                        Escolha um Username:
                        <p><input class="form-control" type="text" name="username" Placeholder="Ex: MariaCunha" size="59"></p>
                    </div>

                    <div class="form-group">
                        <p>Insira uma Senha: <input class="form-control" type="password" name="senha" size="39">
                    </div>
                    
                    
                        <p> <input name="foto" id="foto" type="file" placeholder="Importe uma foto"> </p>
                    
                    <div class="form-group">
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
                <p><button class="w3-button w3-block w3-theme-l4">Empréstimos</button></p>
                <p><a href="lista_funcionarios.php" class="w3-button w3-block w3-theme-l4">Listagens de Funcionarios</a>
                </p>
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