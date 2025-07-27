<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
  <div class="container">
    <!-- Logo / Brand -->
    <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
      📚 Perpustakaan Digital
    </a>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Toggle button (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarUser">
      <ul class="navbar-nav ms-auto align-items-center gap-2">
        <!-- Tombol Katalog Buku -->
        <li class="nav-item">
          <a href="<?= base_url('/buku') ?>" class="btn btn-outline-primary">
            <i class="bi bi-journal-bookmark"></i> Lihat Buku
          </a>
        </li>

        <!-- Login Pengguna -->
        <li class="nav-item">
          <a href="<?= base_url('/login') ?>" class="nav-link">
            <i class="bi bi-person-circle"></i> Login Pengguna
          </a>
        </li>

        <!-- Login Admin -->
        <li class="nav-item">
          <a href="<?= base_url('/admin/login') ?>" class="nav-link">
            <i class="bi bi-person-gear"></i> Admin
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
