<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        echo "<h2>Dados recebidos:</h2>";
        echo "Nome: " . $_GET['nome'] . "<br>";
        echo "CNPJ: " . $_GET['cnpj'] . "<br>";
        echo "Telefone: " . $_GET['telefone'] . "<br>";
        echo "Email: " . $_GET['email'] . "<br>";
        echo "Endereço: " . $_GET['endereco'] . "<br>";
        echo "Data de Cadastro: " . $_GET['data_cadastro'] . "<br>";
        echo "Tipo: " . $_GET['tipo'] . "<br>";
    } else {
        echo "Erro: método de requisição inválido.";
    }
    ?>
    
</body>
</html>