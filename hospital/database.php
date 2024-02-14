<?php

$servername = "localhost";
$username = "teo";
$password = "12345";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
} /* else {
    echo "Σύνδεση επιτυχής!"; // Προσωρινό μήνυμα για έλεγχο
} */

?>
