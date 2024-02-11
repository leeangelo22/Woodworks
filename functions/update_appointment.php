<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate appointment ID
    if (isset($_POST["appointment_id"]) && !empty($_POST["appointment_id"])) {
        $appointment_id = $_POST["appointment_id"];
    } else {
        // Redirect if appointment ID is missing
        header("Location: ../admin_dashboard.php");
        exit();
    }

    // Validate and sanitize other form inputs
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $date = $_POST["date"];
    $time = $_POST["time"];
    $service = $_POST["service"];
    $status = $_POST["status"];

    // Update appointment in the database
    $sql = "UPDATE book_appointment SET name=?, email=?, date=?, time=?, service=?, status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $email, $date, $time, $service, $status, $appointment_id);

    if ($stmt->execute()) {
        // Appointment updated successfully, redirect to admin dashboard
        header("Location: ../admin_dashboard.php");
        exit();
    } else {
        // Error occurred, redirect to edit appointment page with error message
        header("Location: edit_appointment.php?id=$appointment_id&error=update_failed");
        exit();
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, redirect to admin dashboard
    header("Location: ../admin_dashboard.php");
    exit();
}
?>
