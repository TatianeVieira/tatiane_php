<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de funcionario</title>
</head>
<body>
    <div class="container">
    <h1>cadastro</h1>
    <h2>funcionario</h2>
    <!-- formulario para cadastrar funcuonario-->
     <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">

        <!-- campo para inserir o nome do funcionario-->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required> <br>

        <!-- campo para inserir o telefone do funcionario-->
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required> <br>

        <!-- campo para FAZER UPLOAD do funcionario-->
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" required> <br>

        <button type="submit">Cadastrar</button>

</form>
</div>
</body>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</html>