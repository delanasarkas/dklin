<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Tambah Cabang</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-2 mt-2">
                            <form action="/tambah-cabang/proses" method="POST">
                                <div class="mb-3">
                                    <label for="nama_cabang" class="form-label">Nama Cabang</label>
                                    <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" placeholder="Nama Cabang" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_cabang" class="form-label">Alamat Cabang</label>
                                    <input type="text" class="form-control" id="alamat_cabang" name="alamat_cabang" placeholder="Alamat Cabang" required>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
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