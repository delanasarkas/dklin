<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url("/assets/images/logo.png") ?>">
    <title>DKLIN LAUNDRY | <?= $title; ?></title>
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url("assets/templateauth/css/portal.css") ?>">

    <!-- FontAwesome JS-->
    <script defer src="<?= base_url("assets/templateauth/plugins/fontawesome/js/all.min.js") ?>"></script>

    <style>
        body {
            background: rgb(204,204,204); 
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
        }
        page[size="A4"] {  
            width: 21cm;
            height: 29.7cm; 
        }

        @media print {
            body, page {
                margin: 0 !important;
                box-shadow: 0 !important;
            }
        }

        @media print {
            .col-md-1,.col-md-2,.col-md-3,.col-md-4,
            .col-md-5,.col-md-6,.col-md-7,.col-md-8, 
            .col-md-9,.col-md-10,.col-md-11,.col-md-12 {
                float: left;
            }

            .col-md-1 {
                width: 8%;
            }
            .col-md-2 {
                width: 16%;
            }
            .col-md-3 {
                width: 25%;
            }
            .col-md-4 {
                width: 33%;
            }
            .col-md-5 {
                width: 42%;
            }
            .col-md-6 {
                width: 50%;
            }
            .col-md-7 {
                width: 58%;
            }
            .col-md-8 {
                width: 66%;
            }
            .col-md-9 {
                width: 75%;
            }
            .col-md-10 {
                width: 83%;
            }
            .col-md-11 {
                width: 92%;
            }
            .col-md-12 {
                width: 100%;
            }
        }

        .hr-1 {
            display: block;
            height: 6px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 6px #aaa;
        }

        .hr-2 {
            display: block;
            height: 1px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 1px #aaa;
        }
    </style>
</head>
<body onload="window.print()">
    <page size="A4">
        <div class="row p-3">
            <div class="col-md-6 align-self-center">
                <img class="img-fluid me-2" src="/assets/images/logo-full.png" alt="logo"/>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <i class="fas fa-house h6 me-1 text-info"></i>
                    <h5 class="fw-normal"><?= $data_general[0]['nama_general'] ?></h5>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fab fa-whatsapp h5 me-1 text-success"></i>
                    <h5 class="fw-normal"><?= $data_general[0]['contact_general'] ?></h5>
                </div>
                <div class="d-flex align-items-start">
                    <i class="fas fa-location-dot h5 me-1 text-danger"></i>
                    <h5 class="fw-normal"><?= $data_general[0]['alamat_general'] ?></h5>
                </div>
                <div class="d-flex justify-content-center border border-black">
                    <h5 class="m-1">No <?= $data_table[0]['no_nota'] ?></h5>
                </div>
            </div>

            <hr class="mt-3 mb-3 hr-1"/>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Nama</h6>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-capitalize fw-normal">: <?= $data_table[0]['nama_customer'] ?></h6>
                    </div>
                    <div class="col-md-4">
                        <h6>No HP</h6>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-capitalize fw-normal">: <?= $data_table[0]['telp_customer'] ?></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Tgl Masuk</h6>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-capitalize fw-normal">: <?= date('d F Y', strtotime($data_table[0]['created_at'])) ?></h6>
                    </div>
                    <div class="col-md-4">
                        <h6>Tgl Selesai</h6>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-capitalize fw-normal">: <?= date('d F Y', strtotime($data_table[0]['tgl_selesai'])) ?></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pelayanan</th>
                            <th scope="col">Banyak</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($data_layanan as $data) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $data['nama_layanan'] ?></td>
                            <td><?= $data_table[0]['id_layanan'] == $data['id_layanan'] ? $data_table[0]['berat'] : '-' ?></td>
                            <td><?= $data_table[0]['id_layanan'] == $data['id_layanan'] ? ($data['tipe_layanan'] == 'satuan' ? 'pcs' : 'kg') : '-' ?></td>
                            <td><?= $data_table[0]['id_layanan'] == $data['id_layanan'] ? 'Rp '. number_format($data['harga_layanan'], 0,',','.') : '-' ?></td>
                            <td><?= $data_table[0]['id_layanan'] == $data['id_layanan'] ? 'Rp '. number_format($data['harga_layanan'] * $data_table[0]['berat'], 0,',','.') : '-' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end">
                                <h4>
                                    Total <?= 'Rp '. number_format($data_table[0]['harga_layanan'] * $data_table[0]['berat'], 0,',','.') ?>
                                </h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="border border-black p-2 rounded">
                            <h6 class="fw-normal fst-italic">Jika barang tidak diambil dalam 1 bulan bukan tanggung jawab kami.</h6>
                        </div>
                    </div>
                    <div class="col-md-6 text-center align-self-center">
                        <h3 class="text-uppercase"><?= $data_table[0]['status'] ?></h3>
                        <p class="fst-italic" style="margin-top: -10px"><?= $data_table[0]['nama_pembayaran'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <p class="fw-bold">Tanda Terima</p>

                        <p style="margin-top: 60px" class="text-capitalize"><?= $data_table[0]['nama_customer'] ?></p>
                        <hr class="hr-2"/>
                    </div>

                    <div class="col-md-6 text-center">
                        <p class="fw-bold">Hormat Kami</p>

                        <p style="margin-top: 60px" class="text-capitalize"><?= $data_table[0]['username'] ?></p>
                        <hr class="hr-2"/>
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>
</html>