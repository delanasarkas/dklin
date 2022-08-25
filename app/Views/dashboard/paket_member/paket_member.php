<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Paket Member</h1>
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
                                    <th class="cell">Customer</th>
                                    <th class="cell">No Nota</th>
                                    <th class="cell">Tanggal Pesan</th>
                                    <th class="cell">Berat Kg</th>
                                    <th class="cell">Sisa Paket kg</th>
                                    <th class="cell">Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($data_table as $data) : ?>
                                <tr>
                                    <td class="cell text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="cell">
                                        <?php if($data['deposit_customer'] > 0) : ?>
                                            <i class="fas fa-crown text-warning"></i>
                                        <?php endif; ?>
                                        <?= $data['nama_customer'] ?>
                                    </td>
                                    <td class="cell">
                                        <?= $data['no_nota'] ?>
                                    </td>
                                    <td class="cell">
                                        <?= date('d M Y', strtotime($data['created_at'])) ?>
                                    </td>
                                    <td class="cell">
                                        <?= $data['berat'] ?>Kg
                                    </td>
                                    <td class="cell">
                                        <?= $data['deposit_customer'] ?>Kg
                                    </td>
                                    <td class="cell">
                                        <?= date('d M Y', strtotime($data['tgl_selesai'])) ?>
                                    </td>
                                </tr>
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