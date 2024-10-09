<?php

$orszagok = array("Magyarország" => "Budapest","Románia" => "Bukarest","Belgium" => "Brussels","Austria" => "Vienna","Poland" => "Warsaw"
);

$color = "color: red;";

foreach ($orszagok as $orszag => $fovaros) {
    echo "$orszag fővárosa <span style='$color'>$fovaros</span><br>";
}

?>
