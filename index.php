<html>
    <head>
        <title>PDO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body> 
        <div class="container">
            <div class="form-group">
            <form action="inserir.php" method="post">
            <label>Nome do jogo</label>
            <input type="text" name="nome" class="form-control">
            <label>Ano de lançamento</label>
            <input type="number" name="ano_lancamento" class="form-control">
            <input type="submit" value="Inserir" class="btn btn-primary">
            </form>
            </div>
<?php
include('conexao.php');

$con = Conexao::getInstancia();

//Consulta SQL
$rs = $con->prepare('SELECT j.id as id, j.nome as jogo, j.ano_lancamento as ano, c.nome as console, m.descricao as midia 
                        FROM jogo j
                        INNER JOIN console c ON j.id_console = c.id 
                        INNER JOIN midia m ON j.id_midia = m.id');
if($rs->execute()){
    if($rs->rowCount() > 0){
        echo "<table class='table'>
                <thead class='thead-dark'>
                    <tr>
                      <th scope='col'>Jogo</th>
                      <th scope='col'>Ano</th>
                      <th scope='col'>Console</th>
                      <th scope='col'>Midia</th>
                      <th scope='col'>Apagar</th>
                    </tr>
                  </thead>
                  <tbody>";

        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
            echo "<tr>
                      <td>$linha->jogo</td>
                      <td>$linha->ano</td>
                      <td>$linha->console</td>
                      <td>$linha->midia</td>
                      <td>
                        <form action='apagar.php' method='post'>
                        <input type='hidden' name='id' value='$linha->id'>
                        <button type='submit' class='close' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                        </form>
                      </td>
                  </tr>";
        }
        echo "</table>";
    }else{
        echo "<div class='panel panel-warning'>
                  <div class='panel-body'>Nenhum registro encontrado</div>
              </div>";
    }
}
?>
        </div>
    </body>
</html>
