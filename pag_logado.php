<?php
session_start();
if(!isset($_SESSION['cod_usuario'])){
    header('Location: Login.php');
    exit;
}
$iduser = $_SESSION['cod_usuario'];
$sql = "select * from usuario where cod_usuario = '$iduser'";
$query = mysqli_query($conn, $sql);
$quantidade = mysqli_affected_rows($conn);
if($quantidade == 1) {
    $usuario_logado = mysqli_fetch_assoc($query);
}else{
    session_unset();
    session_destroy();
    $_SESSION['cod_usuario'] = null;
    header('Location: Login.php');
    exit;
}
?>