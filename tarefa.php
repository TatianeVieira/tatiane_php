<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerenciador de cadastro</title>
</head>
<body>
    <h1>gerenciador de cadastro</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label> cadastro:
                <input type="text" name="nome" />
                </label>
                <input type="submit" value="cadastrar" />
        </fieldset>
    </form>

    <?php
        $cadastro = array();
        if (isset($_GET['nome'])) {
            $_SESSION['cadastro'][] = $_GET['nome'];
        }
        $cadastro =  array();
        if(isset($_SESSION['cadastro'])) {
            $cadastro = $_SESSION ['cadastro'];
        }
    ?>

    <table>
        <tr>
            <th>cadastro</th>
    </tr>
    <?php foreach ($cadastro as $cadastro) : ?>
        <tr>
            <td><?php echo $cadastro; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>