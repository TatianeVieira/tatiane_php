<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_teste";

//conexao usando MYSQL sem protecao contr SQL 
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

//verifica se ha erro na conexao
if($conexao->connect_error) {
    die("Erro de conexão: ".$conexao->connect_error);
}

//captura os dados do formulario(nome de usuario)
$nome = $_POST["nome"];

//prepara a cunsulta SQL segura
$stmt = $conexao->prepare("SELECT * FROM cliente_teste WHERE nome = ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();

//se houver resultador o login é considerado bem sucedido
if($result->num_rows > 0) {
    header("location: area_restrita.php");
    //garanta que o cidigo pare aqui para evitar execucao indevida
    exit();
}else {
    echo "nome nao encontrado.";
}
//fecha conexao
$stmt->close();
$conexao->close();
?>
<adress> tatiane vieira - tecnico desenvolvimento de sistemas </adress>
