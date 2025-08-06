<?php include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php'; ?>

<div class="content-wrapper p-3">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="card-title">User Management</h3>
      <a href="index.php?page=add-user" class="btn btn-success btn-sm float-right">Add User</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // DB Connection
          $conn = new mysqli("localhost", "root", "", "your_database");
          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);
          $i = 1;

          while ($row = $result->fetch_assoc()):
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= htmlspecialchars($row['username']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['role']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
              <td>
                <a href="index.php?page=edit-user&id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                <a href="actions/delete-user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete user?')">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'layout/footer.php'; ?>
