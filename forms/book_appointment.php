<?php
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO book_appointment (name, email, phone, date, time, service, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $date, $time, $service, $message);

    // Execute the statement
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect or display success message
    header("Location: book_success.php");
    exit();
}
?>

