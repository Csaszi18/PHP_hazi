<?php
function evszak($honap) {
    if ($honap < 1 || $honap > 12) {
        return "Érvénytelen hónap";
    } elseif ($honap <= 2 || $honap == 12) {
        return "Tél";
    } elseif ($honap <= 5) {
        return "Tavasz";
    } elseif ($honap <= 8) {
        return "Nyár";
    } else {
        return "Ősz";
    }
}

function evszak_switch($honap) {
    if ($honap < 1 || $honap > 12) {
        return "Érvénytelen hónap";
    }
    
    switch ($honap) {
        case 12:
        case 1:
        case 2:
            return "Tél";
        case 3:
        case 4:
        case 5:
            return "Tavasz";
        case 6:
        case 7:
        case 8:
            return "Nyár";
        default:
            return "Ősz";
    }
}

$honap = 6;
echo "Az évszak: " . evszak($honap ) . "<br>";
$honap = 3;
echo "Az évszak: " . evszak_switch($honap);

?>
