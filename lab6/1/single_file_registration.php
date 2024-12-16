<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // A PHP feldolgozás itt történik
    $errors = [];
    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $attend = $_POST['attend'] ?? [];
    $tshirt = $_POST['tshirt'] ?? 'P';
    $terms = isset($_POST['terms']);
    $abstract = $_FILES['abstract'] ?? null;

    // Validáció
    if (empty($firstName)) $errors[] = "First name is required.";
    if (empty($lastName)) $errors[] = "Last name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (empty($attend)) $errors[] = "You must select at least one event.";
    if (!$terms) $errors[] = "You must agree to the terms and conditions.";

    if ($abstract && $abstract['error'] == 0) {
        $allowedMime = ['application/pdf'];
        $maxSize = 3 * 1024 * 1024;

        if (!in_array($abstract['type'], $allowedMime)) {
            $errors[] = "Only PDF files are allowed.";
        }
        if ($abstract['size'] > $maxSize) {
            $errors[] = "The file size must not exceed 3MB.";
        }
    } else {
        $errors[] = "Abstract file is required.";
    }

    if ($errors) {
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<h3>Registration Successful</h3>";
        echo "<p><strong>First Name:</strong> $firstName</p>";
        echo "<p><strong>Last Name:</strong> $lastName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Events:</strong> " . implode(', ', $attend) . "</p>";
        echo "<p><strong>T-Shirt Size:</strong> $tshirt</p>";
        echo "<p><strong>Abstract:</strong> Uploaded Successfully.</p>";
    }
}
?>

<h3>Online Conference Registration</h3>
<form method="post" action="" enctype="multipart/form-data">
    <!-- Ugyanaz az űrlap, mint az előző példában -->
</form>
</body>
</html>
