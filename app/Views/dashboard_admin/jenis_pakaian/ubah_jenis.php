<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Ubah Jenis Pakaian</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-2 mt-2">
                            <form action="/ubah-jenis/<?= $data_detail['id_jenis_pakaian'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nama_jenis" class="form-label">Nama Jenis Pakaian</label>
                                    <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="<?= $data_detail['nama_jenis_pakaian'] ?>" placeholder="Nama Jenis Pakaian" required>
                                </div>

                                <div class="mb-3">
                                    <label for="keterangan_jenis" class="form-label">Keterangan Jenis Pakaian</label>
                                    <input type="text" class="form-control" id="keterangan_jenis" name="keterangan_jenis" value="<?= $data_detail['keterangan_jenis_pakaian'] ?>" placeholder="Keterangan Jenis Pakaian" required>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Ubah</button>
                                    <a href="/jenis-pakaian" class="btn btn-secondary text-white">Batal</a>
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