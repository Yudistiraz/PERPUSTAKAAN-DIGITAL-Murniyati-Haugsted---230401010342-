<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Daftar Buku</h2>

<!-- Form Pencarian -->
<form method="get" class="row mb-3">
  <div class="col-md-10">
    <input type="text" name="q" class="form-control" placeholder="Cari judul/penulis..." value="<?= esc($keyword ?? '') ?>">
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary w-100">
      <i class="bi bi-search"></i> Cari
    </button>
  </div>
</form>

<!-- Tombol Kembali ke Daftar -->
<?php if (!empty($keyword)): ?>
  <a href="<?= base_url('admin/buku') ?>" class="btn btn-secondary mb-3">Kembali ke Daftar</a>
<?php endif ?>

<!-- Tombol Tambah Buku -->
<a href="<?= base_url('admin/buku/create') ?>" class="btn btn-success mb-3">Tambah Buku</a>

<!-- Tabel Buku -->
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun</th>
      <th>Deskripsi</th>
      <th width="140">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($buku as $b): ?>
    <tr>
      <td>
        <?php if (!empty($b['gambar'])): ?>
          <img src="<?= base_url('uploads/buku/' . $b['gambar']) ?>" alt="Cover" width="60">
        <?php else: ?>
          <span class="text-muted">-</span>
        <?php endif ?>
      </td>
      <td><?= esc($b['judul']) ?></td>
      <td><?= esc($b['penulis']) ?></td>
      <td><?= esc($b['tahun']) ?></td>
      <td><?= esc($b['deskripsi']) ?></td>
      <td>
        <a href="<?= base_url('admin/buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
        <a href="<?= base_url('admin/buku/delete/' . $b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center">
  <?= $pager->links('buku', 'bootstrap5') ?>
</div>

<?= $this->endSection() ?>
