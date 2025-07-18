<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario completo com Get</title>
</head>
<body>
<form method="get" action="form_get_completo.php">
        <label>Nome</label>
        <input type="text" name="nome" />
        <label>Idade</label>;
        <input type="number" name="idade" />
        <input type="submit" value="enviar" />
    </form>
    <?php
        if(isset($_GET['nome'])&& isset($_GET['idade'])){
            echo "recebido o cliente ".$_GET['nome'];
            echo "que tem ".$_GET['idade']. "anos";
        }
    ?>
</body>
</html>