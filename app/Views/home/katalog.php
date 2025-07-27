<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Katalog Buku</h3>

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


<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif ?>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Tahun</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($buku as $b): ?>
      <tr>
        <td>
          <?php if (!empty($b['gambar'])): ?>
            <img src="<?= base_url('uploads/buku/' . $b['gambar']) ?>" width="60" alt="cover">
          <?php else: ?>
            <span class="text-muted">-</span>
          <?php endif ?>
        </td>
        <td><?= esc($b['judul']) ?></td>
        <td><?= esc($b['penulis']) ?></td>
        <td><?= esc($b['tahun']) ?></td>
        <td>
          <?php if ($b['status'] === 'dipinjam'): ?>
            <span class="badge bg-warning text-dark">Dipinjam</span>
          <?php else: ?>
            <span class="badge bg-success">Tersedia</span>
          <?php endif ?>
        </td>
        <td>
           <?php if (($b['status'] ?? '') === 'dipinjam'): ?>
               <a href="<?= base_url('buku/kembalikan/' . $b['pinjam_id']) ?>" class="btn btn-sm btn-warning">Kembalikan</a>
           <?php else: ?>
               <a href="<?= base_url('buku/pinjam/' . $b['id']) ?>" class="btn btn-sm btn-success">Pinjam</a>
           <?php endif ?>

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

