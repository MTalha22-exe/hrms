<?php if (!defined('BASE_URL')) die('Direct access not allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page_title ?></title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/plugins/fontawesome-free/css/all.min.css">
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- AdminLTE Theme style -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/dist/css/adminlte.min.css">

</head>
<body class="<?= $body_class ?>">
<div class="wrapper">

<?php if ($show_navbar ?? false) : ?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?page=dashboard" class="nav-link">Home</a>
    </li>
  </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       

        <!-- User Account Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="<?= BASE_URL ?>/assets/dist/img/user2-160x160.jpg" alt="User Image" class="img-size-32 img-circle">
                <span class="d-none d-md-inline"><?php echo $_SESSION['user_name'] ?? 'Administrator'; ?></span>
            </a>
           
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<?php endif; ?>