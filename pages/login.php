<?php

require_once 'config.php'; // include database connection

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Query user from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: index.php?page=dashboard');
            exit();
        } else {
            $error_message = 'Invalid password';
        }
    } else {
        $error_message = 'Invalid email';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | HRMS</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/dist/css/custom.css" />
</head>
<body>

<div class="login-container">

  <!-- Left Column -->
  <div class="left-box">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>HRMS</b></a>
      </div>

      <?php if (isset($error_message)): ?>
        <div class="alert alert-danger">
          <?php echo htmlspecialchars($error_message); ?>
        </div>
      <?php endif; ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required />
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required />
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-light btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Right Column -->
  <div class="right-box">
    <div class="logo-container">
      <img src="assets/dist/img/CCP LOGO FINAL.png" alt="Logo" class="logo-img" />
      <h2 class="logo-text">HRMS</h2>
    </div>
  </div>

</div>

<!-- Scripts -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

</body>
</html>