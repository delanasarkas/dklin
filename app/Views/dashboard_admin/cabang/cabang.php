<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Table Wilayah Cabang</h4>
                        </div>
                        <div class="col-lg-6">
                            <?php if(session()->get('role') == 'owner'): ?>
                                <div class="text-end">
                                    <a href="/tambah-cabang" class="btn btn-primary text-white">+ Tambah Cabang</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama Cabang</th>
                                    <th class="cell">Alamat Cabang</th>
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
                                            <?= $data['nama_cabang'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= $data['alamat_cabang'] ?>
                                        </td>
                                        <td class="cell">
                                            <a class="btn-sm app-btn-secondary" href="/cabang/<?= $data['id_cabang'] ?>">
                                                Edit
                                            </a>
                                            <?php if($data['id_cabang'] != 2) : ?>
                                            <a class="btn-sm app-btn-secondary ms-2" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalDelete-<?= $data['id_cabang'] ?>">
                                                Hapus
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="modalDelete-<?= $data['id_cabang'] ?>" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hapus data <?= $data['nama_cabang'] ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                    <a href="/hapus-cabang/<?= $data['id_cabang'] ?>" class="btn btn-danger text-white">Hapus</a>
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