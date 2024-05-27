<?php
include 'config.php'; // Uključivanje konfiguracije za bazu podataka

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashovanje lozinke

    // Provera da li korisnik već postoji
    $checkUser = "SELECT * FROM Korisnici WHERE korisnicko_ime='$username' OR email='$email'";
    $result = $conn->query($checkUser);
    if ($result->num_rows > 0) {
        echo "Korisničko ime ili email već postoji!";
    } else {
        // Dodavanje novog korisnika u bazu
        $sql = "INSERT INTO Korisnici (korisnicko_ime, email, lozinka) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "Novi korisnik je uspešno registrovan!";
        } else {
            echo "Greška: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Registracija</h1>
    <form method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Registruj se</button>
    </form>
</body>
</html>

