<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_spark";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Check if it's real traffic (basic check: not curl or bot)
$is_real = (strpos(strtolower($ua), 'bot') === false && strpos(strtolower($ua), 'curl') === false) ? 1 : 0;

$conn->query("INSERT INTO traffic_logs (website_url, ip_address, user_agent, is_real) 
              VALUES ('$url', '$ip', '$ua', $is_real)");

$conn->close();
?>
