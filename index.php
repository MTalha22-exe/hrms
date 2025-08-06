<?php
session_start();

// Global constants
define('ROOT_PATH', __DIR__);
define('BASE_URL', '/adminLTE');

// Allowed pages
$allowed_pages = [
    'login', 'dashboard', 'users', 'add-user', 'edit-user', 
    'posts', 'add-post', 'categories', 'analytics', 
    'sales-report', 'user-report', 'activity-report',
    'general-settings', 'email-settings', 'backup', 'profile'
];

// Get requested page or default to login
$page = $_GET['page'] ?? 'login';
if (!in_array($page, $allowed_pages)) {
    $page = 'login';
}

// Redirect to login if not authenticated (except login page)
if ($page !== 'login' && !isset($_SESSION['user_logged_in'])) {
    header('Location: login');
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
    $page_title = 'AdminLTE | ' . ucfirst($page);
    $body_class = 'hold-transition sidebar-mini';
    $show_navbar = true;
    
    // Include layout components
    include 'layout/header.php';
    include 'layout/sidebar.php';
    include "pages/$page.php";
    include 'layout/footer.php';
}