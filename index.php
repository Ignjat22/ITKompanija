<?php
include 'config.php'; // Uključivanje konfiguracije za bazu podataka
session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Početna strana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
        footer {
            background-color: #343a40;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projekat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projekti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tehnologije</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Zaposleni</a>
                    </li>
                </ul>
                <div class="d-flex ms-auto">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<a href="logout.php" class="btn btn-outline-danger">Odjavi se</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-3">Dobrodošli na našu stranicu!</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Projekti</div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM Projekti";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<ul class="list-group list-group-flush">';
                            while($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">' . "ID: " . $row["id"]. " - Naziv: " . $row["naziv_projekta"]. " - Opis: " . $row["opis"]. '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo "Nema projekata.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Tehnologije</div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM Tehnologije";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<ul class="list-group list-group-flush">';
                            while($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">' . "ID: " . $row["id"]. " - Naziv: " . $row["naziv_tehnologije"]. " - Opis: " . $row["opis"]. '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo "Nema tehnologija.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Zaposleni</div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM Zaposleni";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<ul class="list-group list-group-flush">';
                            while($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">' . "ID: " . $row["id"]. " - Ime: " . $row["ime"]. " " . $row["prezime"]. " - Pozicija: " . $row["pozicija"]. '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo "Nema zaposlenih.";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white mt-4">
        <div class="container-fluid py-3">
            <p class="text-center mb-0">Copyright &copy; 2023 Projekat</p>
        </div>
    </footer>
</body>
</html>

