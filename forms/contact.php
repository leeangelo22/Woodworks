<?php
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect or display success message
    // header("Location: contact_success.php");
    // exit();
}
?>

