<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Table Pengeluaran</h4>
                        </div>
                        <div class="col-lg-6">
                            <?php if(session()->get('role') == 'admin'): ?>
                                <div class="text-end">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalTambahPengeluaran" class="btn btn-primary text-white">+ Tambah Pengeluaran</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="example5" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama Pengeluaran</th>
                                    <th class="cell">Jumlah Pengeluaran</th>
                                    <th class="cell">Tanggal Pengeluaran</th>
                                    <th class="cell">Dibuat Oleh</th>
                                    <?php if(session()->get('role') =='admin') : ?>
                                    <th class="cell">Act</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($data_table as $data) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= $data['nama_pengeluaran'] ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= 'Rp '.number_format($data['jumlah_pengeluaran'], 0,',','.') ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= date('d F Y', strtotime($data['tgl_pengeluaran'])) ?>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?= $data['username'] ?>
                                        </td>
                                        <?php if(session()->get('role') =='admin') : ?>
                                        <td class="cell">
                                            <a class="btn-sm app-btn-secondary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalUbahPengeluaran-<?= $data['id_pengeluaran'] ?>">
                                                Edit
                                            </a>
                                            <a class="btn-sm app-btn-secondary ms-2" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalDelete-<?= $data['id_pengeluaran'] ?>">
                                                Hapus
                                            </a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>

                                    <!-- Modal Tambah -->
                                    <div class="modal fade" id="modalUbahPengeluaran-<?= $data['id_pengeluaran'] ?>" tabindex="-1" aria-labelledby="modalUbahPengeluaranLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalUbahPengeluaranLabel">Ubah Pengeluaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/ubah-pengeluaran/<?= $data['id_pengeluaran'] ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="id_users" class="form-label">Terkait</label>
                                                        <input type="text" class="form-control" id="id_users" value="<?= $data['id_users'] ?>" name="id_users" placeholder="...">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_pengeluaran" class="form-label">Nama Pengeluaran</label>
                                                        <input type="text" class="form-control" id="nama_pengeluaran" value="<?= $data['nama_pengeluaran'] ?>" name="nama_pengeluaran" placeholder="...">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                                                        <input type="number" class="form-control" id="jumlah_pengeluaran" value="<?= $data['jumlah_pengeluaran'] ?>" name="jumlah_pengeluaran" placeholder="...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="modalDelete-<?= $data['id_pengeluaran'] ?>" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hapus data <?= $data['nama_pengeluaran'] ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                    <a href="/hapus-pengeluaran/<?= $data['id_pengeluaran'] ?>" class="btn btn-danger text-white">Hapus</a>
                                                </div>
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
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahPengeluaran" tabindex="-1" aria-labelledby="modalTambahPengeluaranLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahPengeluaranLabel">Tambah Pengeluaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/tambah-pengeluaran" method="post">
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_pengeluaran" class="form-label">Nama Pengeluaran</label>
                <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="...">
            </div>
            <div class="mb-3">
                <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                <input type="number" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran" placeholder="...">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary text-white">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>