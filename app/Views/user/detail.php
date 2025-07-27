<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="row">
    <div class="col-md-4">
      <img src="<?= base_url('uploads/buku/' . $buku['gambar']) ?>" alt="Gambar Buku" class="img-fluid rounded shadow">
    </div>
    <div class="col-md-8">
      <h2><?= esc($buku['judul']) ?></h2>
      <p><strong>Penulis:</strong> <?= esc($buku['penulis']) ?></p>
      <p><strong>Tahun:</strong> <?= esc($buku['tahun']) ?></p>
      <p><?= esc($buku['deskripsi']) ?></p>
      <a href="<?= base_url('katalog') ?>" class="btn btn-secondary mt-3">Kembali</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>