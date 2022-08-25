<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Data Proses</h1>
        </div>

        <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="table-responsive">
                        <table id="example3" style="width:100%" class="table table-striped table-bordered app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell text-center" colspan="4">
                                        DATA PROSES
                                    </th>
                                    <th class="cell text-center" colspan="6">
                                        PROSES BAGIAN
                                    </th>
                                </tr>
                                <tr>
                                    <th class="cell">Tanggal</th>
                                    <th class="cell">Nomor Nota</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Jasa</th>
                                    <th class="cell">Rinci</th>
                                    <th class="cell">Cuci</th>
                                    <th class="cell">Setrika</th>
                                    <th class="cell">Packing</th>
                                    <th class="cell">Delivery</th>
                                    <th class="cell">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_order as $data) : ?>
                                <tr>
                                    <td class="cell">
                                        <?= date('d M Y', strtotime($data['created_at'])) ?>
                                    </td>
                                    <td class="cell">
                                        <?= $data['no_nota'] ?>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <?= $data['nama_customer'] ?>
                                    </td>
                                    <td class="cell">
                                        <?= $data['nama_layanan'] ?>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <span class="badge bg-secondary text-white">
                                            <?= $data['rinci'] ?>
                                        </span>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <?php if($data['cuci'] != null) : ?>
                                        <span class="badge bg-secondary text-white">
                                            <?= $data['cuci'] ?>
                                        </span>
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <?php if($data['setrika'] != null) : ?>
                                        <span class="badge bg-secondary text-white">
                                            <?= $data['setrika'] ?>
                                        </span>
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <?php if($data['packing'] != null) : ?>
                                        <span class="badge bg-secondary text-white">
                                            <?= $data['packing'] ?>
                                        </span>
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell text-capitalize">
                                        <?php if($data['delivery'] != null) : ?>
                                        <span class="badge bg-secondary text-white">
                                            <?= $data['delivery'] ?>
                                        </span>
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalubah-<?= $data['id_order'] ?>">
                                            Edit
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalubah-<?= $data['id_order'] ?>" tabindex="-1" aria-labelledby="modalubahLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalubahLabel">Ubah Proses</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="/ubah-proses/<?= $data['id_proses'] ?>" method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="rinci" class="form-label">Rinci</label>
                                                                <input type="text" class="form-control" id="rinci" name="rinci" value="<?= $data['rinci'] ?>" placeholder="..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="cuci" class="form-label">Cuci</label>
                                                                <input type="text" class="form-control" id="cuci" name="cuci" value="<?= $data['cuci'] ?>" placeholder="..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="setrika" class="form-label">Setrika</label>
                                                                <input type="text" class="form-control" id="setrika" name="setrika" value="<?= $data['setrika'] ?>" placeholder="..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="packing" class="form-label">Packing</label>
                                                                <input type="text" class="form-control" id="packing" name="packing" value="<?= $data['packing'] ?>" placeholder="..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="delivery" class="form-label">Delivery</label>
                                                        <input type="text" class="form-control" id="delivery" name="delivery" value="<?= $data['delivery'] ?>" placeholder="..." required>
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
<?= $this->endSection() ?>