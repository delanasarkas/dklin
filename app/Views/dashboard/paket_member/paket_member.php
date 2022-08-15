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
                                    <th class="cell">Data Customer</th>
                                    <th class="cell">No Nota</th>
                                    <th class="cell">Tanggal Pesan</th>
                                    <th class="cell">Berat Kg</th>
                                    <th class="cell">Sisa Paket kg</th>
                                    <th class="cell">Tanggal Keluar</th>
                                    <th class="cell">Karyawan</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell text-center">
                                        1
                                    </td>
                                    <td class="cell">
                                        Customer budi
                                    </td>
                                    <td class="cell">
                                        304521
                                    </td>
                                    <td class="cell">
                                        8 Mei 2022
                                    </td>
                                    <td class="cell">
                                        Deposit 4Kg
                                    </td>
                                    <td class="cell">
                                        4Kg
                                    </td>
                                    <td class="cell">
                                        10 Mei 2022 
                                    </td>
                                    <td class="cell">
                                        Nani
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
                                        Customer Andi
                                    </td>
                                    <td class="cell">
                                        304522
                                    </td>
                                    <td class="cell">
                                        17 Juni 2022
                                    </td>
                                    <td class="cell">
                                        10Kg
                                    </td>
                                    <td class="cell">
                                        5Kg
                                    </td>
                                    <td class="cell">
                                        20 Juni 2022
                                    </td>
                                    <td class="cell">
                                      Nana
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