<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <h1 class="app-page-title">Rekapan Order 8 Agustus 2022</h1>



    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="text-start mb-2">Orderan</h4>
                    <p class="text-start mb-0">- Jumlah Nota : 10 orang</p>
                    <p class="text-start mb-0">- Jumlah Kiloan : 35.600 Kg</p>
                    <p class="text-start mb-0">- Jumlah Satuan/Dry Clean : 15 Pcs</p>
                    <p class="text-start mb-0">- Jumlah Orderan : 500.000</p>
                </div>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->

        <div class="col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="text-start mb-2">Kosong</h4>
                    <p class="text-start mb-0">- 1-8 :5.000.000</p>
                    <p class="text-start mb-0">- Rata-rata Orderan/Hari : 600.000</p>
                    <p class="text-start mb-0">- Estimasi Orderan(31 Hari): 30.000.000</p>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->

        <div class="col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="text-center mb-2">Noted</h4>
                    <p class="text-center mb-0">Setiap malam ada kertas</p>
                    <p class="text-center mb-0">berupa laporan dan disetor</p>
                    <p class="text-center mb-0">bersama uang tunainya</p>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="text-start mb-2">Setoran Tunai</h4>
                    <p class="fw-normal text-start mb-0">- Kas Tunai Masuk Kas : 265.000</p>
                    <p class="text-start mb-0">- Biaya Gas : 46.000</p>
                    <p class="text-start mb-0">- Biaya Bensin : 20.000</p>
                    <p class="text-start mb-0">- Kasbon : 0</p>
                    <p class="fw-bold text-start text-black mb-0">Sisa : 218.000</p>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->

        <div class="col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="text-start mb-2">Setoran NonTunai</h4>
                    <p class="fw-normal text-start mb-0">- Debit : 50.000</p>
                    <p class="text-start mb-0">- Transfer : 100.000</p>
                </div>
                <!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
        </div>
        <!--//col-->
    </div>
</div>
<!--//container-fluid-->
<?= $this->endSection() ?>