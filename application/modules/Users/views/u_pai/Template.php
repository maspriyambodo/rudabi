<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8;">
        <meta property="og:image" content="https://simas.kemenag.go.id/assets/img/rudabilogo.png">
        <meta property='og:title' content='{title}'>
        <meta property='og:description' content='Rudabi - Rumah Data Bimas Islam Kementerian Agama RI'>
        <meta property='og:type' content='article'>
        <meta property='og:url' content='<?php echo base_url(); ?>'>
        <meta property="og:locale" content="en_US">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="description" content="Rudabi - Rumah Data Bimas Islam Kementerian Agama RI" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link rel="shortcut icon" href="https://simas.kemenag.go.id/assets/img/rudabilogo.png"/>
        <link href="<?php echo base_url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/base/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/header/menu/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/brand/dark.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/themes/layout/aside/light.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/custom.kemenag.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="https://simas.kemenag.go.id/assets/img/rudabilogo.png" />
        <?php
        if ($this->uri->segment(3) != "Dashboard") {
            echo '';
        } else {
            echo '<meta http-equiv="refresh" content="30">';
        }
        ?>
        <title>{title}</title>
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading<?php
    if ($this->uri->segment(3) != "Dashboard") {
        echo '';
    } else {
        echo ' aside-minimize';
    }
    ?>">
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed"><a href="index.html"><img alt="Logo" src="https://simas.kemenag.go.id/assets/img/rudabilogo.png" style="width:35%;"/></a>
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
                <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle"><span class="svg-icon svg-icon-xl"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></button>
            </div>
        </div>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <div class="brand flex-column-auto" id="kt_brand">
                        <a href="<?php echo base_url('Dashboard/index/'); ?>" class="brand-logo">
                            <img alt="Logo" src="https://simas.kemenag.go.id/assets/img/rudabilogo.png" style="width:50%;" /></a>
                        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle"><span class="svg-icon svg-icon svg-icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" /><path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" /></g></svg></span></button>
                    </div>
                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                            <ul class="menu-nav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Users/PAI/Dashboard/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">Simpenais</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Budayawan/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Budayawan</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Dewan/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Dewan Hakim</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Guru_ngaji/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Guru Ngaji</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Hafiz/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Hafidz</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Kaligrafer/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Kaligrafer</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Dakwah/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Lembaga Dakwah</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/LPTQ/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">L P T Q</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Majelis/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Majelis Taklim</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Mufassir/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Mufassir</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Ormas/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Ormas Islam</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Penulis/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Penulis Islam</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/N_pns/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Penyuluh Non-PNS</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Pns/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Penyuluh PNS</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Qari/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Qari</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Radio_Islam/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Radio Islam</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Seni_Islam/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Seni Islam</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Seniman/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Seniman</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="<?php echo base_url('Users/PAI/Epai/index/'); ?>" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">e-PAI</span><span class="menu-label"></span>
                                    </a>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">SYSTEM</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Users/Manage/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-users-cog"></i>
                                        </span>
                                        <span class="menu-text">User Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <div id="kt_header" class="header header-fixed">
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default"></div>
                            </div>
                            <div class="topbar">
                                <div class="dropdown" id="kt_quick_search_toggle">
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                        <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1"><span class="svg-icon svg-icon-xl svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></div>
                                    </div>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                        <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                            <form method="get" class="quick-search-form">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="svg-icon svg-icon-lg"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></span>
                                                    </div><input type="text" class="form-control" placeholder="Search..." />
                                                    <div class="input-group-append"><span class="input-group-text"><i class="quick-search-close ki ki-close icon-sm text-muted"></i></span></div>
                                                </div>
                                            </form>
                                            <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle"> <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span><span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{username}</span>
                                        <span class="symbol symbol-35 symbol-light-success">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <script src="<?php echo base_url('assets/plugins/global/plugins.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/js/scripts.bundle.js?v=7.0.6'); ?>"></script>
                        <script src="<?php echo base_url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js'); ?>"></script>
                        <script src="<?php echo base_url('assets/js/pages/widgets.js'); ?>"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>
                        <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js" type="text/javascript"></script>
                        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/frozen.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
                        <div class="d-flex flex-column-fluid"><div class="container-fluid">{content}</div></div>
                    </div>
                    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="text-dark order-2 order-md-1"><span class="text-muted font-weight-bold mr-2"><?php echo $this->bodo->Since(); ?> &copy;</span><a href="https://kemenag.go.id" target="_blank" class="text-dark-75 text-hover-primary">RUDABI | Ditjen Bimas Islam</a></div>
                            <div class="nav nav-dark"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
            <!--begin::Header-->
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <h3 class="font-weight-bold m-0">
                    User Profile
                </h3>
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
            <!--end::Header-->

            <!--begin::Content-->
            <div class="offcanvas-content pr-5 mr-n5">
                <!--begin::Header-->
                <div class="d-flex align-items-center mt-5">
                    <div class="symbol symbol-100 mr-5">
                        <div class="symbol-label" style="background-image:url('<?php echo base_url('assets/media/misc/bg-1.jpg'); ?>')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                            {username}
                        </a>
                        <div class="text-muted mt-1">
                            Administrator
                        </div>
                        <div class="navi mt-2">
                            <span class="navi-text text-muted text-hover-primary">
                                Penerangan Agama Islam
                            </span>

                            <a href="<?php echo base_url('Auth/Logout/'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                                Sign Out
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Separator-->
                <div class="separator separator-dashed mt-8 mb-5"></div>
                <!--end::Separator-->

                <!--begin::Nav-->
                <div class="navi navi-spacer-x-0 p-0">
                    <!--begin::Item-->
                    <a href="javascript:void(0)" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-success"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>						</div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    My Profile
                                </div>
                                <div class="text-muted">
                                    Account settings and more
                                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->

                    <!--begin::Item-->
                    <a href="javascript:void(0)"  class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-warning"><!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
                                        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span> 					   </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    My Messages
                                </div>
                                <div class="text-muted">
                                    Inbox and tasks
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->

                    <!--begin::Item-->
                    <a href="javascript:void(0)"  class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-danger"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    My Activities
                                </div>
                                <div class="text-muted">
                                    Logs and notifications
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>						</div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    My Tasks
                                </div>
                                <div class="text-muted">
                                    latest tasks and projects
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->
                </div>
                <!--end::Nav-->

                <!--begin::Separator-->
                <div class="separator separator-dashed my-7"></div>
                <!--end::Separator-->
            </div>
            <!--end::Content-->
        </div>
        <div id="kt_scrolltop" class="scrolltop"><span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" /><path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></div>
        <script>
            var pageUrl = window.location.origin + window.location.pathname;
            var menu = $('.aside-menu .menu-nav li a[href="' + pageUrl + '"]').parent('li');
            menu.addClass('menu-item-active');
            var treeLi = menu.parent().parent().parent();
            treeLi.addClass('menu-item-open');
            var KTAppSettings = {breakpoints: {sm: 576, md: 768, lg: 992, xl: 1200, xxl: 1200}, colors: {theme: {base: {white: "#ffffff", primary: "#6993FF", secondary: "#E5EAEE", success: "#1BC5BD", info: "#8950FC", warning: "#FFA800", danger: "#F64E60", light: "#F3F6F9", dark: "#212121"}, light: {white: "#ffffff", primary: "#E1E9FF", secondary: "#ECF0F3", success: "#C9F7F5", info: "#EEE5FF", warning: "#FFF4DE", danger: "#FFE2E5", light: "#F3F6F9", dark: "#D6D6E0"}, inverse: {white: "#ffffff", primary: "#ffffff", secondary: "#212121", success: "#ffffff", info: "#ffffff", warning: "#ffffff", danger: "#ffffff", light: "#464E5F", dark: "#ffffff"}}, gray: {"gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121"}}, "font-family": "Poppins"};
        </script>
    </body>

</html>
