<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Layanan Order Laundry</h4>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <p class="mb-0">Jam : 12.00</p>
                            <p>Tanggal : 8 Agustus 2022</p>

                            <div class="ms-4 me-4">
                                <form action="">
                                    <div class="mb-3">
                                        <label for="no_order" class="form-label">No Order/Nota</label>
                                        <input type="number" class="form-control" id="no_order" name="no_order" placeholder="No Order/Nota">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_customer" class="form-label">Nama Customer</label>
                                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer">
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Nomor Telepon">
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="paket" class="form-label">Paket</label>
                                        <select class="form-select" id="paket" name="paket">
                                            <option value="" selected>Pilih Paket</option>
                                            <option value="cuci_setrika">Cuci Setrika - 8.000/Kg</option>
                                            <option value="cuci_lipat">Cuci Lipat - 6.000/Kg</option>
                                            <option value="setrika">Setrika - 6.000/Kg</option>
                                            <option value="paket_member">Paket Member</option>
                                            <option value="dry_clean">Dry Clean</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="berat" class="form-label">Berat/Kg</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="berat" name="berat" placeholder="Mminimal 4Kg">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_ambil" class="form-label">Estimasi Tanggal Ambil</label>
                                        <input type="date" class="form-control" id="tgl_ambil" name="tgl_ambil" placeholder="Estimasi Tanggal Ambil">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tipe_pembayaran" class="form-label">Tipe Pembayaran</label>
                                        <select class="form-select" id="tipe_pembayaran" name="tipe_pembayaran">
                                            <option value="" selected>Pilih Tipe Pembayaran</option>
                                            <option value="transfer">Transfer</option>
                                            <option value="debit">Debit</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                        <select class="form-select" id="status_pembayaran" name="status_pembayaran">
                                            <option value="" selected>Pilih Status Pembayaran</option>
                                            <option value="lunas">Lunas - Jika sudah dibayar full</option>
                                            <option value="belum_lunas">Belum Lunas - Jika belum dibayar full</option>
                                            <option value="dp">Dp - Bayar diawal</option>
                                            <option value="titipan">Titipan - Deposit</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary text-white">Order</button>
                                        <a href="/order-customer" class="btn btn-secondary text-white ms-2">Cancel</a>
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