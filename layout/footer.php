<!-- Main Footer -->
<footer class="main-footer">
  <strong>&copy; <?= date('Y') ?> <a href="#">Your Company</a>.</strong>
  All rights reserved.
</footer>

<!-- Scripts -->
<script src="<?= BASE_URL ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/assets/dist/js/adminlte.min.js"></script>

<?php if (!empty($additional_scripts)) : ?>
  <?php foreach ($additional_scripts as $script) : ?>
    <script src="<?= BASE_URL ?>/<?= $script ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>