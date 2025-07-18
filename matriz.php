<?php
$musicas = array(
    array("kid abelha","amanha", 1993),
    array("ultrage a rigor","pelados", 1985),
    array("paralamas do sucesso","alagados", 1987));
    for ($linha = 0; $linha<3; $linha++)
    {
        for($coluna=0; $coluna<3; $coluna++)
        {
            echo $musicas[$linha][$coluna]." | ";
        }
        echo "<br/>";
    }
?>