<?php
// Ellenőrizni, hogy van-e már sütiben tárolt véletlen szám
if (!isset($_COOKIE['random_number'])) {
    // Ha nincs, generálunk egy újat és eltároljuk a sütiben
    $randomNumber = rand(1, 100);
    setcookie('random_number', $randomNumber, time() + 3600); // 1 óra érvényesség
} else {
    // Ha van, beolvassuk
    $randomNumber = (int)$_COOKIE['random_number'];
}

$feedback = "";
$userGuess = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // A felhasználó tippjének beolvasása
    $userGuess = isset($_POST['guess']) ? (int)$_POST['guess'] : null;

    if ($userGuess === null || $userGuess < 1 || $userGuess > 100) {
        $feedback = "Kérlek, adj meg egy számot 1 és 100 között!";
    } else {
        // Összehasonlítás a véletlen számmal
        if ($userGuess < $randomNumber) {
            $feedback = "A tipped túl alacsony!";
        } elseif ($userGuess > $randomNumber) {
            $feedback = "A tipped túl magas!";
        } else {
            $feedback = "Gratulálok! Kitaláltad a számot: $randomNumber.";
            // Új véletlen szám generálása, mert eltalálták
            $randomNumber = rand(1, 100);
            setcookie('random_number', $randomNumber, time() + 3600); // Frissítjük a sütit
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
