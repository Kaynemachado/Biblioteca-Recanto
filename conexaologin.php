<?php

$usuario = 'root';
$senha = '';
$database = 'banco_tcc';
$host = 'localhost';    

$mysqli = new mysqli($usuario, $senha, $database, $host);

if ($mysqli -> error) {
    die("Falha ao conectar com o banco:" . $mysqli->error);
}
?>