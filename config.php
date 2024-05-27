<?php
$servername = "localhost";
$username = "lazar";
$password = "password";
$dbname = "informatika";

// Kreiranje konekcije
$conn = new mysqli($servername, $username, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

