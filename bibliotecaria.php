<?php
if($usuario_logado['username'] != 'admin'){
    header('Location: telainicial.php');
}