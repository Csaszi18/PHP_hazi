<?php
global $pdo;
session_start(); // Munkamenet indítása
include 'db.php'; // Adatbáziskapcsolat importálása

$feedback = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Felhasználó ellenőrzése az adatbázisban
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: students.php"); // Hallgatói műveletek oldalára ugrás
        exit();
    } else {
        $feedback = "Helytelen felhasználónév vagy jelszó!";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
</head>
<body>
<h3>Bejelentkezés</h3>
<form method="POST" action="">
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <button type="submit">Bejelentkezés</button>
</form>
<p style="color:red"><?= htmlspecialchars($feedback) ?></p>
</body>
</html>
