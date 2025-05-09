<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      background-color: #1c2d61;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .signup-card {
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
  </style>
</head>
<body>

<div class="signup-card">
  <h2 class="text-center mb-4">Create Account</h2>
  <form id="signupForm" method="POST"><!-- added id and removed action -->
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter username" required />
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email" required />
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Enter password" required />
    </div>
    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required />
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-sky w-25 me-2">Sign Up</button>
      <button type="button" class="btn btn-outline-secondary w-75" onclick="window.location.href='login.php'">Already registered?</button>
    </div>
  </form>
</div>

<script>
  document.getElementById("signupForm").addEventListener("submit", function (e) {
    e.preventDefault(); // prevent default form submission

    const formData = new FormData(this);

    fetch("registerdata.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      Swal.fire({
        icon: data.status === "success" ? "success" : "error",
        title: data.message,
        showConfirmButton: true,
        confirmButtonText: "OK",
        allowOutsideClick: false
      }).then(() => {
        if (data.status === "success") {
          window.location.href = "login.php";
        }
      });
    })
    .catch(() => {
      Swal.fire("Error", "Something went wrong.", "error");
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
