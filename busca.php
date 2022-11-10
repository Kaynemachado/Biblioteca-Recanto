<?php
if (!isset($_POST['titulo'])) {
    header("Location: Tela1_Bibliotecario.php");
    exit;
} 

$titulo = "%".trim($_GET['titulo'])."%";

$dbh =  new PDO('mysql:host=127.0.0.1;dbmane=banco_tcc', 'root','');

$sth = $dbh->prepare('SELECT * FROM `livros` WHERE `titulo´ LIKE:titulo ');
$sth->bindParan(':titulo', $titulo, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado da busca</title>
</head>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
?>
<label><?php echo $Resultado['cod_livro']; ?> - <?php echo $Resultado['titulo']; ?></label>
<br>
<?
} } else {
?>
<label>Não foram encontrados resultados pelo termo buscado.</label>
<?php
}
?>
</body>
</html>