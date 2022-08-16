<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Data Customer</h1>
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <label for="outlet" class="form-label">Outlet</label>
                    <select class="form-select" style="width:20%" id="outlet" name="outlet">
                        <option value="" selected>Pilih Cabang</option>
                        <option value="bsd">BSD</option>
                        <option value="bukit_dago">Bukit Dago</option>
                        <option value="serpong_park">Serpong park</option>
                        <option value="sentraland">Sentraland</option>
                    </select>
                    <div class="table-responsive mt-4">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Alamat</th>
                                    <th class="cell">Nomor Telepon</th>
                                    <th class="cell">Terakhir Laundry</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td class="cell">
                                        Andi
                                    </td>
                                    <td class="cell">
                                        Bogor
                                    </td>
                                    <td class="cell">
                                        0856789345
                                    </td>
                                    <td class="cell">
                                        7 Mei 2022
                                    </td>
                                    <td class="cell">
                                        <a class="btn-sm app-btn-secondary" href="#">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td class="cell">
                                        Indah
                                    </td>
                                    <td class="cell">
                                        Serpong
                                    </td>
                                    <td class="cell">
                                        0856789245
                                    </td>
                                    <td class="cell">
                                        10 Juni 2022
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