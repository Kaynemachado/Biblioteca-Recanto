
<?php
include('conexaobanco.php');

$cod_cronograma = $_POST['cod_cronograma'];

if (isset($_POST['Salvar'])) {
    $horarios = $_POST['horarios'];
    $segunda_feira = $_POST['segunda_feira'];
    $terca_feira = $_POST['terca_feira'];
    $quarta_feira =  $_POST['quarta_feira'];
    $quinta_feira =  $_POST['quinta_feira'];
    $sexta_feira =  $_POST['sexta_feira'];

    $sql = "UPDATE cronograma SET 
                horarios='$horarios', 
                segunda_feira='$segunda_feira', 
                terca_feira='$terca_feira',
                quarta_feira='$quarta_feira',
                quinta_feira='$quinta_feira',
                sexta_feira='$sexta_feira'
            WHERE cod_cronograma='$cod_cronograma'";
    
    var_dump($sql);
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Horários alterados com sucesso.') </script>";
        header("Location: cronograma.php"); /*???*/
    } else {
        echo "<script> alert('Ocorreu algum erro.') </script>";
    }
}
$sql = "SELECT * FROM cronograma WHERE cod_cronograma=$cod_cronograma";
$rs = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($rs);
?>
