<?php
// Set page-specific variables
$page_title = 'AdminLTE | Users Management';
$body_class = 'hold-transition sidebar-mini';
$show_navbar = true;
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users DataTable with default features</h3>
                            <div class="card-tools">
                                <a href="index.php?page=add-user" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add New User
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample data - replace with your actual PHP data -->
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>john@example.com</td>
                                        <td><span class="badge badge-primary">Admin</span></td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>2025-01-15</td>
                                        <td>
                                            <a href="index.php?page=edit-user&id=1" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="deleteUser(1)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jane Smith</td>
                                        <td>jane@example.com</td>
                                        <td><span class="badge badge-secondary">User</span></td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>2025-01-14</td>
                                        <td>
                                            <a href="index.php?page=edit-user&id=2" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="deleteUser(2)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mike Johnson</td>
                                        <td>mike@example.com</td>
                                        <td><span class="badge badge-warning">Manager</span></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>2025-01-13</td>
                                        <td>
                                            <a href="index.php?page=edit-user&id=3" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="deleteUser(3)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Add more sample data as needed -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Page specific script -->
<script>
$(function () {
    $("#usersTable").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#usersTable_wrapper .col-md-6:eq(0)');
});

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        // Add your delete functionality here
        // Example: window.location.href = 'delete-user.php?id=' + userId;
        alert('Delete user with ID: ' + userId);
    }
}
</script>