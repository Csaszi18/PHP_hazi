<?php
session_start();
session_destroy(); // Munkamenet törlése
header("Location: login.php");
exit();
?>
