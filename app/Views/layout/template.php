<!DOCTYPE html>
<html lang="en">

<head>
    <title>DKLIN LAUNDRY | <?= $title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="<?= base_url("/assets/images/logo.png") ?>">
    
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url("assets/templateauth/plugins/fontawesome/js/all.min.js") ?>"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?= base_url("assets/templateauth/css/portal.css") ?>">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- TOASTR -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- SELECT2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Charts JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="app">
    <header class="app-header fixed-top">
        <!-- header inner -->
        <?= $this->include("layout/header") ?>

        <!-- sidebar -->
        <?= $this->include("layout/sidebar") ?>
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <!-- content dynamic -->
            <?= $this->renderSection("content") ?>
        </div>
        <!--//app-content-->

        <!-- footer -->
        <?= $this->include("layout/footer") ?>
    </div>
    <!--//app-wrapper-->

    <!-- Javascript -->
    <script src="<?= base_url("assets/templateauth/plugins/popper.min.js") ?>"></script>
    <script src="<?= base_url("assets/templateauth/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>

    <!-- Page Specific JS -->
    <script src="<?= base_url("assets/templateauth/js/app.js") ?>"></script>

    <!-- Fontawesome 5 -->
    <script src="https://kit.fontawesome.com/09078660ee.js" crossorigin="anonymous"></script>

    <!-- Rupiah Format -->
    <script src="https://unpkg.com/@develoka/angka-rupiah-js/index.min.js"></script>

    <!-- SELECT2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#select-field').select2( {
            theme: 'bootstrap-5'
        } );

        $('#select-field-2').select2( {
            theme: 'bootstrap-5',
            dropdownParent: $("#modalDeposit")
        } );
    </script>

    <!-- TOASTR -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        <?php if(session()->get('success')){ ?>
            toastr.success("<?= session()->get('success'); ?>");
        <?php }else if(session()->get('error')){  ?>
            toastr.error("<?= session()->get('error'); ?>");
        <?php }else if(session()->get('warning')){  ?>
            toastr.warning("<?= session()->get('warning'); ?>");
        <?php }else if(session()->get('info')){  ?>
            toastr.info("<?= session()->get('info'); ?>");
        <?php } ?>
    </script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#example2').DataTable();
        });

        $(document).ready(function() {
            $('#example3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        title: 'Data Proses <?= date('F Y') ?>',
                    },
                    {
                        extend: 'excel',
                        title: 'Data Proses <?= date('F Y') ?>',
                    }
                ]
            });
        });

        $(document).ready(function() {
            $('#example5').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        title: 'Data Pengeluaran <?= date('F Y') ?>',
                    },
                    {
                        extend: 'excel',
                        title: 'Data Pengeluaran <?= date('F Y') ?>',
                    }
                ]
            });
        });
    </script>
</body>

</html>