<!DOCTYPE html>
<html lang="en">

<head>
    <title>DKLIN | LOGIN</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="/assets/images/logo.png">

    <!-- FontAwesome JS-->
    <script defer src="assets/templateauth/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/templateauth/css/portal.css">

    <!-- TOASTR -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo" width="70px"></div>
                    <h2 class="auth-heading text-center mb-5">Log in Dashboard</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" method="POST" action="<?= base_url("/login/proses") ?>">
                            <div class="email mb-3">
                                <input id="username" name="username" type="text" class="form-control signin-email" placeholder="Username" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <input id="password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="showPassword">
                                            <label class="form-check-label" for="showPassword">
                                                Lihat Password
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>

                        <!-- <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="/register">here</a>.</div> -->
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">Created by <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> Diana Andini</small>

                    </div>
                </footer>
                <!--//app-auth-footer-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->

    <!-- JQUERY -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

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

    <!-- SHOW PASSWORD -->
    <script type="text/javascript">
        $(document).ready(function(){		
            $('#showPassword').click(function(){
                if($(this).is(':checked')){
                    $('#password').attr('type','text');
                }else{
                    $('#password').attr('type','password');
                }
            });
        });
    </script>
</body>

</html>