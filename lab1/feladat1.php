<?php

$array = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($array as $value) {
    $type = gettype($value);
    if (is_numeric($value)) {
        echo "$type: Igen\n";
    } else {
        echo "$type: Nem\n";
    }
}
?>
