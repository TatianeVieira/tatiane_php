<?php
require 'conexao.php';

$conexao = conectarBanco();
$stmt = $conexao -> prepare ("SELECT * FROM cliente");
$stmt -> execute();
$clientes = $stmt -> fetchALL();
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE CLIENTES</title>
    <link rel="stylessheet" href="" >
</head>
<body>
    <h2>lista de clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Npme</th>
            <th>Iendereco</th>
            <th>I</th>
            <th>email</th>
        </tr>
        <?php foreach ($clientes as $cliente):?>
    <tr>
        <td><?=htmlspecialchars($cliente["Id_cliente"])?></td>
        <td><?=htmlspecialchars($cliente["Id_cliente"])?></td>
        <td><?=htmlspecialchars($cliente["Id_cliente"])?></td>
        <td><?=htmlspecialchars($cliente["Id_cliente"])?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
