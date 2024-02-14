<?php
include "database.php";



if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // Λήψη του ID από το query string
  $id = isset($_GET["id"]) ? $_GET["id"] : die("Λάθος ID.");

  // Εκτέλεση SQL query για τη λήψη των υπαρχόντων δεδομένων
  $sql = "SELECT * FROM hospital_data WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Αν υπάρχει μόνο μια εγγραφή, τότε εμφάνισε τα δεδομένα στη φόρμα επεξεργασίας
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
}

// Εάν έχει υποβληθεί η φόρμα επεξεργασίας
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_GET["id"]) ? $_GET["id"] : die("Λάθος ID.");

  // Λήψη των τροποποιημένων δεδομένων από τη φόρμα
  $department = $_POST["department"];
  $specialty = $_POST["specialty"];
  $phone = $_POST["phone"];
  $hardware = $_POST["hardware"];
  $model = $_POST["model"];
  $import_date = $_POST["import_date"];
  $export_date = $_POST["export_date"];
  $note = $_POST["note"];
  $current_state = $_POST["current_state"];

  // Εκτέλεση SQL query για το update των δεδομένων
  
  $update_sql = "UPDATE hospital_data SET department='$department', specialty='$specialty', phone='$phone', hardware='$hardware', model='$model', import_date='$import_date', export_date='$export_date', note='$note', current_state='$current_state' WHERE id='$id'";

  if ($conn->query($update_sql) === TRUE) {
    echo "<div class=\"success-import\">Επιτυχής ενημέρωση δεδομένων.</div>";
  } else {
    echo "Σφάλμα κατά την ενημέρωση δεδομένων: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Δεδομένων</title>

    <link rel="stylesheet" href="./assets/css/styles.css">

    
</head>
<body>
<div class="navbar" id="print-hide">
        <div class="navbar-content">
        <img src="./assets/imgs/logo.png" class="logo" alt="Zibra Logo">

            <h1>Σύνδεση ως: <?php echo $username ?></h1>
            <a href="index.php" class="back-button"><button class="nav-button" style="display: flex; justify-content: center; align-items: center;">Επιστροφή<span class="material-symbols-light--keyboard-return"></span></button></a>
            <a href="print.php?id=<?php echo $id; ?>" class="back-button"><button class="nav-button" style="display: flex; justify-content: center; align-items: center;">Προβολή<span class="material-symbols-light--feature-search-outline"></span></button></a>
        </div>
    </div> <!-- Navbar -->

    <div class="import-form update">
    <h2 id="print-hide">Επεξεργασία Δεδομένων</h2>
    <form method="post" action="">
        <!-- Εμφάνιση υπαρχόντων δεδομένων -->
        <label for="department">Τμήμα:</label>
        <input type="text" name="department" id="department"class="mb-10" value="<?php echo $department; ?>"><br>
        
        <label for="specialty">Ειδικότητα:</label>
        <input type="text" name="specialty" id="specialty" class="mb-10" value="<?php echo $specialty; ?>"><br>
        
        <label for="phone">Τηλέφωνο:</label>
        <input type="text" name="phone" id="phone" class="mb-10" value="<?php echo $phone; ?>"><br>
        
        <label for="hardware">Είδος:</label>
        <input type="text" name="hardware" id="hardware" class="mb-10" value="<?php echo $hardware; ?>"><br>
        
        <label for="model">Μοντέλο:</label>
        <input type="text" name="model" id="model" class="mb-10" value="<?php echo $model; ?>"><br>
        
        <label for="import_date">Ημερομηνία Εισαγωγής:</label>
        <input type="date" name="import_date" id="import_date" class="mb-10" value="<?php echo $import_date; ?>"><br>
        
        <label for="export_date">Ημερομηνία Εξαγωγής:</label>
        <input type="date" name="export_date" id="export_date" class="mb-10" value="<?php echo $export_date; ?>"><br>

        
        <div class="column">
            <textarea id="note" name="note" rows="4" cols="50" class="note mb-10"><?php echo $note; ?></textarea>
        </div>
        
        
        <label for="current_state">Κατάσταση:</label>
        <!-- <input type="radio" name="current_state" class="mb-10" id="current_state" value="0" <?php echo ($current_state == 0) ? 'checked' : ''; ?>> <span class="radio-text">Ανοιχτή</span>
        <input type="radio" name="current_state" class="mb-10" value="1" <?php echo ($current_state == 1) ? 'checked' : ''; ?>> <span class="radio-text">Κλειστή</span>
 -->    <select name="current_state" id="current_state">
            <option value="Ανοιχτή">Ανοιχτή</option>
            <option value="Κλειστή">Κλειστή</option>
        </select>
        
        <!-- Κουμπί υποβολής φόρμας -->
        <div class="row mt-10">
        <button type="button" id="print-hide" class="button delete-button" onclick="deleteRecord()">Διαγραφή<span class="material-symbols-light--delete-outline"></span></button>
        <button type="submit" id="print-hide" class="button save-button">Αποθήκευση<span class="material-symbols-light--save-as-outline"></span></button>
        </div>

    </form>
</div>

<script>
        function deleteRecord() {
            var confirmation = confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε την εγγραφή;");
            if (confirmation) {
                // Προωθήστε τον χρήστη σε ένα αρχείο delete.php (πρέπει να το δημιουργήσετε)
                window.location.href = 'delete.php?id=<?php echo $id; ?>';
            }
        }

    </script>
</body>
</html>
