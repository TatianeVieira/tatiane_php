<?php
$endereco = "localhost";
$usuario = "root";
$senha = "";
$bancoDados = "armazena_imagem";

//criando a conexao usando MySQLI
$conexao = new mysqli($endereco, $usuario, $senha, $bancoDados);

//verificar se houve erro de conexao
if($conexao->connect_error) {
    die("Falha na conexão".$conexao->connect_error);
}
?>