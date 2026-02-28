<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2 class="text-2xl font-bold mb-6">Dashboard</h2>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-green-500 text-white p-5 rounded-xl shadow">
        <h5>Total Produk</h5>
        <h3 class="text-3xl font-bold"><?= $totalProduk ?></h3>
    </div>

    <div class="bg-yellow-400 text-white p-5 rounded-xl shadow">
        <h5>Produk Kadaluarsa</h5>
        <h3 class="text-3xl font-bold"><?= $produkKadaluarsa ?></h3>
    </div>

    <div class="bg-red-500 text-white p-5 rounded-xl shadow">
        <h5>Stok Rendah</h5>
        <h3 class="text-3xl font-bold"><?= $stokRendah ?></h3>
    </div>

    <div class="bg-blue-500 text-white p-5 rounded-xl shadow">
        <h5>Penjualan Hari Ini</h5>
        <h3 class="text-3xl font-bold">Rp <?= $penjualanHariIni ?></h3>
    </div>

</div>

<div class="bg-white mt-8 p-6 rounded-xl shadow">
    <canvas id="chartPenjualan"></canvas>
</div>

<script>
const ctx = document.getElementById('chartPenjualan');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Penjualan',
            data: <?= json_encode($data) ?>,
            borderColor: 'green',
            tension: 0.3
        }]
    }
});
</script>

<?= $this->endSection() ?>