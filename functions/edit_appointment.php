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

// Fetch appointment details
$sql = "SELECT * FROM book_appointment WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirect if appointment not found
    header("Location: ../admin_dashboard.php");
    exit();
}

// Fetch appointment details
$appointment = $result->fetch_assoc();

// Close prepared statement
$stmt->close();

// Fetch services from the database
$sql_services = "SELECT * FROM service_offers";
$result_services = $conn->query($sql_services);
$services = [];

if ($result_services->num_rows > 0) {
    // Store services in an array
    while ($row = $result_services->fetch_assoc()) {
        $services[] = $row;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Appointment</h2>
        <form action="update_appointment.php" method="post">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $appointment['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $appointment['email']; ?>" required>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $appointment['date']; ?>" required>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo $appointment['time']; ?>" required>

            <!-- Dropdown for Service -->
            <label for="service">Service:</label>
            <select id="service" name="service">
                <?php foreach ($services as $service) : ?>
                    <option value="<?php echo $service['service_name']; ?>" <?php if ($service['service_name'] == $appointment['service']) echo 'selected'; ?>><?php echo $service['service_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Dropdown for Status -->
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Pending" <?php if ($appointment['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Reserved" <?php if ($appointment['status'] == 'Reserved') echo 'selected'; ?>>Reserved</option>
                <option value="Approved" <?php if ($appointment['status'] == 'Approved') echo 'selected'; ?>>Approved</option>
            </select>

            <button type="submit">Update Appointment</button>
        </form>
    </div>
</body>
</html>
