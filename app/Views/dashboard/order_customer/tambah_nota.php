<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl col-lg-8">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <h4>Layanan Order Laundry</h4>
                        </div>
                        <div class="col-6 text-end align-self-center">
                            <a class="btn app-btn-secondary btn-sm" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#modalTambahCustomer">
                                <i class="fas fa-user"></i>
                                Add Customer
                            </a>
                            <a class="btn app-btn-secondary btn-sm" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#modalDeposit">
                                <i class="fas fa-coins"></i>
                                Deposit
                            </a>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="ms-4 me-4">
                                <?php if(session()->get('saldo-gagal')) : ?>
                                <div class="alert alert-danger" role="alert">
                                   <strong>Uppss</strong> <?= session()->get('saldo-gagal') ?>
                                </div>
                                <?php endif; ?>
                                <form action="/tambah-order" method="POST" id="form-tambah-nota" onsubmit="return checkSubmit()">
                                    <div class="mb-3">
                                        <label for="paket" class="form-label">Cari Nama Customer</label>
                                        <select class="form-select" id="select-field" data-placeholder="Cari" name="customer" required>
                                            <option></option>
                                            <?php foreach($data_customer as $data) : ?>
                                                <option value="<?= $data['id_customer'] ?>">
                                                    <?= $data['nama_customer'] ?>
                                                    <?php if($data['deposit_customer'] != 0) : ?>
                                                        (<?= $data['deposit_customer'] ?> Kg)
                                                    <?php endif; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="jenis" class="form-label">Jenis Order</label>
                                                <select class="form-select" id="jenis" name="jenis" required>
                                                    <option value="" selected>Pilih Jenis</option>
                                                    <?php foreach($data_jenis as $data) : ?>
                                                        <option value="<?= $data['id_jenis_pakaian'] ?>">
                                                            <?= $data['nama_jenis_pakaian'] ?> - <?= $data['keterangan_jenis_pakaian'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="layanan" class="form-label">Layanan</label>
                                                <select class="form-select" id="layanan" name="layanan" onchange="selectLayanan(this.options[this.selectedIndex])" required>
                                                    <option value="" selected>Pilih Layanan</option>
                                                    <?php foreach($data_layanan as $data) : ?>
                                                        <option id="<?= $data['tipe_layanan'] ?>" value="<?= $data['id_layanan'] ?>">
                                                            <?= $data['nama_layanan'] ?> 
                                                            <?php if($data['tipe_layanan'] != 'kg') : ?>
                                                                <?= number_format($data['harga_layanan'], 0,',','.') ?>/Pcs
                                                            <?php else : ?>
                                                                <?= number_format($data['harga_layanan'], 0,',','.') ?>/Kg
                                                            <?php endif; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="show_element" class="d-none">
                                        <div class="row g-3">
                                            <div class="col">
                                                <div class="mb-3" id="field-kg">
                                                    <label for="berat" class="form-label">Berat/Kg</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="berat" name="berat" min="4" placeholder="Minimal 4Kg" required>
                                                        <span class="input-group-text">Kg</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3" id="field-pcs">
                                                    <label for="pcs" class="form-label">Banyak Pcs</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="pcs" name="pcs" min="1" placeholder="Minimal 1 pcs" required>
                                                        <span class="input-group-text">Pcs</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="tgl_selesai" class="form-label">Estimasi Selesai</label>
                                                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= date("Y-m-d") ?>" placeholder="Estimasi Selesai" required>
                                                </div>
                                            </div>
                                        </div>
    
    
                                        <div class="mb-3">
                                            <label for="tipe_pembayaran" class="form-label">Tipe Pembayaran</label>
                                            <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran" onchange="selectPembayaran(this)" required>
                                                <option value="" selected>Pilih Tipe Pembayaran</option>
                                                <?php foreach($data_pembayaran as $data) : ?>
                                                    <option value="<?= $data['id_pembayaran'] ?>"><?= $data['nama_pembayaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="text-multipayment" class="fst-italic d-none"><span class="text-danger">*</span>Pembayaran saldo deposit yang kurang dengan pembayaran lain.</small>
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                            <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                                                <option value="" selected>Pilih Status Pembayaran</option>
                                                <option value="lunas">Lunas - Jika sudah dibayar full</option>
                                                <option value="belum_lunas">Belum Lunas - Bayar setelah selesai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary text-white">Order</button>
                                        <a href="/order-customer" class="btn btn-secondary text-white">Batal</a>
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

<!-- Modal Tambah Customer -->
<div class="modal fade" id="modalTambahCustomer" tabindex="-1" aria-labelledby="modalTambahCustomerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahCustomerLabel">Tambah Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/tambah-customer" method="POST">
        <div class="modal-body">
                <div class="row">
                    <div class="col-6">                    
                        <div class="mb-3">
                            <label for="nama_customer" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="telp_customer" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="telp_customer" name="telp_customer" placeholder="No Telepon" required>
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="alamat_customer" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Alamat" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Tambahkan Customer</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Deposit -->
<div class="modal fade" id="modalDeposit" aria-labelledby="modalDepositLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDepositLabel">Deposit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="/tambah-deposit" method="POST">
            <div class="modal-body">
                <div class="alert alert-info fst-italic" role="alert">
                    Deposit akan tersimpan atas <strong>nama kasir.</strong>
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Nama Customer</label>
                    <select class="form-select" id="select-field-2" name="customer" data-placeholder="Cari" required>
                        <option></option>
                        <?php foreach($data_customer as $data) : ?>
                            <option value="<?= $data['id_customer'] ?>">
                                <?= $data['nama_customer'] ?>
                                <?php if($data['deposit_customer'] != 0) : ?>
                                    (<?= $data['deposit_customer'] ?> Kg)
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="paket" class="form-label">Paket Deposit</label>
                    <?php $first = 0 ?>
                    <?php foreach($data_layanan_member as $data) : ?>
                        <div class="form-check">
                            <input class="form-check-input checkbox-paket-member" type="radio" name="deposit_customer" id="<?= $data['id_layanan'] ?>" value="<?= $data['id_layanan'] ?>" <?= $first == 0 ? 'checked' : null ?>>
                            <label class="form-check-label" for="<?= $data['id_layanan'] ?>">
                            <?= $data['nama_layanan'] ?> (<?= $data['berat_layanan'] ?> Kg) 
                            <span class="badge bg-warning">
                                <?= 'Rp '.number_format($data['harga_layanan'], 0,',','.') ?>
                            </span>
                            </label>
                        </div>
                        <?php $first++ ?>
                    <?php endforeach; ?>
                </div>

                <div class="mb-3">
                    <label for="tipe_pembayaran" class="form-label">Tipe Pembayaran</label>
                    <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran" required>
                        <option value="" selected>Pilih Tipe Pembayaran</option>
                        <?php foreach($data_pembayaran as $data) : ?>
                            <?php if($data['tipe_pembayaran'] != 'saldo' && $data['tipe_pembayaran'] != 'multi') : ?>
                            <option value="<?= $data['id_pembayaran'] ?>"><?= $data['nama_pembayaran'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Deposit</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
    // select layanan
    function selectLayanan(tipeLayanan) {
        let id = tipeLayanan.id;
        let val = tipeLayanan.value;

        if(val) {
            $('#show_element').removeClass("d-none");

            if(id == 'kg') {
                $('#pcs').removeAttr("required");
                $('#field-pcs').addClass("d-none");

                $('#berat').attr("required");
                $('#field-kg').removeClass("d-none");
            } else {
                $('#field-pcs').removeClass("d-none");
                $('#pcs').attr("required");

                $('#berat').removeAttr("required");
                $('#field-kg').addClass("d-none");
            }
        } else {
            $('#show_element').addClass("d-none");
        }
    }

    function selectPembayaran(data) {
        if(data.value == '6') {
            $('#text-multipayment').removeClass('d-none');
        } else {
            $('#text-multipayment').addClass('d-none');
        }
    }

    $("#deposit_saldo").click(function() {
        if($("#deposit_saldo").is(':checked')) {
            $('#list_paket_member').removeClass("d-none");
        } else {
            $('#list_paket_member').addClass("d-none");
        }
    })

    function checkSubmit() {
        let value = $('#tipe_pembayaran').find(":selected").val();

        if(value == 4 || value == 6) {
            return confirm('Pembayaran menggunakan saldo deposit atau multipayment tidak dapat diubah, lanjutkan order?');
        }
    }
</script>
<?= $this->endSection() ?>