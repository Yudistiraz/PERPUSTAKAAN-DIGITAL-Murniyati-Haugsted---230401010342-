<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Dashboard</h2>

<!-- Kartu Statistik -->
<div class="row g-4 mb-4">
  <!-- Total Buku -->
  <div class="col-md-6">
    <div class="card text-white bg-warning shadow-sm">
      <div class="card-body text-center">
        <h6 class="mb-1">Total Buku</h6>
        <h3 class="fw-bold"><?= esc($totalBuku) ?></h3>
      </div>
    </div>
  </div>

  <!-- Total Penulis -->
  <div class="col-md-6">
    <div class="card text-white bg-success shadow-sm">
      <div class="card-body text-center">
        <h6 class="mb-1">Total Penulis</h6>
        <h3 class="fw-bold"><?= esc($totalPenulis) ?></h3>
      </div>
    </div>
  </div>
</div>

<!-- Grafik -->
<div class="card shadow-sm">
  <div class="card-body">
    <h5 class="card-title">Grafik Jumlah Buku per Tahun</h5>
    <canvas id="bukuChart" height="100"></canvas>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('bukuChart').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($bukuPerTahun, 'tahun')) ?>,
      datasets: [{
        label: 'Jumlah Buku',
        data: <?= json_encode(array_column($bukuPerTahun, 'jumlah')) ?>,
        backgroundColor: 'rgba(54, 162, 235, 0.7)',
        borderRadius: 5
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0
          }
        }
      }
    }
  });
</script>

<?= $this->endSection() ?>
