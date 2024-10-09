<?php

$a = 5;
$b = 3;

$osszeadas = $a + $b;
echo "Az $a és $b összege: $osszeadas<br>";

$kivonas = $a - $b;
echo "Az $a és $b különbsége: $kivonas<br>";

$szorzas = $a * $b;
echo "Az $a és $b szorzata: $szorzas<br>";

if ($b != 0) {
    $osztas = $a / $b;
    echo "Az $a és $b hányadosa: $osztas<br>";
} else {
    echo "Az osztás nem végezhető el, mert a második érték 0.<br>";
}

$hatvanyozas = pow($a, $b);
echo "Az $a a $b hatványon: $hatvanyozas<br>";

?>
