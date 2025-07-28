<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form action="processarinsercao.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" require>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" require>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" require>

        <label for="nome">Email:</label>
        <input type="email" id="email" name="email" require>

        <button type="submite">Cadastrar Cliente</button>
    </form>
</body>
</html>