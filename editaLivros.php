
<?php
include('conexaobanco.php');

$cod_livro = $_POST['cod_livro'];

if (isset($_POST['Salvar'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $isbn =  $_POST['isbn'];
    $foto_livro =  $_POST['foto_livro'];
    $serie =  $_POST['serie'];
    $numero_pag =  $_POST['numero_pag'];
    $quant_disponivel =  $_POST['quant_disponivel'];
    $genero_livro =  $_POST['genero_livro'];
    $cor =  $_POST['cor'];
    $status_livro =  $_POST['status_livro'];
    $fonte =  $_POST['fonte'];
    $data_lancamento =  $_POST['data_lancamento'];
    $comentarios =  $_POST['comentarios'];

    $sql = "UPDATE livros SET 
                titulo='$titulo', 
                autor='$autor', 
                editora='$editora',
                isbn='$isbn',
                serie='$serie',
                numero_pag='$numero_pag',
                quant_disponivel='$quant_disponivel',
                genero_livro='$genero_livro',
                cor='$cor',
                status_livro='$status_livro',
                fonte='$fonte',
                data_lancamento='$data_lancamento',
                comentarios='$comentarios'
            WHERE cod_livro='$cod_livro'";
    var_dump($sql);
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Livro alterado com sucesso.') </script>";
        header("Location: lista_livros.php"); /*???*/
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
$sql = "SELECT * FROM livros WHERE cod_livro=$cod_livro";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
