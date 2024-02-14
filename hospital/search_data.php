<?php
include "database.php";

// Λήψη κριτηρίων αναζήτησης
$department = isset($_GET["department"]) ? $_GET["department"] : "";
$specialty = isset($_GET["specialty"]) ? $_GET["specialty"] : "";
$phone = isset($_GET["phone"]) ? $_GET["phone"] : "";
$hardware = isset($_GET["hardware"]) ? $_GET["hardware"] : "";
$model = isset($_GET["model"]) ? $_GET["model"] : "";
$import_date_start = isset($_GET["import_date_start"]) ? $_GET["import_date_start"] : "";
$import_date_end = isset($_GET["import_date_end"]) ? $_GET["import_date_end"] : "";
$note = isset($_GET["note"]) ? $_GET["note"] : "";
$current_state = isset($_GET["current_state"]) ? $_GET["current_state"] : "";

// Κατασκευή SQL query
$sql = "SELECT * FROM hospital_data WHERE 1 = 1";

// Προσθήκη WHERE clauses βάσει κριτηρίων
if (!empty($department)) {
  $sql .= " AND department LIKE '%$department%'";
}
if (!empty($specialty)) {
  $sql .= " AND specialty LIKE '%$specialty%'";
}
if (!empty($phone)) {
  $sql .= " AND phone LIKE '%$phone%'";
}
if (!empty($hardware)) {
  $sql .= " AND hardware LIKE '%$hardware%'";
}
if (!empty($model)) {
  $sql .= " AND model LIKE '%$model%'";
}
if (!empty($import_date_start) && !empty($import_date_end)) {
  $sql .= " AND import_date BETWEEN '$import_date_start' AND '$import_date_end'";
}
if (!empty($note)) {
  $sql .= " AND note LIKE '%$note%'";
}
if (!empty($current_state)) {
    $sql .= " AND current_state LIKE '%$current_state%'";
}
$sql .= " ORDER BY id DESC";

// Εκτέλεση SQL query
$result = $conn->query($sql);

// Εμφάνιση αποτελεσμάτων
if ($result->num_rows > 0) {

  echo "<h2 class=\"results-h2 hide\">Αποτελέσματα Αναζήτησης</h2>";
  echo "<table>";
  echo "<tr><th class=\"edit-row\">ID</th><th>Τμήμα</th><th>Ειδικότητα</th><th>Τηλέφωνο</th><th>Είδος</th><th>Μοντέλο</th><th>Ημερομηνία Εισαγωγής</th><th>Ημερομηνία Εξαγωγής</th><th>Περιγραφή</th><th class=\"edit-row\">Κατάσταση</th><th class=\"edit-row\"></th></tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["department"] . "</td>";
    echo "<td>" . $row["specialty"] . "</td>";
    echo "<td>" . $row["phone"] . "</td>";
    echo "<td>" . $row["hardware"] . "</td>";
    echo "<td>" . $row["model"] . "</td>";
    echo "<td>" . $row["import_date"] . "</td>";
    echo "<td>" . $row["export_date"] . "</td>";

    echo "<td>" . $row["note"] . "</td>";
    echo "<td>" . $row["current_state"] . "</td>";
    echo "<td class=\"edit-row\"><a href='edit.php?id=" . $row['id'] . "'><span class=\"ep--edit\"></span></a></td>";                    
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "<h2>Δεν βρέθηκαν αποτελέσματα.</h2>";
}

// Κλείσιμο σύνδεσης με τη βάση δεδομένων
$conn->close();
?>