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
include('menu_simples_funcionario.php')
?>
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
      <tr>
        <td>7:45</td>
        <td>9º ano A</td>
        <td>4º ano B</td>
        <td>---</td>
        <td>8º ano A</td>
        <td>Aceleração</td>


      </tr>
      <tr>
        <td>8:30</td>
        <td>1º ano C</td>
        <td>Infantil III</td>
        <td>---</td>
        <td>7º ano A</td>
        <td>8º ano B</td>
      </tr>
      <tr>
        <td>9:15</td>
        <td>9º ano B</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr>
        <td>9:30</td>
        <td>2º ano B</td>
        <td>---</td>
        <td>---</td>
        <td>1º ano A</td>
        <td>3º ano A</td>
      </tr>
      <tr>
        <td>10:15</td>
        <td>3º ano B</td>
        <td>6º ano B</td>
        <td>6º ano C</td>
        <td>Infantil II</td>
        <td>---</td>
      </tr>
      <tr>
        <td>11:00</td>
        <td>4º ano A</td>
        <td>---</td>
        <td>---</td>
        <td>5º ano C</td>
        <td>5º ano A</td>
      </tr>

      <td colspan="2" class="text-center">
                    <a class='btn btn-lg btn-block w3-text-white w3-theme-l4 w3-left' href='#?coduser=<?php echo $dados['coduser'] ?>'>Editar</a> 
                    <a class='btn btn-lg btn-block w3-text-white w3-theme-l4 w3-left' href='#' onclick='confirmar("<?php echo $dados['coduser'] ?>")'>Excluir</a></td>
      
      
    </tbody>
  </table>
</div>

<br>
<br>
<div class="container mt-3">
  <h2>Horários de Renovações - Vespertino</h2>
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
      <tr>
        <td>7:45</td>
        <td>Infantil I</td>
        <td>6º ano A</td>
        <td>---</td>
        <td>1º ano B</td>
        <td>---</td>


      </tr>
      <tr>
        <td>8:30</td>
        <td>---</td>
        <td>2º ano A</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr>
        <td>9:15</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      <tr>
        <td>9:30</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>3º ano C</td>
      </tr>
      <tr>
        <td>10:15</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>5º ano B </td>
        <td>---</td>
      </tr>
      <tr>
        <td>11:00</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>7º ano B</td>
      </tr>

      <td colspan="2" class="text-center">
                    <a class='btn btn-lg btn-block w3-text-white w3-theme-l4 w3-left' href='#?coduser=<?php echo $dados['coduser'] ?>'>Editar</a>
                    <a class='btn btn-lg btn-block w3-text-white w3-theme-l4 w3-left' href='#' onclick='confirmar("<?php echo $dados['coduser'] ?>")'>Excluir</a></td>
      </tr>
      
    </tbody>
  </table>
</div>

<br>

<footer class="w3-container w3-theme-l1 w3-padding-16 w3-center">
  <h5>Biblioteca Recanto do Saber - Escola Profº Nair Alves Bratti</h5>
</footer>

</body>
</html>
