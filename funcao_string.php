<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funcao string</title>
</head>
<body>
    <?php
    $vogais = array ("a", "e", "i","o","u","A","E","I","O","U");
    echo "Ola mundo PHP<br/>";
    $cons = str_replace($vogais, "", "Ola mundo PHP");
    echo "consoantes:".$cons, "<br/>";
    $test = "Ola mundo! \n";
    print "possiçao da letra 'o': ";
    print strpos($test, "o")."<br/>";
    print "possiçao da letra 'o' apos 5: ";
    print strpos($test, "o", 5)."<hr/>";
    $message = "troca letra uma a uma";
    echo $message."<br/>";
    $new_message = strtr($message, 'abcdef', '123456');
    echo "criptografando: ".$new_message."<br/>";
    $new_message = strtr($message, '123456', 'abcdef');
    echo "descriptografando: ".$new_message."<br/>";
?>
<center> <address> Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas </address> </center>
</body>
</html>