<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are correct (for simplicity, you should use secure authentication methods)
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check against database (Assuming you have a database connection)
    $admin_username = "admin"; // This should be fetched from the database
    $admin_password = "admin@123"; // This should be fetched from the database

    if ($username === $admin_username && $password === $admin_password) {
        // Authentication successful
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Authentication failed
        $_SESSION["login_error"] = "Invalid username or password";
        header("Location: admin_login.php");
        exit();
    }
}
?>
