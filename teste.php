<html>
<title> Listagem de Livros </title>
<?php
include('conexaobanco.php');

$sql = "SELECT * FROM livros";
$query = mysqli_query($conn, $sql);
?>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    body {
        margin-left: -200px;
    }
    
</style>
</head>
<body>
<div class="container">
    
    <h3 class="">Livros cadastrados</h3>

    <a href="newsite.php" class="btn btn-success">Cadastrar novo</a>
   
    <br></br>

    <table class='table table-striped table-bordered table-responsive-xxl'>
        <tr class="">
            <td class="text-center"><b>ID</b></td>
            <td><b>Título</b></td>
            <td><b>Autor</b></td>
            <td><b>Editora</b></td>
            <td><b>ISBN</b></td>
            <td><b>Foto</b></td>
            <td><b>Faixa Etária</b></td>
            <td><b>Nº de Páginas</b></td>
            <td><b>Nº de Exemplares</b></td>
            <td><b>Gênero</b></td>
            <td><b>Status</b></td>
            <td><b>Fonte</b></td>
            <td><b>Data Lançamento</b></td>
            <td><b>Comentários</b></td>

            <td class="text-center"><b>Ação</b></td>
        </tr>

        <?php while ($dados = mysqli_fetch_array($query)) { ?>
            <tr>
                <td class="text-center"><?php echo $dados['cod_livro'] ?></td>
                <td><?php echo $dados['titulo'] ?></td>
                <td><?php echo $dados['autor'] ?></td>
                <td><?php echo $dados['editora'] ?></td>
                <td><?php echo $dados['isbn'] ?></td>  
                <td><?php echo $dados['foto'] ?></td>
                <td><?php echo $dados['faixa_etaria'] ?></td>
                <td><?php echo $dados['numero_pag'] ?></td>
                <td><?php echo $dados['quant_disponivel'] ?></td>
                <td><?php echo $dados['genero'] ?></td>
                <td><?php echo $dados['status_livro'] ?></td>
                <td><?php echo $dados['fonte'] ?></td>
                <td><?php echo $dados['data_lancamento'] ?></td>
                <td><?php echo $dados['comentarios'] ?></td>
                
                
                <td colspan="2" class="text-center">
                    <a class='btn btn-info btn-sm' href='#?coduser=<?php echo $dados['coduser'] ?>'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='#' onclick='confirmar("<?php echo $dados['coduser'] ?>")'>Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    function confirmar(cod) {
        if (confirm('Você realmente deseja excluir esta linha?'))
            location.href = 'excluiUsuario.php?coduser=' + cod;
    }
</script>
</body>
<html>