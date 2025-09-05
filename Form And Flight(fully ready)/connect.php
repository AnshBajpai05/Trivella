<?php
// Capture form data
$name = $_POST['name'];
$age = $_POST['age'];
$days = $_POST['days'];
$people = $_POST['people'];
$nationality = $_POST['nationality'];
$email = $_POST['email'];
$location = $_POST['location'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registration (name, age, days, people, nationality, email, location) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$bind = $stmt->bind_param("siiisss", $name, $age, $days, $people, $nationality, $email, $location);
if ($bind === false) {
    die("Bind failed: " . $stmt->error);
}

// Execute statement
$exec = $stmt->execute();
if ($exec === false) {
    die("Execute failed: " . $stmt->error);
} else {
    echo "Registration successfully...";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
