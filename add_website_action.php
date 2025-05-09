<?php
session_start(); // Required to access $_SESSION

header('Content-Type: application/json');

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_spark";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Ensure session contains the email
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

// Get user ID using the email from session
$email = $_SESSION['email'];
$result = $conn->query("SELECT Id FROM register WHERE Email = '$email'");
if ($result->num_rows == 0) {
    echo json_encode(['status' => 'error', 'message' => 'User not found']);
    exit;
}
$row = $result->fetch_assoc();
$user_id = $row['Id'];

// Validate and escape input
if (empty($_POST['url']) || empty($_POST['name'])) {
    echo json_encode(['status' => 'error', 'message' => 'Name and URL are required']);
    exit;
}

$name = $conn->real_escape_string($_POST['name']);
$url = $conn->real_escape_string($_POST['url']);
$desc = $conn->real_escape_string($_POST['description'] ?? '');

// Check if website already exists
$check = $conn->query("SELECT * FROM websites WHERE Id = '$user_id' AND url = '$url'");
if ($check->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'This website URL already exists for your account']);
    exit;
}

// Insert into websites table
$insert = $conn->query("INSERT INTO websites (Id, name, url, description) VALUES ('$user_id', '$name', '$url', '$desc')");
if ($insert) {
    echo json_encode(['status' => 'success', 'message' => 'Website added successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add website']);
}
?>
