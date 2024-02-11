<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once "db_connection.php";

    // Prepare and bind parameters
    $sql = "INSERT INTO service_offers (service_name, price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $service_name, $price);

    // Set parameters and execute
    $service_name = $_POST["service_name"];
    $price = $_POST["price"];

    if ($stmt->execute()) {
        // Redirect to services page after successful addition
        header("Location: admin_dashboard.php#services");
        exit();
    } else {
        // Redirect with error message if addition fails
        header("Location: admin_dashboard.php#services?error=add_failed");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
