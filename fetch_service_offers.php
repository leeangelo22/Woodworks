<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "woodworks_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch service offers
$sql = "SELECT service_name, price FROM service_offers";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="menu-content">';
        echo '<a href="#">' . $row["service_name"] . '</a><span>₱' . $row["price"] . '</span>';
        echo '</div>';
    }
} else {
    echo "No service offers available.";
}

// Close database connection
$conn->close();
?>
