<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../admin_login.php");
    exit();
}

// Include database connection
require_once "../db_connection.php";

// Check if ID parameter is passed in the URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Prepare a select statement
    $sql = "SELECT * FROM service_offers WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Fetch result row as an associative array
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve individual field value
                $service_name = $row["service_name"];
                $price = $row["price"];
            } else {
                // Redirect to error page if service ID does not exist
                header("Location: ../admin_dashboard.php#services?error=service_not_found");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
} else {
    // Redirect to error page if ID parameter is not provided
    header("Location: ../admin_dashboard.php#services?error=missing_id");
    exit();
}
?>
