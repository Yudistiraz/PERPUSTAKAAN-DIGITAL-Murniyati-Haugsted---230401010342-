<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2><?= isset($buku) ? 'Edit Buku' : 'Tambah Buku' ?></h2>

<form method="post"
      action="<?= isset($buku) ? base_url('admin/buku/update/' . $buku['id']) : base_url('admin/buku/save') ?>"
      enctype="multipart/form-data"
      id="formBuku"
      class="needs-validation"
      novalidate>

  <?= csrf_field() ?>

  <div class="mb-3">
    <label for="judul" class="form-label">Judul Buku</label>
    <input type="text" name="judul" id="judul" class="form-control" required
           value="<?= old('judul', $buku['judul'] ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="penulis" class="form-label">Penulis</label>
    <input type="text" name="penulis" id="penulis" class="form-control" required
           value="<?= old('penulis', $buku['penulis'] ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="tahun" class="form-label">Tahun Terbit</label>
    <input type="number" name="tahun" id="tahun" class="form-control" required
           value="<?= old('tahun', $buku['tahun'] ?? '') ?>">
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"><?= old('deskripsi', $buku['deskripsi'] ?? '') ?></textarea>
  </div>

  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar Sampul</label>
    <input type="file" name="gambar" id="gambar" class="form-control"
           <?= isset($buku) ? '' : 'required' ?> accept="image/*"
           onchange="previewGambar(event)">
    <div class="mt-2">
      <?php if (isset($buku) && $buku['gambar']): ?>
        <img id="preview" src="<?= base_url('uploads/buku/' . $buku['gambar']) ?>" alt="Gambar Buku" height="100">
        <input type="hidden" name="gambar_lama" value="<?= $buku['gambar'] ?>">
      <?php else: ?>
        <img id="preview" src="#" alt="Preview Gambar" style="display:none;" height="100">
      <?php endif ?>
    </div>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('admin/buku') ?>" class="btn btn-secondary">Kembali</a>

</form>

<!-- SweetAlert2 & Gambar Preview -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function previewGambar(event) {
  const [file] = event.target.files;
  if (file) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  }
}

document.getElementById('formBuku').addEventListener('submit', function(e) {
  const form = this;
  if (!form.checkValidity()) {
    e.preventDefault();
    e.stopPropagation();
    Swal.fire({
      icon: 'error',
      title: 'Form Belum Lengkap',
      text: 'Silakan isi semua kolom yang wajib diisi!',
    });
  }
  form.classList.add('was-validated');
});
</script>

<?= $this->endSection() ?>
