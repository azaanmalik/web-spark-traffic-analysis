<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "web_spark");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['Id'])) {
    echo "<script>alert('Please login first.');
    window.location.href = 'login.php';</script>";
    exit;
}

// Get user ID from session
$user_id = (int)$_SESSION['Id'];

// Fetch user details
$sql = "SELECT * FROM register WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Close connection
$stmt->close();
$conn->close();

// If no user found
if (!$user) {
    echo "<script>alert('User not found.');
    window.location.href = 'login.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            padding: 40px;
        }
        .profile-form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-form">
        <h3 class="text-center mb-4">Update Your Profile</h3>
        <form method="POST" action="update_profile.php" enctype="multipart/form-data">
            <div class="mb-3 text-center">
                <?php if (!empty($user['ProfilePic'])): ?>
                    <img src="uploads/<?= htmlspecialchars($user['ProfilePic']) ?>" alt="Profile Picture" class="profile-img mb-2">
                <?php else: ?>
                    <img src="uploads/default.png" alt="Profile Picture" class="profile-img mb-2">
                <?php endif; ?>
                <div class="form-text">Current Profile Picture</div>
                <input type="file" name="profile_pic" class="form-control mb-3">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($user['Username']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['Email']) ?>" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
