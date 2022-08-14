<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Data Prosses</h1>
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
                                    <th class="cell text-center" colspan="5">
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
                                    <th class="cell">Kg/Banyak Pcs</th>
                                    <th class="cell">Rinci</th>
                                    <th class="cell">Cuci</th>
                                    <th class="cell">Setrika</th>
                                    <th class="cell">Packing</th>
                                    <th class="cell">Delivery</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell text-center">
                                        7 Agustus
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
                                        4000
                                    </td>
                                    <td class="cell">
                                        Siti
                                    </td>
                                    <td class="cell">
                                        Ida
                                    </td>
                                    <td class="cell">
                                        Putri
                                    </td>
                                    <td class="cell">
                                        Mei
                                    </td>
                                    <td class="cell">
                                        Joko
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary" href="#">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cell text-center">
                                        7 Agustus
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
                                        4000
                                    </td>
                                    <td class="cell">
                                        Siti
                                    </td>
                                    <td class="cell">
                                        Ida
                                    </td>
                                    <td class="cell">
                                        Putri
                                    </td>
                                    <td class="cell">
                                        Mei
                                    </td>
                                    <td class="cell">
                                        Joko
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

    <div class="row">
        <div class="col-lg-4 text-center">
            <h3>Data Insentif 1-30</h3>
        </div>
        <div class="col-lg-8">
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body p-3">
                            <div class="table-responsive">
                                <table style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                                    <thead>
                                        
                                        <tr>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Rinci</th>
                                            <th class="cell">Cuci</th>
                                            <th class="cell">Setrika</th>
                                            <th class="cell">Packing</th>
                                            <th class="cell">Delivery</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell text-center">
                                                Ida
                                            </td>
                                            <td class="cell">
                                                10
                                            </td>
                                            <td class="cell">
                                                5
                                            </td>
                                            <td class="cell">
                                                5
                                            </td>
                                            <td class="cell">
                                                10
                                            </td>
                                            <td class="cell">
                                                5
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
    </div>
</div>
<!--//container-fluid-->
<!--//container-fluid-->
<?= $this->endSection() ?>