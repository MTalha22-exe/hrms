<?php
$current_page = $_GET['page'] ?? 'dashboard';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php?page=dashboard" class="brand-link">
    <img src="<?= BASE_URL ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HRMS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= BASE_URL ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['user_name'] ?? 'Administrator'; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="index.php?page=dashboard" class="nav-link <?= ($current_page == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Users Management -->
        <li class="nav-item <?php echo in_array($current_page, ['users', 'add-user', 'edit-user']) ? 'menu-open' : ''; ?>">
          
                          <a href="index.php?page=users" class="nav-link <?php echo ($current_page == 'users') ? 'active' : ''; ?>">

            <i class="nav-icon fas fa-users"></i>
            <p>
              Users Management
            </p>
          </a>
         
        
       
    
        <!-- Separator -->
        <li class="nav-header">SETTINGS</li>

        <!-- Settings -->
        <li class="nav-item <?php echo in_array($current_page, ['general-settings', 'email-settings']) ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?php echo in_array($current_page, ['general-settings', 'email-settings']) ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=general-settings" class="nav-link <?php echo ($current_page == 'general-settings') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=email-settings" class="nav-link <?php echo ($current_page == 'email-settings') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Email</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Separator -->
        <li class="nav-header">ACCOUNT</li>

        <!-- Profile -->
        <li class="nav-item">
          <a href="index.php?page=profile" class="nav-link <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile</p>
          </a>
        </li>


        <!-- Logout -->
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>