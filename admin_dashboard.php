<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="assets/css/admin.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/favicon.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">
    
</head>
<body>
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0"><a href="admin_dashboard.php">P.R.S. Woodworks</a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#dashboard">Home</a></li>
                <li><a class="nav-link scrollto" href="#appointments">Appointments</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                <li><a class="nav-link scrollto" href="#contact">Feedback</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <div class="nav-buttons">
            <a href="logout.php" class="book-a-table-btn scrollto d-none d-lg-flex">Logout</a>
        </div>
    </div>

    <!-- ======= Dashboard Section ======= -->
    <!-- <section id="dashboard" class="dashboard">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
                <h2>Home</h2>
                <p>Admin Dashboard</p>
            </div>
          </div>
        </div>

      </div> -->
    </section><!-- End Services Section -->

    <!-- ======= Appointments Section ======= -->
    <section id="appointments" class="appointments">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
                <h2>Appointments</h2>
                <p>Client's Book Appointments</p>
            </div>

            <div class="appointments-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Connect to database
                        $conn = mysqli_connect("localhost", "root", "", "woodworks_db");

                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch appointments data
                        $sql = "SELECT * FROM book_appointment";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['time'] . "</td>";
                                echo "<td>" . $row['service'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>"; // Display status
                                echo "<td><a href='edit_appointment.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_appointment.php?id=" . $row['id'] . "'>Delete</a></td>"; // Action links
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No appointments found</td></tr>";
                        }

                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Appointments Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="row">
        <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
                <h2>Services</h2>
                <p>Service Offered Categories</p>
            </div>

            <!-- View Services Table -->
            <div class="services-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Connect to database
                        $conn = mysqli_connect("localhost", "root", "", "woodworks_db");

                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        // Fetch services data
                        $sql = "SELECT * FROM service_offers";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['service_name'] . "</td>";
                                echo "<td>P" . $row['price'] . "</td>";
                                echo "<td><a href='edit_service.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_service.php?id=" . $row['id'] . "'>Delete</a></td>"; // Action links
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No services found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Add Service Form -->
            <div class="add-service-form">
                <h3>Add New Service</h3>
                <form action="add_service.php" method="post">
                    <label for="service_name">Service Name:</label>
                    <input type="text" id="service_name" name="service_name" required>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required>
                    <button type="submit">Add Service</button>
                </form>
            </div>
        </div>
        </div>

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Feedback Section ======= -->
        <section id="feedback" class="feedback">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <div class="section-title">
                <h2>Feedback</h2>
                <p>Customer's Feedback</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Feedback Section -->

    
</body>
</html>
