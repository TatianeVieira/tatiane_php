<?php
require_once 'conexao.php';

$conexao=conectarBanco();

//obtendo o ID via GET
$idCliente=$_GET['id'] ?? null;
$cliente=null;
$msgErro="";

//funçao local para buscar cliente por IS
function buscarClientePorId($idCliente, $conexao){
    $stmt=$conexao->prepare("SELECT id_cliente,nome,endereco,telefone,email FROM cliente WHERE id_cliente=:id");
    $stmt->bindParam(":id",$idCliente,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

//se um ID foi enviado, busca o liente no banco
if($idCliente && is_numeric($idCliente)){
    $cliente=buscarClientePorId($idCliente,$conexao);

    if(!$cliente){
        $msgErro="Erro: Cliente não encontrado.";
    }
} else {
    $msgErro="Digite o ID do cliente para buscar os dados.";
}

?>
<?php
$urlAnterior = $_SERVER['HTTP_REFERER'] ?? 'navegar.php'; 
?>

<button onclick="window.location.href='<?php echo $urlAnterior; ?>'"> Voltar</button>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo){
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            padding: 20px;
            color: #2f3640;
        }

        h2 {
            text-align: center;
            color: #273c75;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #ecf0f1;
            transition: background-color 0.3s;
        }

        input[readonly] {
            background-color: #dcdde1;
            cursor: pointer;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color:rgb(50, 122, 189);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color:rgb(55, 91, 209);
        }

        p {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
    <h2>Atualizar Cliente</h2>


    <!-- Se houver erro, exibe a mensagem e o campo de busca -->
     <?php if($msgErro): ?>
        <p style="color:red;"><?=htmlspecialchars($msgErro)?></p>
        <form action="atualizarCliente.php" method="GET">
            <label for="id">ID do cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>
        <?php else: ?>
            <!--Se um cliente foi encontrado, exibe o formulário preenchido -->
            <form action="processarAtualizacao.php" method="POST">
                <input type="hidden" name="id_cliente" value="<?=htmlspecialchars($cliente['id_cliente'])?>">

                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome" value="<?=htmlspecialchars($cliente['nome'])?>"readonly onclick="habilitarEdicao('nome')">

                <label for="endereco">Endereço: </label>
                <input type="text" id="endereco" name="endereco" value="<?=htmlspecialchars($cliente['endereco'])?>"readonly onclick="habilitarEdicao('endereco')">

                <label for="telefone">Telefone: </label>
                <input type="text" id="telefone" name="telefone" value="<?=htmlspecialchars($cliente['telefone'])?>"readonly onclick="habilitarEdicao('telefone')">

                <label for="email">E-mail: </label>
                <input type="email" id="email" name="email" value="<?=htmlspecialchars($cliente['email'])?>"readonly onclick="habilitarEdicao('email')">

                <button type="submit">Atualizar Cliente</button>
            </form>
        <?php endif; ?>
</body>
</html>