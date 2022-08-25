<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <h1 class="app-page-title">Tampilkan Data</h1>
    <div class="app-card app-card-chart h-100 shadow-sm mb-4">
        <div class="app-card-body p-3 p-lg-4">
            <form action="/dashboard-admin-filter" method="POST">
            <div class="row g-4 mb-4">
                <div class="col-lg-3">
                    <label for="cabang" class="form-label">Outlet</label>
                    <select class="form-select" id="cabang" name="cabang">
                        <?php foreach($data_cabang as $data) : ?>
                            <option value="<?= $data['id_cabang'] ?>" <?= $data['id_cabang'] == $id_cabang ? 'selected' : null ?>><?= $data['nama_cabang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!--//col-->
                <div class="col-lg-3">
                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="<?= $tgl_awal ?>" placeholder="Tanggal Awal">
                </div>
        
                <!--//col-->
                <div class="col-lg-3 ">
                    <label for="tanggal_akhir" class="form-label text">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?= $tgl_akhir ?>" placeholder="Tanggal Akhir">
                </div>
        
                <!--//col-->
                <div class="col-lg-3">
                    <p class="text-white mb-2">.</p>
                    <button type="submit" class="btn btn-primary text-white">Cek</button>
                </div>
            </div>
            </form>
            <!--//row-->

            <!--//row-->
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="card mb-2 bg-warning">
                        <div class="card-body text-white fw-bold">
                            Omset : <?= 'Rp '.number_format($omset[0]['omset'], 0,',','.') ?>
                        </div>
                    </div>
                    <div class="card bg-warning">
                        <div class="card-body text-white fw-bold">
                            Rata-rata Penjualan : <?= 'Rp '.number_format($omset[0]['rata'], 0,',','.') ?>
                        </div>
                    </div>
                </div>
                <!--//col-->
                <div class="col-lg-6">
                    <div class="card bg-info">
                        <div class="card-body mb-3 text-white fw-bold">
                            Produk paling laku :
                            <?php $i = 1; ?>
                            <?php if(count($grade) != 0) : ?>
                                <?php foreach($grade as $data) : ?>
                                    <p class="mb-0 text-capitalize"><?= $i++; ?>. <?= $data['nama_layanan'] ?></p>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="mb-0 text-capitalize">Belum ada transaksi</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--//app-card-->
                </div>
            </div>
            <!--//row-->
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Penjualan Tahun <?= date('Y') ?></h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="chart-container">
                    <canvas id="myChart" height="100"></canvas>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>
</div>
<!--//container-fluid-->

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    const backgroundColors = 'rgba(75, 192, 192, 0.2)';
    const borderColors = 'rgba(75, 192, 192, 1)';
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: 'Omset',
                data: [
                    <?= $grafik[0]['januari'] == null ? 0 : $grafik[0]['januari'] ?>,
                    <?= $grafik[0]['februari'] == null ? 0 : $grafik[0]['februari'] ?>,
                    <?= $grafik[0]['maret'] == null ? 0 : $grafik[0]['maret'] ?>,
                    <?= $grafik[0]['april'] == null ? 0 : $grafik[0]['april'] ?>,
                    <?= $grafik[0]['mei'] == null ? 0 : $grafik[0]['mei'] ?>,
                    <?= $grafik[0]['juni'] == null ? 0 : $grafik[0]['juni'] ?>,
                    <?= $grafik[0]['juli'] == null ? 0 : $grafik[0]['juli'] ?>,
                    <?= $grafik[0]['agustus'] == null ? 0 : $grafik[0]['agustus'] ?>,
                    <?= $grafik[0]['september'] == null ? 0 : $grafik[0]['september'] ?>,
                    <?= $grafik[0]['oktober'] == null ? 0 : $grafik[0]['oktober'] ?>,
                    <?= $grafik[0]['november'] == null ? 0 : $grafik[0]['november'] ?>,
                    <?= $grafik[0]['desember'] == null ? 0 : $grafik[0]['desember'] ?>
                ],
                backgroundColor: [
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                    backgroundColors,
                ],
                borderColor: [
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                    borderColors,
                ],
                borderWidth: 1,
                fill: false,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        }
    });
</script>
<?= $this->endSection() ?>