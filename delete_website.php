<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "web_spark");

if (!isset($_POST['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing ID']);
    exit;
}

$web_id = intval($_POST['id']);
$result = $conn->query("DELETE FROM websites WHERE web_id = $web_id");

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Website deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Delete failed']);
}
?>
