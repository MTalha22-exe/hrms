</div>
  <!-- /.wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>&copy; <?= date('Y') ?> <a href="#">Your Company</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASE_URL ?>/assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<!-- <script src="<?= BASE_URL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- DataTables & Plugins -->
<script src="<?= BASE_URL ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_URL ?>/assets/dist/js/adminlte.min.js"></script>

<?php if (!empty($additional_scripts)) : ?>
  <?php foreach ($additional_scripts as $script) : ?>
    <script src="<?= BASE_URL ?>/<?= $script ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>
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
</body>
</html>