<?php
require_once 'conexao.php';

$conexao=conectarBanco();

$busca=$_GET['busca']??'';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pesquisar Cliente</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
    }

    form {
      background-color: #fff;
      padding: 20px;
      display: inline-block;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    label {
      margin-right: 10px;
      font-weight: bold;
    }

    input[type="text"] {
      padding: 8px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 8px 16px;
      background-color: #2c3e50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #1a252f;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #2c3e50;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    a {
      text-decoration: none;
      color: #2980b9;
      font-weight: bold;
    }

    a:hover {
      color: #1c5980;
    }
  </style>
</head>
<body>

<?php
if(!$busca){
    ?>
    <form action="pesquisarCliente.php" method="GET">
        <label for="busca">Digite o ID ou Nome: </label>
        <input type="text" id="busca" name="busca" required>
        <button type="submit">Pesquisar</button>
    </form>
    <?php
    exit;
}

//Escolhe entre busca por Id ou Nome e faz a consulta diretamente
if(is_numeric($busca)){
    $stmt=$conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente =:id");
    $stmt->bindParam(":id",$busca, PDO::PARAM_INT);
} else {
    $stmt=$conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE nome LIKE :nome");
    $buscaNome="%$busca%";
    $stmt->bindParam(":nome",$buscaNome,PDO::PARAM_STR);
}

$stmt->execute();
$clientes=$stmt->fetchAll();

if(!$clientes){
    die("ero: Nenhum cliente encontrado.");
}
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
    </tr>
    <?php foreach($clientes as $cliente): ?>
    <tr>
        <td><?=htmlspecialchars($cliente['id_cliente']) ?></td>
        <td><?=htmlspecialchars($cliente['nome']) ?></td>
        <td><?=htmlspecialchars($cliente['endereco']) ?></td>
        <td><?=htmlspecialchars($cliente['telefone']) ?></td>
        <td><?=htmlspecialchars($cliente['email']) ?></td>
        <td><a href="atualizarCliente.php?id=<?=$cliente['id_cliente']?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
</table>