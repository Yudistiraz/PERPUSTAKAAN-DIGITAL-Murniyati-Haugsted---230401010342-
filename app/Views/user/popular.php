<div class="container mt-5">
  <h2 class="text-center mb-4">📚 Buku Populer</h2>

  <?php if (!empty($bukuPopuler)): ?>
    <div class="row">
      <?php foreach ($bukuPopuler as $pop): ?>
        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('uploads/buku/' . $pop['gambar']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= esc($pop['judul']) ?></h5>
              <p class="card-text
