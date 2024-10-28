<?php


require_once 'ArrayManipulator.php';

use lab4\ArrayManipulator;

$arrayManipulator = new ArrayManipulator(['apple', 'banana', 'cherry']);

echo "Elem 1: " . $arrayManipulator->{1} . PHP_EOL;

$arrayManipulator->{3} = 'date';
echo "Elemek: " . $arrayManipulator . PHP_EOL;

echo "Elem 2 létezik: " . (isset($arrayManipulator->{2}) ? 'igen' : 'nem') . PHP_EOL; // igen

unset($arrayManipulator->{1});
echo "Elem törlése után: " . $arrayManipulator . PHP_EOL;

echo "Objektum mint string: " . $arrayManipulator . PHP_EOL;

$clonedArrayManipulator = clone $arrayManipulator;
$clonedArrayManipulator->{0} = 'apricot';
echo "Eredeti objektum klónozás után: " . $arrayManipulator . PHP_EOL;
echo "Klónozott objektum: " . $clonedArrayManipulator . PHP_EOL;
