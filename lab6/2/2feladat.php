<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<?php
$errors = [];
$name = $email = $password = $confirmPassword = $birthdate = $gender = "";
$interests = [];
$country = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adatok begyűjtése
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $interests = $_POST['interests'] ?? [];
    $country = $_POST['country'] ?? '';

    // Név ellenőrzése
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // E-mail cím ellenőrzése
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    // Jelszó ellenőrzése
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[\W]/', $password)) {
        $errors[] = "Password must be at least 8 characters long, and include at least one uppercase letter, one number, and one special character.";
    }

    // Jelszó megerősítés ellenőrzése
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Születési dátum ellenőrzése
    if (empty($birthdate) || !strtotime($birthdate)) {
        $errors[] = "A valid birthdate is required.";
    }

    // Nem ellenőrzése
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    // Hibák megjelenítése vagy sikeres adatok feldolgozása
    if (!empty($errors)) {
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<h3>Registration Successful</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Birthdate:</strong> $birthdate</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Interests:</strong> " . (!empty($interests) ? implode(', ', $interests) : "None") . "</p>";
        echo "<p><strong>Country:</strong> " . ($country ?: "Not selected") . "</p>";
    }
}
?>

<h3>Registration Form</h3>
<form method="post" action="">
    <label for="name">Name:
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required>
    </label>
    <br><br>

    <label for="email">Email:
        <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
    </label>
    <br><br>

    <label for="password">Password:
        <input type="password" name="password" id="password" required>
    </label>
    <br><br>

    <label for="confirmPassword">Confirm Password:
        <input type="password" name="confirmPassword" id="confirmPassword" required>
    </label>
    <br><br>

    <label for="birthdate">Birthdate:
        <input type="date" name="birthdate" id="birthdate" value="<?= htmlspecialchars($birthdate) ?>" required>
    </label>
    <br><br>

    <label>Gender:<br>
        <input type="radio" name="gender" value="Male" <?= $gender === "Male" ? "checked" : "" ?>> Male<br>
        <input type="radio" name="gender" value="Female" <?= $gender === "Female" ? "checked" : "" ?>> Female<br>
        <input type="radio" name="gender" value="Other" <?= $gender === "Other" ? "checked" : "" ?>> Other<br>
    </label>
    <br><br>

    <label>Interests:<br>
        <input type="checkbox" name="interests[]" value="Sports" <?= in_array("Sports", $interests) ? "checked" : "" ?>> Sports<br>
        <input type="checkbox" name="interests[]" value="Arts" <?= in_array("Arts", $interests) ? "checked" : "" ?>> Arts<br>
        <input type="checkbox" name="interests[]" value="Science" <?= in_array("Science", $interests) ? "checked" : "" ?>> Science<br>
    </label>
    <br><br>

    <label for="country">Country:
        <select name="country" id="country">
            <option value="">Please select</option>
            <option value="Hungary" <?= $country === "Hungary" ? "selected" : "" ?>>Hungary</option>
            <option value="USA" <?= $country === "USA" ? "selected" : "" ?>>USA</option>
            <option value="Germany" <?= $country === "Germany" ? "selected" : "" ?>>Germany</option>
            <option value="Other" <?= $country === "Other" ? "selected" : "" ?>>Other</option>
        </select>
    </label>
    <br><br>

    <input type="submit" value="Register">
</form>
</body>
</html>
