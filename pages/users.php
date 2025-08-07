
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

  <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>Trident</td>
            <td>Internet
              Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td> 4</td>
            <td>X</td>
          </tr>
          <tr>
            <td>Misc</td>
            <td>Dillo 0.8</td>
            <td>Embedded devices</td>
            <td>-</td>
            <td>X</td>
          </tr>
          <tr>
            <td>Misc</td>
            <td>Links</td>
            <td>Text only</td>
            <td>-</td>
            <td>X</td>
          </tr>
          <tr>
            <td>Misc</td>
            <td>Lynx</td>
            <td>Text only</td>
            <td>-</td>
            <td>X</td>
          </tr>
          <tr>
            <td>Misc</td>
            <td>IE Mobile</td>
            <td>Windows Mobile 6</td>
            <td>-</td>
            <td>C</td>
          </tr>
          <tr>
            <td>Misc</td>
            <td>PSP browser</td>
            <td>PSP</td>
            <td>-</td>
            <td>C</td>
          </tr>
          <tr>
            <td>Other browsers</td>
            <td>All others</td>
            <td>-</td>
            <td>-</td>
            <td>U</td>
          </tr>
          </tbody>
          <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
      alert('Delete user with ID: ' + userId);
    }
  }
</script>

<script src="/hrms/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/hrms/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables & Plugins -->
<script src="/hrms/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/hrms/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/hrms/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/hrms/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/hrms/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/hrms/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/hrms/assets/plugins/jszip/jszip.min.js"></script>
<script src="/hrms/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/hrms/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/hrms/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/hrms/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/hrms/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/hrms/assets/dist/js/adminlte.min.js"></script>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Buttons for Export -->
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>