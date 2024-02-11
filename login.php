<?php
session_start();

// Check if the user is already logged in, redirect to dashboard if true
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin/home.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once "db_connection.php";

    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute SQL statement to fetch user from database
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify user and password
    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful, set session variables
        $_SESSION['admin_logged_in'] = true;
        // Redirect to dashboard
        header("Location: admin/home.php");
        exit;
    } else {
        // Authentication failed, show error message
        $error = "Invalid username or password";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

      <!-- Favicons -->
        <link href="assets/img/favicon.jpg" rel="icon">
        <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
            background-image: url('assets/img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Set the height to full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 30px;
            
            color: 0;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-container form label {
            margin-bottom: 10px;
        }
        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            color: #a49b89;
            /* background-color: #0c0b09;
            border: var(--bs-border-width) solid #625b4b; */
            border-radius: 0rem;
            font-size: 14px;
        }
        .login-container form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #cda45e;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container form input[type="submit"]:hover {
            background: #d3af71;
        }
        a {
            color: #a57727;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1><b>Admin Login</b></h1>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- <label class="username" for="username">Username:</label> -->
            <input type="text" id="username" name="username" placeholder="Username">
            <!-- <label class="password" for="password">Password:</label> -->
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Login"><br>
            <a href="index.php#book-a-table">Book an Appointment</a>
        </form>
    </div>
</body>
</html>
