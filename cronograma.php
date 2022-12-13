<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cronograma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <?php
  include('menu_simples_funcionario.php');
  include('conexaobanco.php');


  $sql = "SELECT * FROM cronograma";
  $query = mysqli_query($conn, $sql);
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

    .editar {
      padding-bottom: 60px;
    }

    .hidden {
      display: none;
    }

    #table2 {
      margin-bottom: 60px;
    }

    body {
            overflow-x: scroll;
        }
  </style>
</head>

<body>

  <br>
  <br>
  <br>
  <div class="container mt-3">
    <h2>Horários de Renovações - Matutino</h2>
    <p>-</p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Horários</th>
          <th>Segunda-Feira</th>
          <th>Terça-Feira</th>
          <th>Quarta-Feira</th>
          <th>Quinta-Feira</th>
          <th>Sexta-Feira</th>
        </tr>
      </thead>
      <tbody>
        <?php while($dados = mysqli_fetch_array($query)){
          $hora = explode(':', $dados['horarios'])[0];
          if(intval($hora) < 12){?>
        <tr>
          <td><?php echo $dados['horarios'] ?></td>
          <td><?php echo $dados['segunda_feira'] ?></td>
          <td><?php echo $dados['terca_feira'] ?></td>
          <td><?php echo $dados['quarta_feira'] ?></td>
          <td><?php echo $dados['quinta_feira'] ?></td>
          <td><?php echo $dados['sexta_feira'] ?></td>
          <td colspan="2" class="text-center">
            <button type="button" class='btn btn-bg w3-text-white w3-theme-l1 w3-left' data-bs-toggle="modal" data-bs-target="#modal<?= $dados['cod_cronograma'] ?>">Editar</button>
          </td>
        </tr>
        <div class="modal fade" id="modal<?= $dados['cod_cronograma'] ?>" tabindex="-1" aria-labelledby="<?= $dados['cod_cronograma'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Cronograma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="editaCronograma.php" method="post">
                  <div class="form-group">
                    <input style="width: 47%;" title="Horário" class="form-control" type="time" name="horarios" value="<?= $dados['horarios'] ?>">
                    <input style="width: 47%;" title="Segunda-feira" class="form-control" type="text" name="segunda_feira" id="" value="<?= $dados['segunda_feira'] ?>">
                    <input style="width: 47%;" title="Terça-feira" class="form-control" type="text" name="terca_feira" id="" value="<?= $dados['terca_feira'] ?>">
                    <input style="width: 47%;" title="Quarta-feira" class="form-control" type="text" name="quarta_feira" id="" value="<?= $dados['quarta_feira'] ?>">
                    <input style="width: 47%;" title="Quinta-feira" class="form-control" type="text" name="quinta_feira" id="" value="<?= $dados['quinta_feira'] ?>">
                    <input style="width: 47%;" title="Sexta-feira" class="form-control" type="text" name="sexta_feira" id="" value="<?= $dados['sexta_feira'] ?>">
                    <input type="hidden" name="cod_cronograma" value="<?= $dados['cod_cronograma'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" value="Salvar" name="Salvar">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php }} ?>

      </tbody>
    </table>
  </div>

  <br>
  <br>
  <div class="container mt-3">
    <h2>Horários de Renovações - Vespertino</h2>
    <p>-</p>
    <table id="table2" class="table table-striped">
      <thead>
        <tr>
          <th>Horários</th>
          <th>Segunda-Feira</th>
          <th>Terça-Feira</th>
          <th>Quarta-Feira</th>
          <th>Quinta-Feira</th>
          <th>Sexta-Feira</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $query = mysqli_query($conn, $sql);
      while($dados = mysqli_fetch_array($query)){
        $hora = explode(':', $dados['horarios'])[0];
          if(intval($hora) > 12){
        ?>
        <tr>
          <td><?php echo $dados['horarios'] ?></td>
          <td><?php echo $dados['segunda_feira'] ?></td>
          <td><?php echo $dados['terca_feira'] ?></td>
          <td><?php echo $dados['quarta_feira'] ?></td>
          <td><?php echo $dados['quinta_feira'] ?></td>
          <td><?php echo $dados['sexta_feira'] ?></td>
          <td colspan="2" class="text-center">
            <button type="button" class='btn btn-bg w3-text-white w3-theme-l1 w3-left' data-bs-toggle="modal" data-bs-target="#modal<?= $dados['cod_cronograma'] ?>">Editar</button>
          </td>

        </tr>
        <div class="modal fade" id="modal<?= $dados['cod_cronograma'] ?>" tabindex="-1" aria-labelledby="<?= $dados['cod_cronograma'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Cronograma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="editaCronograma.php" method="post">
                  <div class="form-group">
                    <input style="width: 47%;" title="Horário" class="form-control" type="time" name="horarios" value="<?= $dados['horarios'] ?>">
                    <input style="width: 47%;" title="Segunda-feira" class="form-control" type="text" name="segunda_feira" id="" value="<?= $dados['segunda_feira'] ?>">
                    <input style="width: 47%;" title="Terça-feira" class="form-control" type="text" name="terca_feira" id="" value="<?= $dados['terca_feira'] ?>">
                    <input style="width: 47%;" title="Quarta-feira" class="form-control" type="text" name="quarta_feira" id="" value="<?= $dados['quarta_feira'] ?>">
                    <input style="width: 47%;" title="Quinta-feira" class="form-control" type="text" name="quinta_feira" id="" value="<?= $dados['quinta_feira'] ?>">
                    <input style="width: 47%;" title="Sexta-feira" class="form-control" type="text" name="sexta_feira" id="" value="<?= $dados['sexta_feira'] ?>">
                    <input type="hidden" name="cod_cronograma" value="<?= $dados['cod_cronograma'] ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" value="Salvar" name="Salvar">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }} ?>
      </tbody>
    </table>
  </div>
  <br>

  <footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
    <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
  </footer>

</body>

</html>