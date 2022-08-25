<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Table Customer</h4>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Asal Cabang</th>
                                    <th class="cell">Nomor Telepon</th>
                                    <th class="cell">Alamat</th>
                                    <th class="cell">Bergabung</th>
                                    <th class="cell">Terakhir Laundry</th>
                                    <th class="cell">Pendaftar</th>
                                    <?php if (session()->get('role') == 'owner') : ?>
                                    <th class="cell">Act</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($data_table as $data) : ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= $data['nama_customer'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['nama_cabang'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['telp_customer'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['alamat_customer'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= date('d F Y', strtotime($data['tgl_gabung'])) ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['tgl_terakhir_laundry'] == null ? '-' : date('d F Y', strtotime($data['tgl_terakhir_laundry'])) ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= $data['username'] ?>
                                        </td>
                                        <?php if (session()->get('role') == 'owner') : ?>
                                            <td class="cell">
                                                <a class="btn-sm app-btn-secondary" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#modalUbahCustomer-<?= $data['id_customer'] ?>">
                                                    Edit
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>

                                    <!-- Modal Ubah Customer -->
                                    <div class="modal fade" id="modalUbahCustomer-<?= $data['id_customer'] ?>" tabindex="-1" aria-labelledby="modalUbahCustomerLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalUbahCustomerLabel">Ubah Customer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/ubah-customer/<?= $data['id_customer'] ?>" method="POST">
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">                    
                                                            <div class="mb-3">
                                                                <label for="nama_customer" class="form-label">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= $data['nama_customer'] ?>" placeholder="Nama Lengkap" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="telp_customer" class="form-label">No Telepon</label>
                                                                <input type="text" class="form-control" id="telp_customer" name="telp_customer" value="<?= $data['telp_customer'] ?>" placeholder="No Telepon" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="alamat_customer" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" value="<?= $data['alamat_customer'] ?>" placeholder="Alamat" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary text-white">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
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