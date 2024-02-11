<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate service ID
    if (isset($_POST["service_id"]) && !empty($_POST["service_id"])) {
        $service_id = $_POST["service_id"];

        // Validate service name and price
        if (isset($_POST["service_name"]) && isset($_POST["price"])) {
            $service_name = $_POST["service_name"];
            $price = $_POST["price"];

            // Update service details in the database
            $sql = "UPDATE service_offers SET service_name = ?, price = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdi", $service_name, $price, $service_id);
            $stmt->execute();
            $stmt->close();

            // Redirect to admin dashboard after updating
            header("Location: ../admin_dashboard.php");
            exit();
        } else {
            // If service name or price is not received
            echo "Service name or price is missing.";
        }
    } else {
        // If service ID is not received
        echo "Service ID is missing.";
    }

    // Close database connection
    $conn->close();
} else {
    // If the request method is not POST
    header("Location: ../admin_dashboard.php");
    exit();
}
?>
