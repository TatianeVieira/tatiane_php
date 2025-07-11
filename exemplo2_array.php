<?php
$estados = array("PR","SC","RS","SP","RJ","MG","BA","RN","AM");
echo "original: ";
print_r($estados);
echo "<hr/>STRTOLOWER: converta uma string para minuscula <br/>";
for($i = 0; $i < count($estados); $i++) {
    $estados[$i] = strtolower($estados[$i]);
}
echo "STRTOLOWER: "; print_r($estados);
echo "<hr/>SHFT: Retira o primeiro elemento de um array<br/>";
$rotaciona = array_shift($estados);
echo "shift: "; print_r($estados);
