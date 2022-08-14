<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Data Orderan Customer</h1>
    </div>
    <div class="col-auto">
        <a class="btn app-btn-secondary" href="#">
            <i class="fas fa-plus"></i>
            Tambah Nota
        </a>
    </div>
    <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
    <div
        class="tab-pane fade show active"
        id="orders-all"
        role="tabpanel"
        aria-labelledby="orders-all-tab"
    >
        <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body p-3">
            <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                <thead>
                <tr>
                    <th class="cell">No</th>
                    <th class="cell">Nomor Nota</th>
                    <th class="cell">Nama</th>
                    <th class="cell">Jasa</th>
                    <th class="cell">Kg/St</th>
                    <th class="cell">Jenis</th>
                    <th class="cell">Rp/Kg</th>
                    <th class="cell">Rp/Satuan</th>
                    <th class="cell">Pelunasan</th>
                    <th class="cell"></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cell text-center">
                            1
                        </td>
                        <td class="cell">
                            30451
                        </td>
                        <td class="cell">
                            John Sanders
                        </td>
                        <td class="cell">
                            Cuci Setrika
                        </td>
                        <td class="cell">
                            4Kg
                        </td>
                        <td class="cell">
                            Ph
                        </td>
                        <td class="cell">
                            30.000
                        </td>
                        <td class="cell">
                            30.000
                        </td>
                        <td class="cell">
                            <span class="badge bg-success">Lunas</span>
                        </td>
                        <td class="cell">
                            <a class="btn-sm app-btn-secondary" href="#">
                                Edit
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="cell text-center">
                            2
                        </td>
                        <td class="cell">
                            30452
                        </td>
                        <td class="cell">
                            John Mayer
                        </td>
                        <td class="cell">
                            Cuci Setrika
                        </td>
                        <td class="cell">
                            4Kg
                        </td>
                        <td class="cell">
                            Ph
                        </td>
                        <td class="cell">
                            30.000
                        </td>
                        <td class="cell">
                            30.000
                        </td>
                        <td class="cell">
                            <span class="badge bg-danger">Belum Lunas</span>
                        </td>
                        <td class="cell">
                            <a class="btn-sm app-btn-secondary" href="#">
                                Edit
                            </a>
                        </td>
                    </tr>
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