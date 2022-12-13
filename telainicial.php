<!DOCTYPE html>
<html>

<head>
    <title> Meu Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <?php
    include('conexaobanco.php');
    include('pag_logado.php');
include('menu_simples_aluno.php');
$sql = "SELECT * FROM emprestimo";
$emprestimos = mysqli_query($conn, $sql);
?>
    <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Open Sans", sans-serif
    }
    </style>
</head>

<body class="w3-theme-l5">

    <!-- Navbar -->



    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container w3-padding">
                        <h4 class="w3-center">Meu perfil</h4>
                        <p class="w3-center"><img src="<?= $usuario_logado['foto'] ?>" class="w3-circle" style="height:106px;width:106px"
                                alt="Avatar"></p>
                        <br>
                        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['nome'] ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['cidade'] ?></p>
                        <p><i class="fa fa-users fa-fw w3-margin-right w3-text-theme"></i><?= $usuario_logado['email'] ?></p>
                    </div>
                </div>
                <br>

                <!-- Accordion -->
                <div class="w3-card w3-round">
                    <div class="w3-white">
                        <a href="#" class="w3-button w3-block w3-theme-l1 w3-left-align"><i
                                class="fa fa-users fa-fw w3-margin-right"></i> Minha Turma </a>
                        <a href="cronograma.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i
                                class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Cronograma </a>
                        <a href="altera.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i
                                class="fa fa-user fa-fw w3-margin-right"></i> Editar perfil</a>
                    </div>
                </div>
                <br>

                <!-- Alert Box -->
                <div
                    class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
                    <span onclick="this.parentElement.style.display='none'"
                        class="w3-button w3-theme-l3 w3-display-topright">
                        <i class="fa fa-remove"></i>
                    </span>
                    <p><strong>Avisos</strong></p>
                    <p>Sua <strong>Renovação</a></strong> é dia <strong>22/11</strong></p>
                </div>

                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <div class="w3-col m9">

                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <form action="busca.php" method="POST" class="d-flex w3-large w3-round">
                                    <input class="form-control me-2" type="text" name="titulo"
                                        placeholder="Pesquise um livro">
                                    <button class="btn w3-theme-l1 w3-hover" type="button">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

   
      

                <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <img src="otelo.jpg" alt="Avatar" class="w3-left w3-margin-bottom w3-margin-right"
                        style="width:130px">
                    <h4>Otelo</h4><br>
                    <p>Por William Shakespeare</p>
                    <p style="text-align: justify;">Em Veneza, Otelo, um general mouro a serviço do Estado, conquista Desdêmona, uma jovem, filha de um nobre local. Após enfrentar a ira do pai e defender-se com sucesso contra a acusação de tê-la "enfeitiçado", ele parte a Chipre em companhia da esposa para combater o inimigo turco?otomano. Lá, seu alferes, o manipulador Iago, consegue paulatinamente instilar na mente do mouro a suspeita de que Desdêmona o traiu. Otelo é a tragédia em que Shakespeare estudou os mecanismos da imaginação, da paixão e do ciúme. Em nova tradução de Lawrence Flores Pereira, que recria a linguagem grandiosa de Otelo e a prosa nefasta de Iago, esta nova edição é acompanhada de uma longa introdução e notas contextuais do tradutor, bem como de um ensaio de W. H. Auden.</p>
                </div>


                <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <img src="ocolecionador.png" alt="Avatar" class="w3-left w3-margin-bottom w3-margin-right"
                        style="width:130px">
                    <h4>O Colecionador</h4><br>
                    <p>Por John Fowles</p>
                    <p style="text-align: justify;">O COLECIONADOR é a história de Frederick Clegg, um homem solitário, de origem humilde, menosprezado por uma sociedade esnobe, que encontra o grande amor de sua vida. Tudo o que ele deseja é passar um tempo a sós com ela, demonstrar seus nobres sentimentos e deixar claro que eles nasceram um para o outro.</p>

                </div>


                <!-- End Middle Column -->
            </div>
            </div>
            <br>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>
    <br>

    <!-- Footer -->
    <footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
        <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
    </footer>

    </body>
</html>