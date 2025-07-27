<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Buku</h3>

<form action="/buku/save" method="post">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" required>
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" class="form-control" name="penulis" required>
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" class="form-control" name="tahun" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<?= $this->endSection(); ?>
