<?php            
            // PHP ΕΙΣΑΓΩΓΗΣ ΔΕΔΟΜΕΝΩΝ
            if (isset($_POST["department"])) {
                include "database.php";
            
                $sql = "INSERT INTO hospital_data (department, specialty, phone, hardware, model, import_date, note) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
            
                $stmt->bind_param("sssssss", $department, $specialty, $phone, $hardware, $model, $import_date, $note);
            
                $department = $_POST["department"];
                $specialty = $_POST["specialty"];
                $phone = $_POST["phone"];
                $hardware = $_POST["hardware"];
                $model = $_POST["model"];
                $import_date = $_POST["import_date"];
                $note = $_POST["note"];
            
                $stmt->execute();
            
                echo "<p class='success'>Επιτυχής εισαγωγή δεδομένων!</p>";
                $stmt->close();
            }
?>