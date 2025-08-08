<?php
$current_page = $_GET['page'] ?? 'dashboard';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dashboard" class="brand-link">
    <img src="<?= BASE_URL ?>/assets/dist/img/CCP LOGO FINAL.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HRMS</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard" class="nav-link <?= ($current_page == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item <?php echo in_array($current_page, ['users', 'add-user', 'edit-user']) ? 'menu-open' : ''; ?>">
          
                          <a href="users" class="nav-link <?php echo ($current_page == 'users') ? 'active' : ''; ?>">

            <i class="nav-icon fas fa-users"></i>
            <p>
              Users Management
            </p>
          </a>
        <li class="nav-header">ACCOUNT</li>
        <li class="nav-item">
          <a href="profile" class="nav-link <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>