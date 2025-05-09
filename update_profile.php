<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "web_spark");

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];

// Handle file upload if a new image is uploaded
$profile_pic = $user_pic = ""; // Default to no new profile picture

if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
    // Handle file upload
    $profile_pic = $_FILES['profile_pic']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_pic);
    
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
        // If upload is successful, use the new picture
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
} else {
    // No new file uploaded, retain current profile picture
    $result = $conn->query("SELECT ProfilePic FROM register WHERE ID = $user_id");
    $row = $result->fetch_assoc();
    $profile_pic = $row['ProfilePic']; // Retain current profile picture
}

// Update user information in the database
$stmt = $conn->prepare("UPDATE register SET Username = ?, Email = ?, ProfilePic = ? WHERE ID = ?");
$stmt->bind_param("sssi", $username, $email, $profile_pic, $user_id);

if ($stmt->execute()) {
    echo "<script>alert('Profile updated successfully!');
    window.location.href = 'profile.php';
    </script>";
} else {
    echo "<script>alert('Failed to update profile.');
    window.location.href = 'profile.php';
    </script>";
}

$stmt->close();
$conn->close();
?>
