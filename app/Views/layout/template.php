<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan Digital</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<!-- Navbar atau Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="<?= base_url('/') ?>">📚 Perpustakaan</a>
  <div class="ms-auto text-white">
    <?php if (session()->get('logged_in')): ?>
      <span class="me-3">
        Login sebagai: <strong><?= esc(session()->get('username')) ?></strong>
        (<?= esc(session()->get('role')) ?>)
      </span>
      <a href="<?= base_url('logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
    <?php endif ?>
  </div>
</nav>

<body>

<div class="d-flex" style="min-height: 100vh;">
  <!-- Sidebar -->
  <div class="bg-primary text-white p-3" style="width: 220px;">
    <h5 class="mb-4">📚 Perpustakaan</h5>
    <ul class="nav flex-column gap-2">

      <!-- Dashboard Link -->
      <li>
        <a href="<?= base_url('admin/dashboard') ?>" 
           class="nav-link text-white <?= strpos(uri_string(), 'admin/dashboard') === 0 ? 'fw-bold text-light' : '' ?>">
          <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
      </li>

      <!-- Buku Link -->
      <li>
        <a href="<?= base_url('admin/buku') ?>" 
           class="nav-link text-white <?= strpos(uri_string(), 'admin/buku') === 0 ? 'fw-bold text-light' : '' ?>">
          <i class="bi bi-book me-1"></i> Buku
        </a>
      </li>

      <!-- Logout -->
      <li>
        <a href="<?= base_url('admin/logout') ?>" class="nav-link text-white">
          <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
      </li>

    </ul>
  </div>

  <!-- Konten -->
  <div class="flex-grow-1">
    <!-- Topbar -->
    <div class="bg-primary text-white d-flex justify-content-between align-items-center px-4 py-2 shadow-sm">
      <h6 class="m-0">Perpustakaan Digital</h6>
      <div>Login sebagai <strong><?= session()->get('username') ?></strong></div>
    </div>

    <!-- Isi Konten -->
    <div class="p-4">
      <?= $this->renderSection('content') ?>
    </div>
  </div>
</div>

<!-- SweetAlert (optional for feedback) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->getFlashdata('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?= session()->getFlashdata('success') ?>',
    showConfirmButton: false,
    timer: 2000
  });
</script>
<?php endif ?>

</body>
</html>
