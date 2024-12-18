<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geeksforgfg_club";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $usn = $_POST['usn'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $team = $_POST['team'];
    $interests = $_POST['interests'];

    $sql = "INSERT INTO registrations (student_name, usn, phone, email, department, year, team, interests) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $student_name, $usn, $phone, $email, $department, $year, $team, $interests);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>