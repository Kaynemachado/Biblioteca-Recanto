
<?php
include('conexaobanco.php');

$cod_aluno = $_POST['cod_aluno'];

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
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $turno = $_POST['turno'];
    $regente = $_POST['regente'];
    $turma = $_POST['turma'];
    $matricula_aluno = $_POST['matricula_aluno'];
    $nochange = $_POST['nochange'];

    $sql = "UPDATE alunos SET 
                turno='$turno', 
                turma='$turma', 
                regente='$regente',
                matricula_aluno='$matricula_aluno'
            WHERE cod_aluno='$cod_aluno'";
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
        WHERE cod_usuario=(select cod_usuario from alunos where cod_aluno = '$cod_aluno')";
        echo 'sad\assf'; 
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
        WHERE cod_usuario=(select cod_usuario from alunos where cod_aluno = '$cod_aluno')"; /*Alunos ou Usuários*/
        echo 'sad\9468038yw'; 
    }

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário alterado com sucesso.') </script>";
        header("Location: lista_usuarios.php");
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
        header("Location: lista_usuarios.php");
    }
}
?>
