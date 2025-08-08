<style>
  .dropdown-toggle::after {
    display: none;
  }

  .btn-dots {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
  }
  .btn-dots i {
    margin-right: 4px;
    color: #999;
  }
</style>

<?php
$page_title = 'AdminLTE | Users Management';
$body_class = 'hold-transition sidebar-mini';
$show_navbar = true;
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
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
      <h3 class="card-title">Users</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = new mysqli("localhost", "root", "", "hrms_db");
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT id, username, email, role FROM users";
          $result = $conn->query($sql);
          if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
          ?>
          <tr>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td>
              <div class="dropdown">
                <button class="btn btn-dots dropdown-toggle" type="button" id="dropdownMenu<?= $row['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bars"></i> <i class="fas fa-caret-down"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu<?= $row['id'] ?>">
                  <a class="dropdown-item edit-user" href="#" data-userid="<?= $row['id'] ?>">Edit</a>
                  <a class="dropdown-item delete-user" href="#" data-userid="<?= $row['id'] ?>">Delete</a>
                </div>
              </div>
            </td>
          </tr>
          <?php
            endwhile;
          else:
          ?>
          <tr><td colspan="4">No users found.</td></tr>
          <?php
          endif;
          $conn->close();
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
</div>



<!-- <script src="/hrms/assets/plugins/jquery/jquery.min.js"></script> -->

<!-- jQuery
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

<!-- Popper.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Delete action
    document.querySelectorAll(".delete-user").forEach(button => {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        const userId = this.getAttribute("data-userid");
        if (confirm("Are you sure you want to delete this user?")) {
          fetch("delete_user.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "user_id=" + encodeURIComponent(userId)
          })
          .then(res => res.text())
          .then(response => {
            alert(response);
            location.reload();
          })
          .catch(err => {
            alert("Failed to delete user.");
            console.error(err);
          });
        }
      });
    });

    // Edit action
    document.querySelectorAll(".edit-user").forEach(button => {
      button.addEventListener("click", function (e) {
        e.preventDefault();
        const userId = this.getAttribute("data-userid");
        alert("Edit user ID: " + userId);
        // You can redirect to edit page: window.location.href = `edit_user.php?id=${userId}`;
      });
    });
  });
</script>

