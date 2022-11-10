<?php
if(!isset($_GET['cod_emprestimo'])){
    header('Location: lista_emprestimos.php');
    exit;
}
date_default_timezone_set("America/Sao_Paulo");
include('conexaobanco.php');
$data_devolucao = date("Y-m-d");
$cod_emprestimo = $_GET['cod_emprestimo'];
$sql = "UPDATE emprestimo set data_devolucao = '$data_devolucao' where cod_emprestimo = '$cod_emprestimo'";
mysqli_query($conn, $sql);
header('Location: lista_emprestimos.php');
exit;
?>