<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan Digital - Pengguna</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Animate.css -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

  <!-- Custom CSS (jika ada) -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
 
  <!-- Navbar atas -->
<nav class="navbar navbar-dark bg-dark p-2 justify-content-between">
  <div class="text-white fw-bold ms-3">
    Perpustakaan Digital
  </div>
  <div class="text-white me-3">
    Login sebagai: <strong><?= session()->get('username') ?></strong> (<?= session()->get('role') ?>)
    <a href="<?= base_url('logout') ?>" class="btn btn-outline-light btn-sm ms-2">Logout</a>
  </div>
</nav>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
        <i class="bi bi-journal-bookmark-fill text-primary me-1"></i> Perpustakaan
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('buku') ?>">Katalog Buku</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/login') ?>">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>"><i class="bi bi-person-lock"></i> Login</a>
        </li>

        </ul>
      </div>
    </div>
  </nav>

  
  <!-- Konten Halaman -->
  <main>
    <?= $this->renderSection('content') ?>
  </main>
  

  <!-- Footer -->
  <footer class="bg-dark text-white py-3 mt-5">
    <div class="container text-center">
      &copy; <?= date('Y') ?> Perpustakaan Digital. All rights reserved.
    </div>
  </footer>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init(); // Inisialisasi AOS
  </script>
</body>
</html>
