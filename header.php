<?php
// Check if a session is already active, and start a session only if none exists
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch the logged-in user's profile picture
$conn = new mysqli("localhost", "root", "", "web_spark");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$profile_pic = null;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT ProfilePic FROM register WHERE Id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $row = $result->fetch_assoc()) {
        $profile_pic = $row['ProfilePic'] ? 'uploads/' . $row['ProfilePic'] : 'default-profile.png';
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Web Spark - Get free high-quality geo-targeted website traffic through our traffic exchange system. Join over 1M members.">

  <title>Web Spark</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-image-circle {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
</head>
<body>
<!-- NAVBAR -->
<div class="navbar navbar-expand-lg navbar-dark" style="background-color: #10c2dd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="maindashboard.php">
      <img src="./images/logo.jpg" alt="Web Spark Logo" style="height: 50px;"/>
    </a>
    <ul class="navbar-nav ms-auto" style="list-style: none; margin: 0;">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size: 24px;">
          <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="User Icon" class="profile-image-circle" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>