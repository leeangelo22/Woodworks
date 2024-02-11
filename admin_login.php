<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.R.S. Woodworks | Login</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

    <link href="assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="admin_authenticate.php" method="POST">
            <!-- <label for="username">Username:</label> -->
            <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            <!-- <label for="password">Password:</label> -->
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Login</button><br><br>
            <a href="index.php#book-a-table" class="book-appointment">Back to Home</a>
        </form>
    </div>
</body>
</html>
