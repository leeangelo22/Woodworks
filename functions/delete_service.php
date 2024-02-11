<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Include database connection
require_once "db_connection.php";

// Check if ID parameter is passed in the URL
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
            // Redirect to services page after successful deletion
            header("Location: admin_dashboard.php#services");
            exit();
        } else {
            // Redirect with error message if deletion fails
            header("Location: admin_dashboard.php#services?error=delete_failed");
            exit();
        }
    }

    // Close statement
    $stmt->close();
} else {
    // Redirect to error page if ID parameter is not provided
    header("Location: admin_dashboard.php#services?error=missing_id");
    exit();
}

// Close connection
$conn->close();
?>
