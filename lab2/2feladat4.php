<?php

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

// Klasszikus módszer
function atalakit_classic($tomb, $form) {
    foreach ($tomb as $key => $value) {
        if ($form === "kisbetus") {
            $tomb[$key] = strtolower($value);
        } elseif ($form === "nagybetus") {
            $tomb[$key] = strtoupper($value);
        }
    }
    return $tomb;
}

function atalakit_array_map($tomb, $form) {
    $callback = function($value) use ($form) {
        return $form === "kisbetus" ? strtolower($value) : strtoupper($value);
    };
    
    return array_map($callback, $tomb);
}

$kisbetus_tomb = atalakit_classic($szinek, "kisbetus");
$nagybetus_tomb = atalakit_classic($szinek, "nagybetus");

echo "Kisbetűs:\n";
print_r($kisbetus_tomb);

echo "\nNagybetűs:\n";
print_r($nagybetus_tomb);

$szinek_kisbetus = atalakit_array_map($szinek, "kisbetus");
$szinek_nagybetus = atalakit_array_map($szinek, "nagybetus");

echo "\nKisbetűs (array_map):\n";
print_r($szinek_kisbetus);

echo "\nNagybetűs (array_map):\n";
print_r($szinek_nagybetus);

?>
