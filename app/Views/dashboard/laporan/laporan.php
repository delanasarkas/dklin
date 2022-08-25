<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-page, #print-page * {
            visibility: visible;
        }
        #print-page {
            position: absolute;
            left: 0;
            top: 0;
        }

        #button, #noted {
            display: none !important;
        }
    }
</style>
<div class="container-xl">
    <div id="print-page">
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="app-page-title">Rekapan Order <?= date('d F Y') ?></h1>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <h4 class="text-start mb-2 bg-primary text-white p-1">Setoran Tunai</h4>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Kas Tunai</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($kas_tunai[0]['total'], 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Pengeluaran</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($pengeluaran[0]['pengeluaran'], 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Sisa</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($kas_tunai[0]['total'] - $pengeluaran[0]['pengeluaran'], 0,',','.') ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <h4 class="text-start mb-2 bg-primary text-white p-1">Setoran NonTunai</h4>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Debit</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($debit[0]['total'], 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Transfer</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($transfer[0]['total'], 0,',','.') ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="text-start mb-2 bg-primary text-white p-1">Orderan</h4>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Jumlah Nota</p>
                                    <p class="fw-bold mb-0"><?= $jumlah_nota ?> Orang</p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Jumlah Kiloan</p>
                                    <p class="fw-bold mb-0"><?= $jumlah_kg[0]['berat'] == null ? 0 : $jumlah_kg[0]['berat'] ?> Kg</p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Jumlah Satuan</p>
                                    <p class="fw-bold mb-0"><?= $jumlah_satuan[0]['berat'] == null ? 0 : $jumlah_satuan[0]['berat'] ?> Pcs</p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Jumlah Orderan</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($jumlah_order[0]['total'], 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">1-<?= date('d') ?></p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($jumlah_order_ofday[0]['total'], 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Rata-rata Orderan/Hari</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($jumlah_order_ofday[0]['total'] / date('d'), 0,',','.') ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mb-2 p-1">
                                    <p class="mb-0">Estimasi Orderan (<?= date('t') ?> Hari)</p>
                                    <p class="fw-bold mb-0"><?= 'Rp. '.number_format($jumlah_order_ofday[0]['total'] / date('d') * date('t'), 0,',','.') ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-2" id="button">
                            <button type="button" onclick="window.print()" class="btn btn-secondary text-white">CETAK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" id="noted">
                <div class="app-card shadow-sm">
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
    </div>
</div>
<!--//container-fluid-->
<?= $this->endSection() ?>