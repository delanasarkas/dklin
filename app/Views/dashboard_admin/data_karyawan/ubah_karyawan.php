<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <h4>Ubah Data Karyawan</h4>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="ms-2 me-2 mt-2">
                            <form action="/ubah-karyawan/<?= $data_detail[0]['id_users'] ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $data_detail[0]['username'] ?>" placeholder="Nama Lengkap" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= $data_detail[0]['no_telepon'] ?>" placeholder="Nomor Telepon" required>
                                </div>

                                <div class="mb-3">
                                    <label for="cabang" class="form-label">Wilayah Cabang</label>
                                    <select class="form-select" id="cabang" name="cabang" required>
                                        <option value="" selected>Pilih Cabang</option>
                                        <?php foreach($data_cabang as $data) : ?>
                                            <option value="<?= $data['id_cabang'] ?>" <?= $data_detail[0]['cabang'] == $data['id_cabang'] ? 'selected' : null ?>><?= $data['nama_cabang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" id="jabatan" name="jabatan" required>
                                        <option value="" selected>Pilih Jabatan</option>
                                        <option value="admin" <?= $data_detail[0]['role'] == 'admin' ? 'selected' : null ?>>Admin</option>
                                        <option value="kasir" <?= $data_detail[0]['role'] == 'kasir' ? 'selected' : null ?>>Kasir</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary text-white">Ubah</button>
                                    <a href="/data-karyawan" class="btn btn-secondary text-white">Batal</a>
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