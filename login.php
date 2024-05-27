<?php
include 'config.php'; // Uključivanje konfiguracije za bazu podataka

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Provera korisnika u bazi
    $sql = "SELECT lozinka FROM Korisnici WHERE korisnicko_ime='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['lozinka'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            echo "Pogrešna lozinka!";
        }
    } else {
        echo "Korisničko ime ne postoji!";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Uloguj se</button>
    </form>
</body>
</html>

