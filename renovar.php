<?php
if(!isset($_GET['cod_emprestimo'])){
    header('Location: lista_emprestimos.php');
    exit;
}
date_default_timezone_set("America/Sao_Paulo");
include('conexaobanco.php');
$cod_emprestimo = $_GET['cod_emprestimo'];
$sql = "UPDATE emprestimo set data_prev_devolucao = DATE_ADD((
    SELECT data_prev_devolucao from emprestimo where cod_emprestimo = '$cod_emprestimo'
), INTERVAL 7 DAY) where cod_emprestimo = '$cod_emprestimo'";
mysqli_query($conn, $sql);
header('Location: lista_emprestimos.php');
exit;
?>