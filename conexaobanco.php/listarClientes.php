<?php
    require 'conexao.php';

    $conexao=conectarBanco();
    $stmt=$conexao->prepare("SELECT * FROM cliente");
    $stmt->execute();
    $clientes=$stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  padding: 30px;
  text-align: center;
}


h2 {
  margin-top: 0;
  color: #2c3e50;
}

table {
  margin: 0 auto;
  width: 90%;
  border-collapse: collapse;
  background-color: #ffffff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
}

th, td {
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}

th {
  background-color: #2c3e50;
  color: white;
}

tr:hover {
  background-color: #f1f1f1;
}
</style>
<?php
    $urlAnterior = $_SERVER['HTTP_REFERER'] ?? 'navegar.php'; 
    ?>

    <button onclick="window.location.href='<?php echo $urlAnterior; ?>'"> Voltar</button>

    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
        <tr>
            <td><?=htmlspecialchars($cliente["id_cliente"]) ?></td>
            <td><?=htmlspecialchars($cliente["nome"]) ?></td>
            <td><?=htmlspecialchars($cliente["endereco"]) ?></td>
            <td><?=htmlspecialchars($cliente["telefone"]) ?></td>
            <td><?=htmlspecialchars($cliente["email"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>