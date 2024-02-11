<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

// Check if service ID is provided and not empty
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Prepare a delete statement
    $sql = "DELETE FROM service_offers WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Service deleted successfully, redirect to services page
            header("Location: ../admin_dashboard.php#services");
            exit();
        } else {
            // Redirect to error page if unable to delete service
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();
} else {
    // Redirect to error page if service ID is not provided
    header("Location: ../admin_dashboard.php");
    exit();
}

// Close connection
$conn->close();
?>
