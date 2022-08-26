<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Data Orderan Customer</h1>
        </div>
        <div class="col-auto">
            <a class="btn app-btn-secondary" href="/tambah-nota">
                <i class="fas fa-plus"></i>
                Tambah Order
            </a>
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="table-responsive">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nomor Nota</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Telepon</th>
                                    <th class="cell">Jasa</th>
                                    <th class="cell">Total Order</th>
                                    <th class="cell">Total Bayar</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Tgl Order</th>
                                    <th class="cell">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($data_table as $data) : ?>
                                    <tr>
                                        <td class="cell text-center">
                                            <?= $no++; ?>
                                        </td>
                                        <td class="cell">
                                            <a href="/view-kwitansi/<?= $data['id_order'] ?>" target="_blank">
                                                <u>
                                                    <?= $data['no_nota'] ?>
                                                </u>
                                            </a>
                                        </td>
                                        <td class="cell text-capitalize">
                                            <?php if($data['deposit_customer'] > 0) : ?>
                                            <i class="fas fa-crown text-warning"></i>
                                            <?php endif; ?>
                                            <?= $data['nama_customer'] ?>
                                        </td>
                                        <td class="cell">
                                            <a href="https://wa.me/62<?= substr($data['telp_customer'],1) ?>?text=Hallo" target="_blank" class="badge bg-black text-white">
                                                <i class="fab fa-whatsapp text-white"></i> <?= $data['telp_customer'] ?>
                                            </a>
                                        </td>
                                        <td class="cell">
                                            <?= $data['nama_layanan'] ?>
                                        </td>
                                        <td class="cell">
                                            <?= 'Rp '.number_format($data['total_order'], 0,',','.') ?> (<?= $data['berat'] ?><?= $data['tipe_layanan'] == 'kg' ? 'Kg' : 'Pcs' ?>)
                                        </td>
                                        <td class="cell">
                                            <?= 'Rp '.number_format($data['total_bayar'], 0,',','.') ?> 
                                            <br/>
                                            <span class="badge bg-warning"><?= $data['nama_pembayaran'] ?></span>
                                        </td>
                                        <td class="cell">
                                            <?php if($data['status'] == 'lunas'): ?>
                                                <span class="badge bg-success text-capitalize">
                                                    <i class="fas fa-check-circle"></i> <?= $data['status'] ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="badge bg-danger text-capitalize">
                                                    <i class="fas fa-times-circle"></i> <?= $data['status'] ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="cell">
                                            <?= date('d F Y', strtotime($data['created_at'])) ?>
                                        </td>
                                        <td class="cell">
                                            <?php if($data['status'] == 'belum lunas'): ?>
                                                <a class="btn-sm app-btn-secondary me-2" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalLunas-<?= $data['id_order'] ?>">
                                                    Lunaskan
                                                </a>
                                            <?php endif; ?>

                                            <?php if($data['tipe_pembayaran'] != 'saldo' && $data['tipe_pembayaran'] != 'multi'): ?>
                                                <a class="btn-sm app-btn-secondary" href="/detail-nota/<?= $data['id_order'] ?>">
                                                    Edit
                                                </a>
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <!-- Modal Lunas -->
                                    <div class="modal fade" id="modalLunas-<?= $data['id_order'] ?>" tabindex="-1" aria-labelledby="modalLunasLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLunasLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Order <strong><?= $data['no_nota'] ?></strong> lunas?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
                                                <a href="/lunas-order/<?= $data['id_order'] ?>" class="btn btn-primary text-white">Lunas</a>
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