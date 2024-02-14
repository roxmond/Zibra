<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <?php 
    $json_data = file_get_contents('info.json');
    $data = json_decode($json_data, true);
    ?>
</head>

<body>

<div class="login-container">
<img src="./assets/imgs/logo.png" class="logo-login" alt="Zibra Logo">
        <div class="login-box">
                <span class="arcticons--simplelogin"></span>
                
                <form action="login.php" method="post" class="login-form">
                <input type="text" id="username" name="username" placeholder="Username" class="login-textholder" require>
                <input type="password" id="password" name="password" placeholder="Password"  class="login-textholder" autocomplete="password" require>
                <button type="submit">Σύνδεση</button>
            </form>
        </div>
        <div class="version">
        <p><?php echo $data['version']; ?></p>
        </div>
    </div>

</body>
</html>

<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace the following with your actual authentication logic
    $validUsername = "teo";
    $validPassword = "12345";

    if ($username === $validUsername && $password === $validPassword) {
        // Set session variable to indicate the user is logged in
        session_start();
        $_SESSION["username"] = $username;

        // Redirect to the dashboard upon successful login
        header("Location: index.php");
        exit();
    } else {
        // Display an error message for invalid credentials
        echo "<p class='error'>Λανθασμένο username ή password</p>";
    }
}
?>