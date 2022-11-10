
<?php
include('conexaobanco.php');

$codigo = $_GET['cod_aluno'];

if (isset($_POST['Enviar'])) {
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

    $sql = "UPDATE livros SET /*Alunos ou Usuários*/
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
                turno='$turno',
                regente='$regente'
                turma='$turma',
                matricula_aluno='$matricula_aluno',
                username='$username',
                senha='$senha'
            WHERE cod_livro='$cod_livro'"; /*Alunos ou Usuários*/

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Usuário alterado com sucesso.') </script>";
        header("Location: listaUsuarios.php");
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
$sql = "SELECT * FROM livros WHERE cod_livro=$cod_livro"; /*Alterar aqui também*/
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
