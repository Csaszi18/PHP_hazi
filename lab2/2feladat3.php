<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelv => $napok_lista) {
    echo "$nyelv: ";
    foreach ($napok_lista as $nap) {      
        if ($nap === "K" || $nap === "Th" || $nap === "Szo") {
            echo "<strong>$nap</strong>, ";
        } else {
            echo "$nap, ";
        }
    }

    echo rtrim(implode(", ", $napok_lista), ', ') . "<br>";
}

?>
