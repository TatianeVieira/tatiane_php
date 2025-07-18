<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado GET</title>
</head>
<body>
<?php
if (isset($_GET['nome']) && isset($_GET['data_cadastro'])) {
    echo "Recebido o cliente: " . $_GET['nome'] . "<br>";
    echo "Entrou em: " . $_GET['data_cadastro'];
} else {
    echo "Por favor, preencha todos os campos.";
}
?>

</body>
</html>
