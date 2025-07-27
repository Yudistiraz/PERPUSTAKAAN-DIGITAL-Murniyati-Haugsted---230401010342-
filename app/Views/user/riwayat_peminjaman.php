<?= $this->extend('user/template') ?>
<?= $this->section('content') ?>

<h3>Riwayat Peminjaman</h3>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Judul Buku</th>
      <th>Jumlah</th>
      <th>Hari</th>
      <th>Biaya/Hari</th>
      <th>Total</th>
      <th>Status</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($riwayat as $r): ?>
    <tr>
      <td><?= esc($r['judul']) ?></td>
      <td><?= $r['jumlah'] ?></td>
      <td><?= $r['lama_hari'] ?> hari</td>
      <td>Rp<?= number_format($r['biaya_per_hari']) ?></td>
      <td>Rp<?= number_format($r['total_biaya']) ?></td>
      <td><span class="badge bg-<?= $r['status'] === 'dipinjam' ? 'warning' : 'success' ?>">
        <?= $r['status'] ?>
      </span></td>
      <td><?= $r['tanggal_pinjam'] ?></td>
      <td><?= $r['tanggal_kembali'] ?? '-' ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $this->endSection() ?>
