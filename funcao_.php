<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>função</title>
</head>
<body>
    <?php
    $sorteio = rand(0, 5); 
    echo "sorteado: $sorteio <hr/>";
    $vetor = array_merge( range(0, 10), range($sorteio, 10, 2), array($sorteio));
    print_r($vetor);
    echo "<hr/>";
    shuffle($vetor);
    print_r($vetor);
    echo "<hr/>";
?>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</body>
</html>