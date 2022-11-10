
<?php
include('conexaobanco.php');

$codigo = $_GET['cod_livro'];

if (isset($_POST['btnSalvar'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $sinopse =  $_POST['sinopse'];
    $isbn =  $_POST['isbn'];
    $foto_livro =  $_POST['foto_livro'];
    $faixa_etaria =  $_POST['faixa_etaria'];
    $numero_pag =  $_POST['numero_pag'];
    $quant_disponivel =  $_POST['quant_disponivel'];
    $genero_livro =  $_POST['genero_livro'];
    $status_livro =  $_POST['status_livro'];
    $fonte =  $_POST['fonte'];
    $data_lancamento =  $_POST['data_lancamento'];
    $comentarios =  $_POST['comentarios'];

    $sql = "UPDATE livros SET 
                titulo='$titulo', 
                autor='$autor', 
                editora='$editora',
                sinopse='$sinopse',
                isbn='$isbn',
                foto_livro='$foto_livro',
                faixa_etaria='$faixa_etaria',
                numero_pag='$numero_pag',
                quant_disponivel='$quant_disponivel',
                genero_livro='$genero_livro',
                status_livro='$status_livro',
                fonte='$fonte',
                data_lancamento='$data_lancamento',
                comentarios='$comentarios'
            WHERE cod_livro='$cod_livro'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Livro alterado com sucesso.') </script>";
        header("Location: listaUsuarios.php"); /*???*/
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
$sql = "SELECT * FROM livros WHERE cod_livro=$cod_livro";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
