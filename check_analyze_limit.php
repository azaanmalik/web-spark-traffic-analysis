<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}
if (empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Authentication required']);
    exit;
}

$conn = new mysqli(getenv('DB_HOST') ?: 'localhost', getenv('DB_USER') ?: 'root', getenv('DB_PASSWORD') ?: '', getenv('DB_NAME') ?: 'web_spark');
if ($conn->connect_error) {
    http_response_code(503);
    echo json_encode(['status' => 'error', 'message' => 'DB error']);
    exit;
}

$id = (int)$_SESSION['user_id'];
$stmt = $conn->prepare('UPDATE register SET analyze_count = COALESCE(analyze_count, 0) + 1 WHERE Id = ? AND COALESCE(analyze_count, 0) < 3');
$stmt->bind_param('i', $id);
$stmt->execute();
$allowed = $stmt->affected_rows === 1;
$stmt->close();

if ($allowed) {
    echo json_encode(['status' => 'allowed']);
} else {
    $stmt = $conn->prepare('SELECT analyze_count FROM register WHERE Id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->num_rows ? ['status' => 'limit_exceeded'] : ['status' => 'error', 'message' => 'User not found']);
    $stmt->close();
}
$conn->close();
