<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "web_spark");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $conn->prepare("SELECT Username, Email, ProfilePic FROM register WHERE Id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $username = $row['Username'];
    $email = $row['Email'];
    $profile_pic = $row['ProfilePic'];
} else {
    echo "Error fetching user data.";
    exit();
}

// Debugging: Construct and display the profile picture path
$profile_pic_path = $profile_pic ? 'uploads/' . htmlspecialchars($profile_pic) : 'default-profile.png';
if (!file_exists($profile_pic_path)) {
    echo "Profile picture file not found: " . $profile_pic_path;
    $profile_pic_path = 'default-profile.png'; // Fallback to default
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto; /* Center the image horizontally */
      display: block; /* Ensure the image behaves like a block-level element */
    }
    .card {
      text-align: center; /* Center align the text inside the card */
    }
  </style>
</head>
<body>
<?php include('header.php'); ?>

<div class="container mt-5">
  <h1 class="text-center">My Profile</h1>
  <div class="card mx-auto mt-4" style="width: 18rem;">
    <div class="card-body">
      <!-- Display profile picture -->
      <img src="<?php echo $profile_pic_path; ?>" 
           class="profile-img mb-3" alt="Profile Picture">
      <h5 class="card-title"><?php echo htmlspecialchars($username); ?></h5>
      <p class="card-text"><?php echo htmlspecialchars($email); ?></p>
      <a href="update_profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>