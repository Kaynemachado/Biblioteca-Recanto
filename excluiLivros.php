<?php

include('conexaobanco.php');

$codigo = $_GET['cod_livro'];

$sql = "DELETE FROM livros WHERE cod_livro=$codigo";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: lista_livros.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}
?>
