<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
    <head>
        <base href="<?php echo base_url('Signin'); ?>" />
        <meta charset="utf-8" />
        <title>{siteTitle}</title>
        <meta name="description" content="Login System" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/base/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/menu/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/brand/dark.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/aside/dark.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/login-1.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon"/>
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid owl-carousel" id="kt_login">
                <div class="login-aside d-flex flex-row-auto flex-grow-1">
                    <div class="d-flex flex-row-fluid flex-column login-img-bg"></div>
                </div>
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 ml-auto mr-auto">
                    <div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
                        <div class="login-form login-signin">
                            <a href="#" class="text-center nav-brand"> <img src="https://simas.kemenag.go.id/assets/img/rudabilogo.png" style="width:70%;" alt="Rudabi Logo" /> </a>
                            <h3 class="login-title">Sign in to system</h3>
                            <form class="form" novalidate="novalidate" id="kt_login_signin_form" action="<?php echo base_url('Auth/Signin/'); ?>" method="post">
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                                    <input class="form-control form-control-solid h-auto rounded-md" type="text" name="username" autocomplete="off" required=""/>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                    </div>
                                    <input class="form-control form-control-solid h-auto rounded-md" type="password" name="password" autocomplete="off" required="" />
                                </div>
                                <div class="pb-lg-0 pb-10">
                                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                                    <?php echo $this->session->flashdata('error'); ?>
                                    <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                                </div>
                            </form>
                            <div class="login-footer"><?php
                                $app_year = $this->bodo->Sys('app_year');
                                $now = date('Y');
                                if ($now == $app_year) {
                                    echo $now . ' &copy;';
                                } else {
                                    echo $app_year . '-' . $now . ' &copy;';
                                }
                                ?> RUDABI | Ditjen Bimas Islam</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
        <?php unset($_SESSION['err_msg']); ?>
        <script src="<?php echo base_url('assets/plugins/global/plugins.bundle.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script>
            var a;
            a = $('input[name="err_msg"]').val();
            if (a != "") {
                toastr.error(a);
            }
            var KTAppSettings = {breakpoints: {sm: 576, md: 768, lg: 992, xl: 1200, xxl: 1200}, colors: {theme: {base: {white: "#ffffff", primary: "#6993FF", secondary: "#E5EAEE", success: "#1BC5BD", info: "#8950FC", warning: "#FFA800", danger: "#F64E60", light: "#F3F6F9", dark: "#212121"}, light: {white: "#ffffff", primary: "#E1E9FF", secondary: "#ECF0F3", success: "#C9F7F5", info: "#EEE5FF", warning: "#FFF4DE", danger: "#FFE2E5", light: "#F3F6F9", dark: "#D6D6E0"}, inverse: {white: "#ffffff", primary: "#ffffff", secondary: "#212121", success: "#ffffff", info: "#ffffff", warning: "#ffffff", danger: "#ffffff", light: "#464E5F", dark: "#ffffff"}}, gray: {"gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121"}}, "font-family": "Poppins"};</script>
        <script src="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/scripts.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/pages/custom/login/login.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    </body>
</html>
