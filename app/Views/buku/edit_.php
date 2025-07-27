<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h3>Edit Buku</h3>

<form action="/buku/update/<?= $buku['id'] ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" value="<?= esc($buku['judul']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" class="form-control" name="penulis" value="<?= esc($buku['penulis']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tahun</label>
        <input type="number" class="form-control" name="tahun" value="<?= esc($buku['tahun']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>
