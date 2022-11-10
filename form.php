<!DOCTYPE html>
<html> 
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	</head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}

/* Cabeçalho*/

.header {
  padding: 30px;
  text-align: center;
  background: white;
  margin-right: -40px;
}
.card{
  text-align: center;
  padding: 5px;
}
 
img {
  width: 100%;
  height: 90%;
}


/* Crie duas colunas desiguais que flutuem uma ao lado da outra */
/* Coluna Esquerda */
.colunaesquerda {   
  float: left;
  width: 75%;
}

/* Coluna Direita */
.colunadireita {
  float: right;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 10px;
  padding-top: 20px;
  
}

/* Barra lateral */
.fakeimg {
  background-color: #ddd;
  width: 100%;
  padding: 37px;
}

/* Adicione um efeito de cartão para artigos */
.formulario {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Limpar floats após as colunas */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Rodapé */
.footer {
  padding: 10px;
  text-align: center;
  background: #ddd;
  margin-top: 10px;
}

/* Layout responsivo - quando a tela tiver menos de 800px de largura, 
faça as duas colunas empilharem uma sobre a outra em vez de uma ao lado da outra */
@media screen and (max-width: 800px) {
  .colunaesquerda, .colunadireita {   
    width: 100%;
    padding: 0;
  }
}

/* Layout responsivo - quando a tela tiver menos de 400px de largura, 
faça os links de navegação empilharem um sobre o outro em vez de um ao lado do outro*/
@media screen and (max-width: 400px) {
  .menu a {
    float: none;
    width: 100%;
  }
}
</style>