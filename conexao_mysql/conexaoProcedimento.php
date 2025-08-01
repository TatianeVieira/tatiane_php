<?php
//definicao das credenciais de acesso ao banco de dados
$nomeservidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "empresa"; 

//criacao da conexao com MySQL
$conn = mysqli_connect($nomeservidor, $usuario, $senha, $bancodedados);

//verificacao da conexao
if(!$conn) { //caso a conexao falha, interrompe o script e exibe uma msg de erro
    die("conexao falhou: ".mysqli_connect_error());}

//configuracao de conjunto de caracteres para evitar problemas de acentuacao
mysqli_set_charset($conn, "utf8mb4");

//msg indicando que a conexao foi estabelecida corretamente
echo "conexao bem-sucedida!";

//consulta SQL para obter clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";
$result = mysqli_query($conn, $sql);

//verifica se ha resultados na consulta
if (mysqli_num_rows($result)>0) {

//itera sobre os resultados e ecibe os dados
    while($linha = mysqli_fetch_assoc($result)) {
        echo "ID: ".$linha["id_cliente"]."-Nome: ".$linha["nome"]."-email: ".$linha["email"]."</br>"; }
}else{
    echo "Nenhum resultado encontrado.";}

//fecha a conexao com banco de dados
mysqli_close($conn);

?>