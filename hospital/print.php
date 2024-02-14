<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Λήψη του ID από το query string
    $id = isset($_GET["id"]) ? $_GET["id"] : die("Λάθος ID.");

    // Εκτέλεση SQL query για τη λήψη των υπαρχόντων δεδομένων
    $sql = "SELECT * FROM hospital_data WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {  // Ελέγχουμε αν υπάρχει απάντηση από το query
        if ($result->num_rows == 1) {
            // Αν υπάρχει μόνο μια εγγραφή, τότε εμφάνισε τα δεδομένα
            $row = $result->fetch_assoc();
            $department = $row["department"];
            $specialty = $row["specialty"];
            $phone = $row["phone"];
            $hardware = $row["hardware"];
            $model = $row["model"];
            $import_date = $row["import_date"];
            $export_date = $row["export_date"];
            $note = $row["note"];
            $current_state = $row["current_state"];
        } else {
            // Αν δεν βρεθεί εγγραφή με το συγκεκριμένο ID, εμφάνισε μήνυμα λάθους
            die("Δεν βρέθηκαν δεδομένα για το συγκεκριμένο ID.");
        }
    } else {
        // Αν υπάρξει πρόβλημα με το query, εμφάνισε μήνυμα λάθους
        die("Σφάλμα κατά την εκτέλεση του SQL query: " . $conn->error);
    }
} else {
    die("Μη έγκυρη αίτηση.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκτύπωση Δεδομένων</title>
    <link rel="stylesheet" href="./assets/css/styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #ffffff;
        }

        label {
            font-weight: bold;
            color: #000000;
        }

        h2 {
            color: #000000;
        }

        p {
            margin: 5px 0;
            
        }
    </style>
</head>
<body>

    <div><a href="edit.php?id=<?php echo $id ?>"><span class="ph--key-return-fill"></span></a></div>

    

    <!-- Εμφάνιση δεδομένων -->
    <label for="department">Τμήμα:</label>
    <span><?php echo $department; ?></span>
    <hr>
    <br>

    <label for="specialty">Ειδικότητα:</label>
    <span><?php echo $specialty; ?></span>
    <hr>
    <br>

    <label for="phone">Τηλέφωνο:</label>
    <span><?php echo $phone; ?></span>
    <hr>
    <br>

    <label for="hardware">Είδος:</label>
    <span><?php echo $hardware; ?></span>
    <hr>
    <br>

    <label for="model">Μοντέλο:</label>
    <span><?php echo $model; ?></span>
    <hr>
    <br>

    <label for="import_date">Ημερομηνία Εισαγωγής:</label>
    <span><?php echo $import_date; ?></span>
    <hr>
    <br>

    <label for="export_date">Ημερομηνία Εξαγωγής:</label>
    <span><?php echo $export_date; ?></span>
    <hr>
    <br>

    <label for="note">Περιγραφή:</label>
    <span><?php echo $note; ?></span>
    <hr>
    <br>

    <label for="current_state">Κατάσταση:</label>
<!--     <span><?php echo ($current_state == 1) ? 'Ανοιχτό' : 'Κλειστό'; ?></span> -->
    <span><?php echo $current_state ?></span>

    <hr>
    <br>

    <button type="button" id="print-hide" class="button delete-button" onclick="printData()">Εκτύπωση<span class="uit--print"></span></button>
    <script>
    function printData() {
            // Ανοίγει το παράθυρο εκτύπωσης
            document.getElementById("print-hide").style.display = "none";
            window.print();
        }
    </script>

</body>
</html>
<?php
$conn->close();
?>
