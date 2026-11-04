<?php
// Traffic tracker: preserve existing schema and heuristic while preventing SQL injection.
$servername = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'web_spark';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    error_log('Web Spark tracker: database connection failed');
    http_response_code(503);
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'] ?? '';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$url = ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');
$is_real = (stripos($ua, 'bot') === false && stripos($ua, 'curl') === false) ? 1 : 0;

$stmt = $conn->prepare('INSERT INTO traffic_logs (website_url, ip_address, user_agent, is_real) VALUES (?, ?, ?, ?)');
if ($stmt) {
    $stmt->bind_param('sssi', $url, $ip, $ua, $is_real);
    $stmt->execute();
    $stmt->close();
} else {
    error_log('Web Spark tracker: insert preparation failed');
}
$conn->close();
?>