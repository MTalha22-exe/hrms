<?php
$current_page = $_GET['page'] ?? 'dashboard';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo (only appears in sidebar) -->
  <a href="index.php?page=dashboard" class="brand-link">
    <img src="<?= BASE_URL ?>/assets/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">AdminLTE</span>
  </a>

  <!-- Sidebar Menu -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="index.php?page=dashboard" class="nav-link <?= ($current_page == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
                    </a>
                </li>

                <!-- Users Management -->
                <li class="nav-item <?php echo in_array($current_page, ['users', 'add-user', 'edit-user']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo in_array($current_page, ['users', 'add-user', 'edit-user']) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users Management
                            
                        </p>
                    </a>
                    
                    
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
