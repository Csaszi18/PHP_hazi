<?php

function printMultiplicationTable($n) {
    $color = "background-color: lightblue;";

    $displayTable = function() use ($n, $color) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        
        for ($i = 1; $i <= $n; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $n; $j++) {
         
                if ($i == $j) {
                    echo "<td style='$color'>" . ($i * $j) . "</td>";
                } else {
                    echo "<td>" . ($i * $j) . "</td>";
                }
            }
            echo "</tr>";
        }
        
        echo "</table>";
    };

    $displayTable();
}

$n = 10;
printMultiplicationTable($n);

?>
