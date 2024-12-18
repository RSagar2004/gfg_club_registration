<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geeksforgfg_club";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <h1>Registered Students</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>USN</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Team</th>
                    <th>Interests</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['usn']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['team']; ?></td>
                            <td><?php echo $row['interests']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>\n");
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="10">No registrations found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="logout.php">Logout</a>
    </main>
    <button onclick="window.location.href='index.html'" class="home-button">Home</button>

</body>
</html>
<?php $conn->close(); ?>
