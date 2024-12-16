<?php
session_start(); // Munkamenet indítása

// Véletlen szám generálása, ha még nem létezik a session-ben
if (!isset($_SESSION['random_number'])) {
    $_SESSION['random_number'] = rand(1, 100); // Generálunk egy 1-100 közötti számot
}

$randomNumber = $_SESSION['random_number']; // Az aktuális véletlen szám
$feedback = "";
$userGuess = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Felhasználó tippjének beolvasása
    $userGuess = isset($_POST['guess']) ? (int)$_POST['guess'] : null;

    if ($userGuess === null || $userGuess < 1 || $userGuess > 100) {
        $feedback = "Kérlek, adj meg egy számot 1 és 100 között!";
    } else {
        // Tipp ellenőrzése
        if ($userGuess < $randomNumber) {
            $feedback = "A tipped túl alacsony!";
        } elseif ($userGuess > $randomNumber) {
            $feedback = "A tipped túl magas!";
        } else {
            $feedback = "Gratulálok! Kitaláltad a számot: $randomNumber.";
            // Új szám generálása, mert eltalálták
            $_SESSION['random_number'] = rand(1, 100);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Találd ki a számot!</title>
</head>
<body>
<h3>Találd ki a számot (1 és 100 között)!</h3>
<form method="POST" action="">
    <label for="guess">Tipped:</label>
    <input type="number" id="guess" name="guess" min="1" max="100" required>
    <br><br>
    <input type="submit" value="Elküld">
</form>
<br>
<p><strong><?= htmlspecialchars($feedback) ?></strong></p>
</body>
</html>
