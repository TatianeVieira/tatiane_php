<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
ob_clean(); //limpa qualquer saida unesperada antes do header

//inclui a conexao como banco de dados
require("conecta.php");

//obtem o id da imagem da URL garantindo que seja um numero inteiro
$id_imagem = isset($_GET['id'])? intval($_GET['id']):0;

//cria a consulta para buscar a imagem no banco de dados
$querySelecionaPorCodigo = "SELECT imagem, tipo_imagem FROM imagens WHERE codigo= ?";

//usa prepared statement para maior segurança
$stmt = $conexao->prepare($querySelecionaPorCodigo);
$stmt ->bind_param("i", $id_imagem);
$stmt->execute();
$resultado=$stmt->get_result();

//verifica se a imagem existe
if($resultado->num_rows >0){
    $imagem = $resultado->fetch_object();

    //define o tipo correto da imagem(falback para jpeg caso esteja vazio)
    $tipoImagem = !empty($imagem->tipo_imagem)? $imagem->tipo_imagem: "imagem/jpeg";
    header("Content-type: ".$tipoImagem);

    //exibe a imagem armazenada no banco de dados
    echo $imagem->imagem;
}else{
    echo"imagem nao encontrada";
}

$stmt->close();
?>