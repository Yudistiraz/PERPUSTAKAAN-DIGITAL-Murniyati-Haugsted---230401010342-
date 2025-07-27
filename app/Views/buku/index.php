<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h3 class="mb-3">Daftar Buku</h3>

<!-- kolom search pencarian -->
<form action="" method="get" class="mb-3">
    <input type="text" name="keyword" placeholder="Cari judul atau penulis..." class="form-control" value="<?= esc($keyword) ?>">
</form>

<!-- Tombol Tambah Buku -->
<a href="<?= base_url('admin/buku/create') ?>" class="btn btn-primary mb-3">Tambah Buku</a>

<!-- Flash message jika ada -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<!-- Tabel Buku -->
<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($buku)): ?>
            <?php foreach ($buku as $b): ?>
                <tr>
                    <td><?= esc($b['judul']) ?></td>
                    <td><?= esc($b['penulis']) ?></td>
                    <td><?= esc($b['tahun']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('admin/buku/delete/' . $b['id']) ?>" onclick="return confirm('Yakin hapus?');" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center text-muted">Tidak ada data buku.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination -->
<?= $pager->links('buku', 'default_full') ?>

<?= $this->endSection(); ?>
