<?php
session_start();

// Global constants
define('ROOT_PATH', __DIR__);
define('BASE_URL', '/hrms');

// Allowed pages    
$allowed_pages = [
    'login', 'dashboard', 'users', 'add-user', 'edit-user', 
    'posts', 'add-post', 'categories', 'analytics', 
    'sales-report', 'user-report', 'activity-report',
    'general-settings', 'email-settings', 'backup', 'profile'
];

// Get requested page or default to login
// If no page is specified and user is logged in, redirect to dashboard
if (!isset($_GET['page']) && isset($_SESSION['user_logged_in'])) {
    header('Location:dashboard');
    exit();
}

// Get requested page or default to login
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (!in_array($page, $allowed_pages)) {
        $page = 'login';
    }
} else {
    // If already logged in, go to dashboard, otherwise to login
    $page = isset($_SESSION['user_logged_in']) ? 'dashboard' : 'login';
}


// Redirect to login if not authenticated (except login page)
if ($page !== 'login' && !isset($_SESSION['user_logged_in'])) {
    header('Location:login');
    exit();
}

// === PAGE ROUTING ===
if ($page === 'login') {
    // Login page has a special layout
    $page_title = 'AdminLTE | Log in';
    $body_class = 'hold-transition login-page';
    include 'pages/login.php';
} else {
    // All other pages use the main layout
    $page_title = 'AdminLTE | ' . ucfirst(str_replace('-', ' ', $page));
    $body_class = 'hold-transition sidebar-mini layout-fixed';
    $show_navbar = true;
    
    // Include layout components
    include 'layout/header.php';
    include 'layout/sidebar.php';
    
    // Include the specific page content
    $page_file = "pages/$page.php";
    if (file_exists($page_file)) {
        include $page_file;
    } else {
        // 404 page or default content
        echo '<div class="content-wrapper"><div class="content"><div class="container-fluid"><h1>Page Not Found</h1><p>The requested page could not be found.</p></div></div></div>';
    }
    
    include 'layout/footer.php';
}