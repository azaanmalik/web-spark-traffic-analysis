<?php
header('Content-Type: application/json');

// ... DB connection & logic

if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(['status' => 'error', 'message' => 'Password must be at least 6 characters.']);
        exit;
    }

    // Database check and insert
    $conn = new mysqli("localhost", "root", "", "web_spark");
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM register WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already registered.']);
        exit;
    }

    $encoded = base64_encode($password);
    $insert = $conn->prepare("INSERT INTO register (Username, Email, Password, ConfirmPassword) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssss", $username, $email, $encoded, $encoded);
    if ($insert->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Successfully registered!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error saving data.']);
    }

    $stmt->close();
    $insert->close();
    $conn->close();
}
?>
