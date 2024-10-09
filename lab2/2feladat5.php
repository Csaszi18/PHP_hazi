<?php

$bevasarlolista = [];

function addToShoppingList(&$list, $name, $quantity, $unitPrice) {
    $list[] = [
        "nev" => $name,
        "mennyiseg" => $quantity,
        "egysegar" => $unitPrice
    ];
}

function removeFromShoppingList(&$list, $name) {
    foreach ($list as $index => $item) {
        if ($item["nev"] === $name) {
            unset($list[$index]);
            echo "A(z) '$name' eltávolítva a bevásárlólistáról.\n";
            return;
        }
    }
    echo "A(z) '$name' nem található a bevásárlólistán.\n";
}

function printShoppingList($list) {
    if (empty($list)) {
        echo "A bevásárlólista üres.\n";
        return;
    }
    
    echo "Bevásárlólista:\n";
    foreach ($list as $item) {
        echo "- " . $item["nev"] . ": " . $item["mennyiseg"] . " db (egységár: " . $item["egysegar"] . " Ft)\n";
    }
}

function calculateTotalCost($list) {
    $total = 0;
    foreach ($list as $item) {
        $total += $item["mennyiseg"] * $item["egysegar"];
    }
    return $total;
}

addToShoppingList($bevasarlolista, "Kenyer", 2, 8.5);
addToShoppingList($bevasarlolista, "Viz", 1, 2.5);
addToShoppingList($bevasarlolista, "Tej", 3, 6.0);

printShoppingList($bevasarlolista);

$totalCost = calculateTotalCost($bevasarlolista);
echo "Összköltség: " . $totalCost . " Ft\n";

removeFromShoppingList($bevasarlolista, "Viz");

printShoppingList($bevasarlolista);

$totalCost = calculateTotalCost($bevasarlolista);
echo "Új összköltség: " . $totalCost . " Ft\n";

?>
