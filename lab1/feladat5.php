<?php

$a = 10;
$b = 0;
$operator = '/';

switch ($operator) {
    case '+':
        echo "$a + $b = " . ($a + $b);
        break;
    
    case '-':
        echo "$a - $b = " . ($a - $b);
        break;
    
    case '*':
        echo "$a * $b = " . ($a * $b);
        break;
    
    case '/':
        if ($b != 0) {
            echo "$a / $b = " . ($a / $b);
        } else {
            echo "Hiba: 0-val való osztás nem lehetséges.";
        }
        break;
    
    case '^':
        echo "$a ^ $b = " . ($a ** $b);
        break;
    
    default:
        echo "Hiba: Érvénytelen műveleti jel.";
        break;
}

?>
