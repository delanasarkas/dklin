<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <h1 class="app-page-title">Laporan Harian</h1>

    

    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Customer</h4>
                    <div class="stats-figure"><?= $data_customer ?> org</div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Berat Kg</h4>
                    <div class="stats-figure"><?= $total_kg[0]['berat'] == null ? '0' : $total_kg[0]['berat'].' Kg' ?></div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Orderan Kg</h4>
                    <div class="stats-figure"><?= number_format($total_order_kg[0]['total_kg'], 0,',','.') ?></div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Orderan Satuan</h4>
                    <div class="stats-figure"><?= number_format($total_order_satuan[0]['total_kg'], 0,',','.') ?></div>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>
    <!--//row-->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Orderan Agustus</h4>
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
    <!--//row-->
    

</div>
<!--//container-fluid-->

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    const backgroundColors = 'rgba(75, 192, 192, 0.2)';
    const borderColors = 'rgba(75, 192, 192, 1)';
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach($grafik as $data) : ?>
                    <?= date('d', strtotime($data['tgl'])).',' ?>
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'Total Order',
                data: [
                    <?php foreach($grafik as $data) : ?>
                        <?= $data['total']. ', ' ?>
                    <?php endforeach; ?>
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