
<?php
include('conexaobanco.php');

$cod_funcionario = $_POST['cod_funcionario'];

if (isset($_POST['Salvar'])) {
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
    $formacao =  $_POST['formacao'];
    $cpf = $_POST['cpf'];
    $matricula_func = $_POST['matricula_func'];
    $email = $_POST['email'];
    $data_ingresso = $_POST['data_ingresso'];
    $nochange = $_POST['nochange'];

    $sql = "UPDATE funcionarios SET 
                formacao='$formacao', 
                matricula_func='$matricula_func', 
                data_ingresso='$data_ingresso'
            WHERE cod_funcionario='$cod_funcionario'"; 
    mysqli_query($conn, $sql);

    if ($nochange == 'false') {
        $pasta_uploads = "arquivos/";
        $extensao = strtolower(pathinfo(basename($_FILES["foto"]["name"]), PATHINFO_EXTENSION));
        $arquivo_final = $pasta_uploads . time() . $username . '.' . $extensao;
        $uploadOk = 1;

        $check = getimagesize($_FILES["foto"]["tmp_name"]);

        if ($check == false) {
            $uploadOk = 0;
        }
        if (file_exists($arquivo_final)) {
            $uploadOk = 0;
        }
        if ($_FILES["foto"]["size"] > 500000) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script> alert('Ocorreu algum erro.') </script>";
            // header("Location: lista_usuarios.php");
            exit;
        } else {
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_final)) {
                // header("Location: lista_usuarios.php");
                echo "<script> alert('Ocorreu algum erro.') </script>";
                exit;
            }else{
                unlink($_POST['old']);
            }
        }

    $sql = "UPDATE usuario SET 
    nome='$nome', 
    genero='$genero', 
    telefone='$telefone',
    rua='$rua',
    bairro='$bairro', 
    cidade='$cidade', 
    uf='$uf',
    numero='$numero',
    data_nasc='$data_nasc', 
    complemento='$complemento', 
    cpf='$cpf',
    email='$email',
    foto='$arquivo_final'
    WHERE cod_usuario=(select cod_usuario from funcionarios where cod_funcionario = '$cod_funcionario')"; /*Alunos ou Usuários*/
}else{
    $sql = "UPDATE usuario SET 
    nome='$nome', 
    genero='$genero', 
    telefone='$telefone',
    rua='$rua',
    bairro='$bairro', 
    cidade='$cidade', 
    uf='$uf',
    numero='$numero',
    data_nasc='$data_nasc', 
    complemento='$complemento', 
    cpf='$cpf',
    email='$email'
    WHERE cod_usuario=(select cod_usuario from funcionarios where cod_funcionario = '$cod_funcionario')"; /*Alunos ou Usuários*/
    echo 'sad\9468038yw'; 
}


    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário alterado com sucesso.') </script>";
        header("Location: lista_funcionarios.php");
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
        header("Location: lista_funcionarios.php");
    }
}
?>
