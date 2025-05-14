<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_spark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.');
        window.location.href = 'login.php';
        </script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');
        window.location.href = 'login.php';
        </script>";
        exit;
    }

    // Encode the entered password using base64 encoding
    $encodedPassword = base64_encode($password);

    // Check user existence
    $stmt = $conn->prepare("SELECT Id, Email FROM register WHERE Email = ? AND Password = ?");
    $stmt->bind_param("ss", $email, $encodedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['Id']; // Store user ID in session
        $_SESSION['email'] = $user['Email']; // Optionally store email
        header("Location: maindashboard.php");
        exit;
    } else {
        echo "<script>alert('Invalid email or password.'); 
        window.location.href = 'login.php';
        </script>";
        exit;
    }

    $stmt->close();
}

$conn->close();
?>