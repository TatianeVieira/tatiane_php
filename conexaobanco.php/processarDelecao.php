<?php
require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conexao = conectarBanco();

    $id=filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);

    if(!$id){
        die("Erro: ID inválido.");
    }

    $sql="DELETE FROM cliente WHERE id_cliente=:id";
    $stmt=$conexao->prepare($sql);
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);

    try{
        $stmt->execute();
        echo "Cliente excluído com sucesso!";
    } catch(PDOException $e) {
        error_log("Erro ao excluir cliente: ".$e->getMessage());
        echo "Erro ao excluir cliente.";
    }
}
$urlAnterior = $_SERVER['HTTP_REFERER'] ?? 'navegar.php'; 
    ?>

    <button onclick="window.location.href='<?php echo $urlAnterior; ?>'"> Voltar</button>