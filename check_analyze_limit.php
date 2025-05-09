<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_spark";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "DB error"]);
    exit;
}

$email = $_POST['email'];

$stmt = $conn->prepare("SELECT analyze_count FROM register WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo json_encode(["status" => "error", "message" => "User not found"]);
    exit;
}

$count = (int)$row['analyze_count'];

if ($count >= 3) {
    echo json_encode(["status" => "limit_exceeded"]);
} else {
   
    $stmt = $conn->prepare("UPDATE register SET analyze_count = analyze_count + 1 WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    echo json_encode(["status" => "allowed"]);
}
