<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Hardcoded admin credentials (you can store this in a database)
    $correct_username = "admin";
    $correct_password = "admin123";

    if ($admin_username === $correct_username && $admin_password === $correct_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <button onclick="window.location.href='index.html'" class="home-button">Home</button>
        <h1>Admin Login</h1>
        <form action="admin_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    </main>
</body>
</html>
