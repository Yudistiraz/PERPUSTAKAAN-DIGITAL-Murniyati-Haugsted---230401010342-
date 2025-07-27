<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="container mt-5">
  <div class="row align-items-center">
    <div class="col-md-6" data-aos="fade-right">
      <h1 class="display-5 fw-bold">Selamat Datang di <br> <span class="text-primary">Perpustakaan Buku Digital</span></h1>
      <p class="lead">Temukan berbagai koleksi buku favoritmu di sini.</p>
      <a href="<?= base_url('buku') ?>" class="btn btn-primary btn-lg mt-3">Lihat Semua Buku</a>
    </div>
    <div class="col-md-6 text-center" data-aos="fade-left">
      <img src="<?= base_url('assets/img/perpus_01.jpg') ?>" alt="Ilustrasi" class="img-fluid" style="max-height: 300px;">
    </div>
  </div>
</div>

<!-- Search Form -->
<div class="container my-5">
  <form method="get" class="row mb-3 align-items-center" id="searchForm">
    <div class="col-md-10">
      <input type="text" name="q" id="searchInput" class="form-control" placeholder="Cari judul/penulis..." value="<?= esc($keyword ?? '') ?>">
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary w-100" type="submit">
        <i class="bi bi-search"></i> Cari
      </button>
    </div>
  </form>


  <!-- Search Results -->
  <div id="resultArea">
    <?= view('user/table', ['buku' => $buku ?? []]) ?>
  </div>
</div>
<!-- Buku Populer -->
<div class="container my-5">
  <h3 class="text-center mb-4"><i class="bi bi-star-fill text-warning"></i> Buku Populer</h3>
  <div class="row">
    <?php if (!empty($bukuPopuler)): ?>
      <?php foreach ($bukuPopuler as $pop): ?>
        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('uploads/buku/' . $pop['gambar']) ?>" 
                 class="card-img-top" 
                 alt="<?= esc($pop['judul']) ?>" 
                 style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= esc($pop['judul']) ?></h5>
              <p class="card-text text-muted"><?= esc($pop['penulis']) ?> (<?= esc($pop['tahun']) ?>)</p>
              <p class="card-text small"><?= substr(strip_tags($pop['deskripsi']), 0, 80) . '...' ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <div class="alert alert-warning text-center">Belum ada buku populer.</div>
      </div>
    <?php endif; ?>
  </div>
</div>



<!-- AJAX Search Script -->
<script>
  const input = document.getElementById('searchInput');
  input.addEventListener('input', function () {
    const q = input.value;
    fetch("<?= base_url('user/search') ?>?q=" + encodeURIComponent(q))
      .then(res => res.text())
      .then(html => {
        document.getElementById('resultArea').innerHTML = html;
      });
  });
</script>

<?= $this->endSection() ?>
