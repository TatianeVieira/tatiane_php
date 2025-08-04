<?php
require("conecta.php");

//obtem o id da imagem da URL garantindo que seja um numero inteiro
$id_imagem = isset($_GET['id'])? intval($_GET['id']):0;

//verifica se o ID é valido (MAIOR QUE 0)
if($id_imagem > 0){
    //criar a query segira usando o preprared statement
    $queryExclusao = "DELETE FROM imagens WHERE codigo = ?";

    //prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_imagem);

    //executa a exclusao
    if($stmt->execute()){
        echo "Imagem excluida com sucesso! ";
    }else{
        die("Erro ao excluir a imagem: ".$stmt->error);
    }
    //fecha a consulta
    $stmt->close();
}else{
    echo "ID invalido";
}

//redireciona para a index.php e garante que o script pare
header("location: index.php");
exit();
?>