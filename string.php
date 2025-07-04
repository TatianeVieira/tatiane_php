<?php
$age = 16;
print "voce tem " . $age . " anos.\n";
print "voce tem $age anos.\n"; 
print "voce tem $age anos.\n ";
?>

<?php 
$cidade = "joinville";
$estado = "SC";
$idade = 174;
$frase_capital = "A cidade de $cidade é a capital do $estado";
$frase_idade = "$cidade tem mais de $idade anos";
echo "<h3>$frase_capital </h3>";
echo "<h4>$frase_idade </h4>";
?>

<?php
print "hoje é seu $ageth aniversario.\n"; //nao funciona
print "hoje é seu {$age}th anirversario.\n";
?>