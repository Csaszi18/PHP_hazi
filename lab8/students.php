<?php
session_start();
include 'db.php'; // Adatbáziskapcsolat

// Ellenőrzés: be van-e jelentkezve a felhasználó
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Hallgatók listájának lekérdezése
$stmt = $pdo->prepare("SELECT * FROM hallgatok ORDER BY id");
$stmt->execute();
$hallgatok = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Hallgatók listája</title>
</head>
<body>
<h3>Hallgatók listája</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Név</th>
        <th>Szak</th>
        <th>Átlag</th>
    </tr>
    <?php foreach ($hallgatok as $hallgato): ?>
        <tr>
            <td><?= htmlspecialchars($hallgato['id']) ?></td>
            <td><?= htmlspecialchars($hallgato['nev']) ?></td>
            <td><?= htmlspecialchars($hallgato['szak']) ?></td>
            <td><?= htmlspecialchars($hallgato['atlag']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="logout.php">Kijelentkezés</a>
</body>
</html>
