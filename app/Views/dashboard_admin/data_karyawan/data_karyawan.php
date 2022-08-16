<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Data Kayawan</h1>
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <button type="button" class="btn btn-primary text-white">+ Tambah Karyawan</button>
                    <div class="table-responsive mt-4">
                        <table id="example" style="width:100%" class="table table-striped app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Id User</th>
                                    <th class="cell">Nama Lengkap</th>
                                    <th class="cell">Wilayah</th>
                                    <th class="cell">Jabatan</th>
                                    <th class="cell">Tanggal Daftar</th>
                                    <th class="cell">Tanggal Login</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td class="cell">
                                        Adm Diana
                                    </td>
                                    <td class="cell">
                                        Diana A
                                    </td>
                                    <td class="cell">
                                        All Area
                                    </td>
                                    <td class="cell">
                                        Admin
                                    </td>
                                    <td class="cell">
                                        2 Agustus 2022
                                    </td>
                                    <td class="cell">
                                        5 Agustus 2022
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
                                        Adm Diana
                                    </td>
                                    <td class="cell">
                                        Diana A
                                    </td>
                                    <td class="cell">
                                        All Area
                                    </td>
                                    <td class="cell">
                                        Admin
                                    </td>
                                    <td class="cell">
                                        2 Agustus 2022
                                    </td>
                                    <td class="cell">
                                        5 Agustus 2022
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