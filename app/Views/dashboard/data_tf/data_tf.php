<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <!--//row-->
    <div class="row gx-5">
        <!-- Table1 -->
        <div class="col-lg-12">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-1">Laporan Kas Masuk</h1>
                    <h5 class="mb-0">Senin 10 Agustus 2022</h5>
                </div>
                <!--//col-auto-->
            </div>
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5 ">
                        <div class="app-card-body p-2">
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Nomor Nota</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Uang</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell">
                                                34521
                                            </td>
                                            <td class="cell">
                                                jaja
                                            </td>
                                            <td class="cell">
                                                100.000
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="cell">
                                                234522
                                            </td>
                                            <td class="cell">
                                                jeje
                                            </td>
                                            <td class="cell">
                                                50000
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="fw-bold">Jumlah</td>
                                            <td></td>
                                            <td class="fw-bold">40.000</td>
                                        </tr>
                                    </tfoot>
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
        <!-- Table2 -->
        <div class="col-lg-12">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-1">Laporan Kas Keluar</h1>
                    <h5 class="mb-0">Senin 10 Agustus 2022</h5>
                </div>
                <!--//col-auto-->
            </div>
            <!--//row-->
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5 ">
                        <div class="app-card-body p-2">
                            <div class="table-responsive">
                                <table id="example2" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Nomor Nota</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Uang</th>
                                            <th class="cell">Tf Bank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell">
                                                34521
                                            </td>
                                            <td class="cell">
                                                jaja
                                            </td>
                                            <td class="cell">
                                                100.000
                                            </td>
                                            <td class="cell">
                                                DANA
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="cell">
                                                34522
                                            </td>
                                            <td class="cell">
                                                Jeje
                                            </td>
                                            <td class="cell">
                                                200.000
                                            </td>
                                            <td class="cell">
                                                SHOPEEPAY
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