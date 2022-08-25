<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Tambah Layanan</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-2 mt-2">
                            <form action="/tambah-layanan/proses" method="POST">
                                <div class="mb-3">
                                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Tipe Layanan</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input checkbox-layanan" type="radio" name="tipe_layanan" id="layanan_kg" value="kg" checked>
                                        <label class="form-check-label" for="kg">Kg</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input checkbox-layanan" type="radio" name="tipe_layanan" id="layanan_satuan" value="satuan">
                                        <label class="form-check-label" for="satuan">Satuan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input checkbox-layanan" type="radio" name="tipe_layanan" id="layanan_member" value="member">
                                        <label class="form-check-label" for="member">Member</label>
                                    </div>
                                </div>

                                <div class="mb-3 d-none" id="field_berat_layanan">
                                    <label for="berat_layanan" class="form-label">Berat Layanan</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="berat_layanan" name="berat_layanan" placeholder="Minimal 4Kg" value="4" min="4" required>
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                    <small class="fst-italic">Minimal 4Kg</small>
                                </div>

                                <div class="mb-3">
                                    <label for="harga_layanan" class="form-label">Harga Layanan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="harga_layanan" name="harga_layanan" placeholder="Harga Layanan" required>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                    <a href="/paket-layanan" class="btn btn-secondary text-white">Batal</a>
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

<script>
    $(".checkbox-layanan").click(function() {
        if($("#layanan_member").is(':checked')) {
            $('#field_berat_layanan').removeClass("d-none");
        } else {
            $('#field_berat_layanan').addClass("d-none");
        }
    })
</script>
<?= $this->endSection() ?>