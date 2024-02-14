<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $username =  $_SESSION["username"];
?> <!-- Session Start -->

<!DOCTYPE html>
<html lang="el">
    <head>
        <meta charset="UTF-8">
        <title>Εισαγωγή & Αναζήτησης Δεδομένων</title>
        <link rel="stylesheet" href="./assets/css/styles.css">
        <script src="https://kit.fontawesome.com/199e2b799f.js" crossorigin="anonymous"></script>
        
        <script src="./assets/js/showPages.js"></script>
        <script src="./assets/js/showIcons.js"></script>
        

        
    </head>
    <body>

    <div class="navbar hide">
        <div class="navbar-content">
        <img src="./assets/imgs/logo.png" class="logo" alt="Zibra Logo">
            <h1>Σύνδεση ως: <?php echo $username ?></h1>
            <button class="nav-button" onclick="showForm()">Προσθήκη Βλάβης<span class="material-symbols-light--add-circle-outline"></span></button>
            <button class="nav-button" onclick="showSearch()">Αναζήτηση<span class="clarity--search-line"></span></button>
            <button id="printButton" class="nav-button" style="display: flex; justify-content: center; align-items: center;">Εκτύπωση<span class="uit--print"></span></button>


            <form action="logout.php" method="post">
                <button type="submit" value="Logout" class="nav-logout button">Logout<span class="circum--logout"></span></button>
            </form>
        </div>
    </div> <!-- Navbar -->
   
    <div class="container">
        <!-- ΦΟΡΜΑ ΕΙΣΑΓΩΓΗΣ ΔΕΔΟΜΕΝΩΝ -->
        <section class="form-section" id="form-section">
        <script src="./assets/js/importData.js"></script>
        </section>

        <!-- ΦΟΡΜΑ ΑΝΑΖΗΤΗΣΗΣ ΔΕΔΟΜΕΝΩΝ -->
        <section class="search-section" id="search-section">
        <script src="./assets/js/searchData.js"></script>
        </section>


        <section class="results-section" id="results-section">
        <?php include "import_data.php"; ?>
        <?php include "search_data.php"; ?>
        </section>
    </div>
    <script>
    document.getElementById("printButton").addEventListener("click", function () {
        // Κάνε το Navbar αόρατο
        document.querySelector(".hide").style.visibility = "hidden";
        
        // Περίμενε 1 δευτερόλεπτο και μετά επαναφέρε το Navbar
        setTimeout(function() {
            document.querySelector(".hide").style.visibility = "visible";
        }, 1000);

        // Ξεκίνα την εκτύπωση
        window.print();
    });
</script>
</body>
</html>