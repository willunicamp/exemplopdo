<meta http-equiv="refresh" content="3;url=index.php" />
<?php
if(isset($_POST['nome']) && isset($_POST['ano_lancamento'])){
    $nome = $_POST['nome'];
    $ano = $_POST['ano_lancamento'];

    include('conexao.php');

    $con = Conexao::getInstancia();

    $stmt = $con->prepare("INSERT INTO jogo(nome, ano_lancamento, id_console, id_midia) VALUES(:nome, :ano, 1, 1)");
    $stmt->bindParam(":nome",$nome);
    $stmt->bindParam(":ano",$ano);
    $stmt->execute();
    if($stmt->rowCount() == 1){
        $id = $con->lastInsertId();
        echo "Jogo $nome inserido com código $id.";
    }else{
        echo "Não foi possível inserir";
    }
}else{
    echo "Dados recebidos são inválidos";
}
?>
