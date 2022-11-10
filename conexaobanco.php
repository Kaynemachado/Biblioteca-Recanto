<?php
$conn = mysqli_connect('localhost', 'root', '') or die ("Não possível conectar ao banco de dados");

if (mysqli_connect_error()):
    echo "Falha na conexão: ". mysqli_connect_error();
endif;

$banco = mysqli_select_db($conn, 'banco_tcc');
?> 
