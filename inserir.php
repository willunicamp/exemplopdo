<?php

if(isset($_POST['nome']) && isset($_POST['ano_lancamento'])){
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];

    include('conexao.php');

    $con = Conexao::getInstancia();

    $stmt = $con->prepare("INSERT INTO jogo(nome, ano_lancamento, id_console, id_midia) VALUES(:nome, :ano, 1, 1)");
    $stmt->bindParam(":nome",);
    $stmt->bindParam(":ano",);
    $stmt->execute();
    if($stmt->rowCount() == 1){
        $id = $con->lastInsertId();
        echo "Jogo $nome inserido com código $id.";
    }
}else{
    echo "Dados recebidos são inválidos";
}
?>
