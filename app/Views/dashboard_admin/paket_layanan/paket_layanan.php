<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Table Layanan</h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-end">
                                <a href="/tambah-layanan" class="btn btn-primary text-white">+ Tambah Layanan</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama Layanan</th>
                                    <th class="cell">Berat Layanan</th>
                                    <th class="cell">Harga Layanan</th>
                                    <th class="cell">Tipe Layanan</th>
                                    <th class="cell">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($data_table as $data) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['nama_layanan'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['berat_layanan'] == 0 ? '-' : $data['berat_layanan'].' Kg' ?>
                                        </td>
                                        <td class="cell harga_layanan">
                                            <?= 'Rp '.number_format($data['harga_layanan'], 0,',','.') ?>
                                        </td>
                                        <td class="cell">
                                            <span class="badge text-uppercase bg-<?= $data['tipe_layanan'] == 'member' ? 'black' : 'info' ?>">
                                                <?php if($data['tipe_layanan'] == 'member'): ?>
                                                    <i class="fas fa-crown text-warning"></i> 
                                                <?php else: ?>
                                                    <i class="fas fa-weight-scale"></i> 
                                                <?php endif; ?>
                                                <?= $data['tipe_layanan'] ?>
                                            </span>
                                        </td>
                                        <td class="cell">
                                            <a class="btn-sm app-btn-secondary" href="/paket-layanan/<?= $data['id_layanan'] ?>">
                                                Edit
                                            </a>
                                            <a class="btn-sm app-btn-secondary ms-2" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalDelete-<?= $data['id_layanan'] ?>">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="modalDelete-<?= $data['id_layanan'] ?>" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hapus data <?= $data['nama_layanan'] ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                    <a href="/hapus-layanan/<?= $data['id_layanan'] ?>" class="btn btn-danger text-white">Hapus</a>
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
<!--//container-fluid-->
<?= $this->endSection() ?>