<meta http-equiv="refresh" content="3;url=index.php" />
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    include('conexao.php');

    $con = Conexao::getInstancia();

    $stmt = $con->prepare("DELETE FROM jogo WHERE id=?");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        echo "Jogo de código $id apagado.";
    }else{
        echo "Não foi possível apagar";
    }
}else{
    echo "Dados recebidos são inválidos";
}
?>
