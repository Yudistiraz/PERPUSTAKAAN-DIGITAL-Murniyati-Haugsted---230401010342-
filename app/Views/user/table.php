<div class="row">
  <?php if (!empty($buku)): ?>
    <?php foreach ($buku as $item): ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <img 
            src="<?= base_url('uploads/buku/' . $item['gambar']) ?>" 
            class="card-img-top" 
            alt="<?= esc($item['judul']) ?>" 
            style="height: 200px; object-fit: cover;"
          >
          <div class="card-body">
            <h5 class="card-title"><?= esc($item['judul']) ?></h5>
            <p class="card-text text-muted mb-1"><?= esc($item['penulis']) ?> (<?= esc($item['tahun']) ?>)</p>
            <p class="card-text small"><?= substr(strip_tags($item['deskripsi']), 0, 80) . '...' ?></p>
         </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="col-12">
      <div class="alert alert-warning text-center">Tidak ada buku yang ditemukan.</div>
    </div>
  <?php endif; ?>
</div>
