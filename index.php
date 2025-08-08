<?php
session_start();

define('ROOT_PATH', __DIR__);
define('BASE_URL', '/hrms');
  
$allowed_pages = [
    'login', 'dashboard', 'users', 'add-user', 'edit-user', 
    'posts', 'add-post', 'categories', 'analytics', 
    'sales-report', 'user-report', 'activity-report',
    'general-settings', 'email-settings', 'backup', 'profile'
];

if (!isset($_GET['page']) && isset($_SESSION['user_logged_in'])) {
    header('Location:dashboard');
    exit();
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (!in_array($page, $allowed_pages)) {
        $page = 'login';
    }
} else {
    $page = isset($_SESSION['user_logged_in']) ? 'dashboard' : 'login';
}


if ($page !== 'login' && !isset($_SESSION['user_logged_in'])) {
    header('Location:login');
    exit();
}

if ($page === 'login') {
    $page_title = 'AdminLTE | Log in';
    $body_class = 'hold-transition login-page';
    include 'pages/login.php';
} else {
    $page_title = 'AdminLTE | ' . ucfirst(str_replace('-', ' ', $page));
    $body_class = 'hold-transition sidebar-mini layout-fixed';
    $show_navbar = true;
    
    include 'layout/header.php';
    include 'layout/sidebar.php';
    
    $page_file = "pages/$page.php";
    if (file_exists($page_file)) {
        include $page_file;
    } else {
        echo '<div class="content-wrapper"><div class="content"><div class="container-fluid"><h1>Page Not Found</h1><p>The requested page could not be found.</p></div></div></div>';
    }
    
    include 'layout/footer.php';
}