<?php
$tabuada = array();

for ($n = 1; $n <= 10; $n++) {
    $linha = array();
    for ($i = 1; $i <= 10; $i++) {
        $tabuada[$n - 1][$i - 1] = "$i * $n = " . ($n*$i) ; 

    }
}

for ($linha = 0; $linha < 10; $linha++) {
    for ($coluna = 0; $coluna < 10; $coluna++) {
        echo $tabuada[$linha][$coluna] . " | ";
    }
    echo "<br/>";
}
?>
<adress> tatiane vieira - tecnico desenvolvimento de sistemas </adress>