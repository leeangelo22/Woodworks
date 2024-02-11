<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Check if appointment ID is set
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: ../admin_dashboard.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

// Get appointment ID from URL parameter
$appointment_id = $_GET["id"];

// Delete appointment from database
$sql = "DELETE FROM book_appointment WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();

// Redirect back to admin dashboard
header("Location: ../admin_dashboard.php");
exit();
?>
