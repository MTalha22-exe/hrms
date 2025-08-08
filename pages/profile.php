<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $about = $_POST['about'] ?? '';
    
    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, about = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $about, $user_id);
    
    if ($stmt->execute()) {
        $_SESSION['user_name'] = $name;
        $_SESSION['success_message'] = 'Profile updated successfully!';
    } else {
        $_SESSION['error_message'] = 'Failed to update profile.';
    }
    
    header('Location:profile');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if (password_verify($current_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            if (strlen($new_password) >= 6) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $hashed_password, $user_id);
                
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = 'Password changed successfully!';
                } else {
                    $_SESSION['error_message'] = 'Failed to change password.';
                }
            } else {
                $_SESSION['error_message'] = 'Password must be at least 6 characters long.';
            }
        } else {
            $_SESSION['error_message'] = 'New passwords do not match.';
        }
    } else {
        $_SESSION['error_message'] = 'Current password is incorrect.';
    }
    
    header('Location:profile');
    exit();
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$page_title = 'AdminLTE | Profile';
$body_class = 'hold-transition sidebar-mini';
$show_navbar = true;
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      
      <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
          <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
          <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="<?= BASE_URL ?>/assets/dist/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= htmlspecialchars($user['username']) ?></h3>

              <p class="text-muted text-center"><?= htmlspecialchars($user['role'] ?? 'Administrator') ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?= htmlspecialchars($user['email']) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="float-right"><?= htmlspecialchars($user['phone'] ?? 'Not set') ?></a>
                </li>
                <li class="list-group-item">
                  <b>Joined</b> <a class="float-right"><?= date('M Y', strtotime($user['created_at'] ?? date('Y-m-d'))) ?></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>
              <p class="text-muted">
                <?= htmlspecialchars($user['about'] ?? 'No information available') ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="timeline timeline-inverse">
                    <div class="time-label">
                      <span class="bg-danger">
                        <?= date('d M. Y') ?>
                      </span>
                    </div>
                    <div>
                      <i class="fas fa-user bg-info"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header border-0"><a href="#">Profile</a> updated successfully
                        </h3>
                      </div>
                    </div>
                    <div>
                      <i class="fas fa-sign-in-alt bg-success"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 hours ago</span>
                        <h3 class="timeline-header border-0"><a href="#">Login</a> successful
                        </h3>
                      </div>
                    </div>
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" 
                               value="<?= htmlspecialchars($user['username']) ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" 
                               value="<?= htmlspecialchars($user['email']) ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhone" name="phone" 
                               value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputAbout" class="col-sm-2 col-form-label">About</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputAbout" name="about" rows="4"><?= htmlspecialchars($user['about'] ?? '') ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="password">
                  <form class="form-horizontal" method="POST">
                    <div class="form-group row">
                      <label for="currentPassword" class="col-sm-3 col-form-label">Current Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="newPassword" class="col-sm-3 col-form-label">New Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <button type="submit" name="change_password" class="btn btn-danger">Change Password</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>