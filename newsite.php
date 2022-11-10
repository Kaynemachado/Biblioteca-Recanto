<!DOCTYPE html>
<html>
<title>Cadastro de Livro</title>
<?php
include('conexaobanco.php');
include('menu_funcionario.php');


if (isset($_POST['Enviar'])) {
  $titulo =  $_POST['titulo'];
  $autor =  $_POST['autor'];
  $editora =  $_POST['editora'];
  $sinopse =  $_POST['sinopse'];
  $isbn =  $_POST['isbn'];
  $faixa_etaria =  $_POST['faixa_etaria'];
  $numero_pag =  $_POST['numero_pag'];
  $quant_disponivel =  $_POST['quant_disponivel'];
  $genero_livro =  $_POST['genero_livro'];
  $status_livro = $_POST['status_livro'];
  $fonte = $_POST['fonte'];
  $data_lancamento =  $_POST['data_lancamento'];
  $comentarios = $_POST['comentarios'];
  
  $pasta_uploads = "arquivos/";
    $extensao = strtolower(pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION));
    $arquivo_final = $pasta_uploads . time() . $titulo . '.'. $extensao;
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



  $sql = "INSERT INTO livros (titulo, autor, editora, sinopse, isbn, foto_livro, faixa_etaria, numero_pag, quant_disponivel, genero_livro,
  status_livro, fonte, data_lancamento, comentarios) 
          VALUES ('$titulo', '$autor', '$editora', '$sinopse', '$isbn', '$arquivo_final', '$faixa_etaria', '$numero_pag', '$quant_disponivel',
          '$genero_livro', '$status_livro', '$fonte', '$data_lancamento', '$comentarios')";

  mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn) > 0) {
      echo "<script> alert('Livro cadastrado com sucesso.') </script>";
      } 
      else {
      echo "<script> alert('Ocorreu algum erro.') </script>";
  }
}


?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<head>
    <style>
    *s{
        box-sizing: border-box;
    }

    body {
        font-family: "Open Sans", sans-serif;
        background: #f1f1f1;
    }

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

    .formulario {
        background-color: white;
        margin-top: 20px;
        padding: 20px;
        height: 680px;
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
                    <h1><span style="background: #ddd; border-radius:5px; padding:5px">Cadastro do Exemplar</h1>
                    <br>

                    <div class="form-group">
                        Título:
                        <input class='form-control' type="text" name="titulo" size="54">
                    </div>

                    <div class="form-group">
                        Autor:
                        <input class="form-control" type="text" name="autor" size="46">
                    </div>

                    <div class="form-group">
                        Editora:
                        <input class="form-control" type="text" name="editora" size="54">
                    </div>
                    <br>

                    <div class="form-group">
                        ISBN:
                        <input class="form-control" type="text" name="isbn" size="46">
                    </div>
                    <br>

                    <div class="form-group">
                        Faixa Etária:
                        <input class="form-control" type="number" name="faixa_etaria" size="25">
                    </div>
                    <br>

                    <div class="form-group">
                        Nº de Páginas:
                        <input class="form-control" type="text" name="numero_pag" size="22S"/>
                        <br>
                    </div>
                    <div class="form-group">
                        Nº de exemplares:
                        <input class="form-control" type="text" name="quant_disponivel" size="20" >
                    </div>
                    <div class="form-group">
                        Gênero Textual:
                        <select class="form-control" name="genero_livro">
                            <option value="Fabula_Infantil">Fábula Infantil</option>
                            <option value="Literatura_Infantil">Literatura Infantil</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Novela_Teatro">Novelas / Teatro</option>
                            <option value="Literatura_Religiosa">Literatura Religiosa</option>
                            <option value="Folclore">Folclore</option>
                            <option value="Informativos">Informativos</option>
                            <option value="Quadrinhos">História em Quadrinhos</option>
                            <option value="Livros_Pre">Livros Pré</option>
                            <option value="Ficcao">Ficção Científica</option>
                            <option value="Distopia">Distopia</option>
                            <option value="Terror">Terror</option>
                            <option value="Poemas">Poemas</option>
                            <option value="Policial">Ficção Policial</option>
                            <option value="Acão_e_aventura">Ação e Aventura</option>
                            <option value="Conto">Conto Infantil</option>
                            <option value="Conto">Conto Infanti-juvenil</option>
                            <option value="Cronica">Crônica</option>
                            <option value="Literatura">Literatura Infanto-Juvenil</option>
                            <option value="Autoajuda">Autoajuda</option>
                            <option value="Memorias">Memórias e Autobiografias</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Status:
                        <select class="form-control" name="status_livro">
                            <option value="disponivel">Disponível</option>
                            <option value="indisponivel">Indisponível</option>
                            <option value="manutençao">Em manutenção</option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        Fonte:
                        <select class="form-control" name="fonte">
                            <option value="normal">Normal</option>
                            <option value="caixa">Caixa Alta</option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">              
                        Registrado em: <input class="form-control" type="date" name="data_lancamento">
                    </div>
                    <br>

                    <div class="form-group">
                        Comentários:
                        <input class="form-control" name="comentarios" type="text" size="40">
                    </div>
                    <br>

                    <div class="form-group">
                        Sinopse:
                        <textarea class="form-control" name="sinopse" rows="5" cols="80"></textarea>
                    </div>
                    <br>

                    <div class="form-group">
                        <input type="file" placeholder="Importe uma imagem" value="foto" name="foto">
                    </div>
                    <br>

                    <div class="form-group">
                        <input class="w3-button w3-theme-l1" type="submit" value="Enviar" name="Enviar">
                            <input class="w3-button w3-theme-l1" type="reset" value="Limpar tudo">
                        
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
                    <p>- A Biblioteca Recanto do Saber é aberta de segunda a sexta das 7h45 até as 17h, tendo
                        seus horários de atendidos conforme as aulas de língua portuguesa.</p>
                    <p>- Os empréstimos são realizados semanalmente
                        podendo renovar dependendo da quantidade de páginas que venha ter o livro emprestado.</p>
                    <p>- Caso o exemplar emprestado seja perdido, cobramos um o valor respectivo.</p>
                </div>
            </div>
            <br>
            <div class="card">
                <h4>Regulamento da Bilioteca</h4>
                <div class="fakeimg">
                    <p>Texto</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
        <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
    </footer>
</body>

</html>