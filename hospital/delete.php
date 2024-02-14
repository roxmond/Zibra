<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Λήψη του ID από το query string
    $id = isset($_GET["id"]) ? $_GET["id"] : die("Λάθος ID.");

    // Εκτέλεση SQL query για τη διαγραφή της εγγραφής
    $delete_sql = "DELETE FROM hospital_data WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<div class=\"success-delete\">Επιτυχής διαγραφή εγγραφής.</div>";
    } else {
        echo "Σφάλμα κατά τη διαγραφή εγγραφής: " . $conn->error;
    }

    // Κλείσιμο σύνδεσης με τη βάση δεδομένων
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαγραφή Δεδομένων</title>

    <link rel="stylesheet" href="./assets/css/styles.css">

</head>
<body>
<div class="navbar">
        <div class="navbar-content">
            <h1>Σύνδεση ως: <?php echo $username ?></h1>
            <a href="index.php" class="back-button"><button class="nav-button" style="display: flex; justify-content: center; align-items: center;">Επιστροφή<span class="material-symbols-light--keyboard-return"></span></button></a>            
        </div>
    </div> <!-- Navbar -->