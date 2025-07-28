<?php
require_once 'conexao_.php';
$conexao = conectarBanco();

$idCliente = $_GET['Id']?? null;
$cliente = null;
$msgErro = "";

//funcao local para buscar cliente por ID
function buscarClientePorId($idCliente, $conexao) {
    $stmt = $conexao ->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

//se o id for enviado, busca no banco
id($idCliente && is_numeric($idCliente)) {
    $cliente = buscarClientePorId($idCliente, $conexao);

    if(!$cliente){
        $msgErro = "Erro: client nao encontrado";
    } 
} else{
    $msgErro = "Digite o ID do cliente para buscar os dados"/
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function habilitarEdicao(campo) {
            document.getElementById(campo).removeAtribute("")
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>
    <?php if($msgErro): ?>
        <p style="color:red;"><?=htmlspecialchars($msgErro)?></p>
        <form action="atualizarCliente.php" method="GET">
            <label for="id">ID do cliente:</label>
            <input type="number" id="id" name="id" require>
            <button type="submit">Buscar</button>
    </form>
    <?php else: ?>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?=htmlspecialchars($cliente['id_cliente'])?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value=">">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" value="<?=htmlspecialchars($cliente['endereco'])?>" readonly onclick="habilitarEdicao('endereco')">

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?=htmlspecialchars($cliente['email'])?>" readonly onclick="habilitarEdicao('endereco')">
            
            <button type="submit">Atualizar Cliente</button>
    </form>
    <?php endif; ?>


</body>
</html>