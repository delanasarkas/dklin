<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Ubah Pembayaran</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-2 mt-2">
                            <form action="/ubah-pembayaran/<?= $data_detail['id_pembayaran'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nama_pembayaran" class="form-label">Nama Pembayaran</label>
                                    <input type="text" class="form-control" id="nama_pembayaran" name="nama_pembayaran" value="<?= $data_detail['nama_pembayaran'] ?>" placeholder="Nama Pembayaran" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Tipe Pembayaran</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_pembayaran" id="tipe_cash" value="cash" <?= $data_detail['tipe_pembayaran'] == 'cash' ? 'checked' : null ?>>
                                        <label class="form-check-label" for="tipe_cash">Cash</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_pembayaran" id="tipe_debit" value="debit" <?= $data_detail['tipe_pembayaran'] == 'debit' ? 'checked' : null ?>>
                                        <label class="form-check-label" for="tipe_debit">Debit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_pembayaran" id="tipe_transfer" value="transfer" <?= $data_detail['tipe_pembayaran'] == 'transfer' ? 'checked' : null ?>>
                                        <label class="form-check-label" for="tipe_transfer">Transfer</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Ubah</button>
                                    <a href="/pembayaran" class="btn btn-secondary text-white">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
    <!--//tab-pane-->
</div>
<!--//tab-content-->

</div>
<!--//container-fluid-->
<!--//container-fluid-->
<?= $this->endSection() ?>