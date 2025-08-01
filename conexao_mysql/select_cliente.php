<?php
require_once "conexao.php";
//estabelece conexao
$conexao = conectadb();

//define a consulta SQL para buscar clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";

//executa a consulta np banco
$result = $conexao->query($sql);

//verifica se ha registros retornados
if ($result->num_rows > 0) {

    //itera sobre os resultados e ecibe os dados
        while($linha = $result->fetch_assoc()) {
            echo "ID: ".$linha["id_cliente"]."-Nome: ".$linha["nome"]."-email: ".$linha["email"]."</br>"; }
    }else{
        //caso nenhum resultado seja encontrado
        echo "Nenhum resultado encontrado.";}
    
    //fecha a conexao 
    $conexao->close();
?>