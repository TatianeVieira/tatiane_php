<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemplo post</title>
    <style type="text/css">
        label{
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <form method="POST" action="#">
        <label for="usuario"> usuario: </label>
        <input type="text" name="senha" required />
        <br/>
        <label for="senha"> senha: </label>
        <input type="password" name="senha" required />
        <br/>
        <input type="submit" value="enviar" name="enviar" />
        <input type="reset" value="limpar" />
    </form>
    <?php include ("senha_back.php") ?>
</body>
</html>