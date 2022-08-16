<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <h1 class="app-page-title">Tampilkan Data</h1>
    <div class="app-card app-card-chart h-100 shadow-sm mb-4">
        <div class="app-card-body p-3 p-lg-4">
            <div class="row g-4 mb-4">
                <div class="col-lg-3">
                    <label for="outlet" class="form-label">Outlet</label>
                    <select class="form-select" id="outlet" name="outlet">
                        <option value="" selected>Pilih Cabang</option>
                        <option value="bsd">BSD</option>
                        <option value="bukit_dago">Bukit Dago</option>
                        <option value="serpong_park">Serpong park</option>
                        <option value="sentraland">Sentraland</option>
                    </select>
                </div>
                <!--//col-->
                <div class="col-lg-3">
                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" placeholder="Tanggal Awal">
                </div>
        
                <!--//col-->
                <div class="col-lg-3 ">
                    <label for="tanggal_akhir" class="form-label text">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">
                </div>
        
                <!--//col-->
                <div class="col-lg-3">
                    <p class="text-white mb-2">.</p>
                    <button type="submit" class="btn btn-primary text-white">Cek</button>
                </div>
            </div>
            <!--//row-->

            <!--//row-->
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            Rata-rata Penjualan : Rp 5.000.000
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            Laba Kotor : Rp 6.000.000
                        </div>
                    </div>
                </div>
                <!--//col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body mb-3">
                            Produk paling laku :
                            <p class="mb-0">- Cuci</p>
                            <p class="mb-0">- Cuci Setrika</p>
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
                            <h4 class="app-card-title">Penjualan Harian</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="chart-container">
                        <canvas id="canvas-linechart"></canvas>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Penjualan Mingguan</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="chart-container">
                        <canvas id="canvas-linechart"></canvas>
                    </div>
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-chart h-100 shadow-sm">
                <div class="app-card-header p-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="app-card-title">Penjualan Bulanan</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body p-3 p-lg-4">
                    <div class="chart-container">
                        <canvas id="canvas-linechart"></canvas>
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
<?= $this->endSection() ?>