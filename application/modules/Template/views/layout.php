<!DOCTYPE html>
<?php
$this->bodo->Check_login();
$uname = $this->session->userdata('uname');
$fullname = $this->session->userdata('fullname');
?>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8;">
        <meta property="og:image" content="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>">
        <meta property='og:title' content='{siteTitle}'>
        <meta property='og:description' content='{description}'>
        <meta property='og:type' content='article'>
        <meta property='og:url' content='<?php echo base_url(); ?>'>
        <meta property="og:locale" content="en_US">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="description" content="{description}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php
        if ($this->uri->segment(1) != "Dashboard" and $this->uri->segment(2) != "Dashboard") {
            echo '';
            $aside = null;
        } else {
//            echo '<meta http-equiv="refresh" content="30">';
            $aside = ' aside-minimize';
        }
        ?>
        <title>{siteTitle}</title>
        <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/base/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/menu/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/brand/dark.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/aside/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>"/>
        <link href="<?php echo base_url('assets/css/custom.kemenag.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading<?php echo $aside; ?>">
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
            <a href="javascript:void(0);">
                <img alt="company_logo" src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" class="img-fluid" style="margin: 15px 0px;width: 30%;"/>
            </a>
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                    <span></span>
                </button>
                <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                    <span></span>
                </button>
                <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <i class="fas fa-user"></i>
                    </span>
                </button>
            </div>
        </div>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <div class="brand flex-column-auto" id="kt_brand" style="height:auto;">
                        <a href="javascript:void(0);" class="brand-logo">
                            <img alt="company_logo" src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" class="img-fluid" style="margin: 15px 0px;"/>
                        </a>
                        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                            <span class="svg-icon svg-icon svg-icon-xl">
                                <i class="fas fa-angle-double-left"></i>
                            </span>
                        </button>
                    </div>
                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                            <?php
                            $this->multi_menu->set_items($this->M_default->Menu()->result_array());
                            echo $this->multi_menu->render($item_active, $this->M_default->Group_menu());
                            ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <div id="kt_header" class="header header-fixed">
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default"><ul class="menu-nav"></ul></div>
                            </div>
                            <div class="topbar">
                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">
                                            Hi,
                                        </span>
                                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                                            <?php
                                            if ($fullname and strlen($fullname) <= 10) {
                                                echo $fullname;
                                            } else {
                                                echo $uname;
                                            }
                                            ?>
                                        </span>
                                        <span class="symbol symbol-35 symbol-light-success">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">{pagetitle}</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <?php
                                        foreach ($breadcrumb as $breadcrumb) {
                                            if ($breadcrumb['status']) {
                                                $class_active = ' active';
                                                $nama = $breadcrumb['nama'];
                                                $curpage = ' aria-current="page"';
                                            } else {
                                                $class_active = null;
                                                $nama = '<a href="' . $breadcrumb['link'] . '" class="text-muted"> ' . $breadcrumb['nama'] . '</a>';
                                                $curpage = null;
                                            }
                                            echo '<li class="breadcrumb-item' . $class_active . '"' . $curpage . '>' . $nama . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <script src="<?php echo base_url('assets/plugins/global/plugins.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/js/scripts.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js'); ?>"></script>
                        <script src="<?php echo base_url('assets/js/pages/widgets.js'); ?>"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous"></script>
                        <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
                        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/frozen.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
                        <div class="d-flex flex-column-fluid"><div class="container-fluid">{content}</div></div>
                    </div>
                    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted font-weight-bold mr-2">
                                    <?php
                                    $app_year = $this->bodo->Sys('app_year');
                                    $now = date('Y');
                                    if ($now == $app_year) {
                                        echo $now . ' &copy;';
                                    } else {
                                        echo $app_year . '-' . $now . ' &copy;';
                                    }
                                    ?>
                                </span>
                                <a href="javascript:void(0);" class="text-dark-75 text-hover-primary">
                                    <?php echo $this->bodo->Sys('app_name'); ?>
                                </a>
                            </div>
                            <div class="nav nav-dark">
                                <a href="javascript:void(0);" class="nav-link pl-0 pr-5"><?php echo $this->bodo->Sys('company_name'); ?></a>
                            </div>
                            <div class="text-center">Page rendered in <strong>{elapsed_time}</strong> seconds.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <h3 class="font-weight-bold m-0">
                    User Profile
                </h3>
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                    <i class="far fa-times-circle text-muted"></i>
                </a>
            </div>
            <div class="offcanvas-content pr-5 mr-n5">
                <div class="d-flex align-items-center mt-5">
                    <div class="symbol symbol-100 mr-5">
                        <div class="symbol-label" style="background-image:url('<?php echo site_url('assets/images/users/' . $this->session->userdata('avatar')); ?>')"></div>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                            <?php echo $this->session->userdata('uname'); ?>
                        </a>
                        <div class="navi mt-2">
                            <span class="navi-text text-muted text-hover-primary">
                                <?php echo $this->session->userdata('role_name'); ?>
                            </span>
                            <div class="clearfix"></div>
                            <a href="<?php echo base_url('Auth/Logout/'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                                Sign Out
                            </a>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed mt-8 mb-5"></div>
                <div class="navi navi-spacer-x-0 p-0">
                    <a href="<?php echo base_url('Change%20Password'); ?>" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-success">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Change Password
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="<?php echo base_url('Setting%20Profile'); ?>" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-success">
                                        <i class="fas fa-user-cog"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Profile Setting
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="separator separator-dashed my-7"></div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop"><span class="svg-icon"><i class="fas fa-arrow-up"></i></span></div>
        <!--        <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
                    
                </ul>-->
        <script>
            var KTAppSettings = {};
            var menu = $('.menu-item .menu-item-active').parent('ul').parent().parent();
            menu.addClass('menu-item-active menu-item-open');
        </script>
    </body>
</html>
