<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excluir cliente</title>
</head>
<body>
    <h2>Ecluir Cliente</h2>
    <form action="processarDelecao.php" method="POST">
        <label for="id">ID do cliente</label>
        <input type="number" id="id" name="id" required>
        
        <button type="submite">Excluir cliente</button>
    </form>
</body>
</html>