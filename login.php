<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styling -->
  <style>
    body {
      background-color: #1c2d61; /* dark blue */
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-card {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .btn-sky {
      background-color: #10c2dd;
      border: none;
      color: white;
    }

    .btn-sky:hover {
      background-color: #0ea9c2;
    }

    .sky-link {
      color: #10c2dd;
      text-decoration: none;
    }

    .sky-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2 class="text-center mb-4">Login</h2>

    <!-- PHP error block -->
    <?php 
    if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="POST" action="loginpage.php">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <button type="submit" class="btn btn-sky w-100">Login</button>
      <div class="text-center mt-3">
        <a href="register.php" class="sky-link">Don't have an account? Sign up</a>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
