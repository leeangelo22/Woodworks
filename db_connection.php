<?php
$host = "localhost"; // Host name
$user = "root"; // Mysql username
$password = ""; // Mysql password
$database = "woodworks_db"; // Database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>