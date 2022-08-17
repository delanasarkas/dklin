<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Tambah Data Karyawan</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-4 mt-2">
                            <form action="">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                </div>

                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Nomor Telepon">
                                </div>

                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Wilayah</label>
                                    <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Wilayah">
                                </div>

                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" id="jabatan" name="jabatan">
                                        <option value="" selected>Pilih Jabatan</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Save</button>
                                    <a href="/data-karyawan" class="btn btn-secondary text-white ms-2">Cancel</a>
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