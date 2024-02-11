<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Check if service ID is set
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: ../admin_dashboard.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

// Get service ID from URL parameter
$service_id = $_GET["id"];

// Fetch service details
$sql = "SELECT * FROM service_offers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $service_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirect if service not found
    header("Location: ../admin_dashboard.php");
    exit();
}

// Fetch service details
$service = $result->fetch_assoc();

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Service</h2>
        <form action="update_service.php" method="post">
            <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" value="<?php echo $service['service_name']; ?>" required>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" value="<?php echo $service['price']; ?>" required>
            <button type="submit">Update Service</button>
        </form>
    </div>
</body>
</html>
