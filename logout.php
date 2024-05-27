<?php
session_start(); // Pokretanje sesije
session_destroy(); // Uništavanje sesije
header("Location: login.php"); // Preusmeravanje na početnu stranicu
exit;
?>

