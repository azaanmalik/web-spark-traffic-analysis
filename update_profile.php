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

// Fetch current user data
$stmt = $conn->prepare("SELECT Username, Email, ProfilePic FROM register WHERE Id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $user = $result->fetch_assoc()) {
    $username = $user['Username'];
    $email = $user['Email'];
    $profile_pic = $user['ProfilePic'];
} else {
    echo "Error fetching user data.";
    exit();
}

// Construct profile picture path
$profile_pic_path = $profile_pic ? 'uploads/' . htmlspecialchars($profile_pic) : 'default-profile.png';

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
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
    .text-center img {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<?php include('header.php'); ?>

<div class="container mt-5">
  <h1 class="text-center">Edit Profile</h1>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3 text-center">
      <label for="profile_pic" class="form-label">Current Profile Picture</label><br>
      <!-- Display current profile picture -->
      <img src="<?php echo $profile_pic_path; ?>" 
           class="profile-img" alt="Profile Picture">
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
    </div>
    <div class="mb-3">
      <label for="profile_pic" class="form-label">Upload New Profile Picture</label>
      <input type="file" name="profile_pic" class="form-control" id="profile_pic">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>