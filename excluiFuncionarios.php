<?php

include('conexaobanco.php');

$codigo = $_GET['cod_funcionario'];
$sql = "DELETE FROM usuario WHERE cod_usuario=$codigo";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: lista_usuarios.php");
} else {
    echo "<script>alert('Houve algum erro.');</script>";
    mysqli_error($conn);
    echo $conn->error;
}
?>
