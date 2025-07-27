<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<h3>Form Peminjaman Buku</h3>

<form method="post" action="<?= base_url('buku/pinjam/' . $buku['id']) ?>">
  <?= csrf_field() ?>
  
  <div class="mb-3">
    <label>Judul Buku</label>
    <input type="text" class="form-control" value="<?= esc($buku['judul']) ?>" readonly>
  </div>

  <div class="mb-3">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Lama Pinjam (hari)</label>
    <input type="number" name="lama_hari" class="form-control" required>
  </div>

  <button class="btn btn-success">Pinjam</button>
</form>

<?= $this->endSection() ?>
