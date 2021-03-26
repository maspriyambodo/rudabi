<!DOCTYPE html>
<html lang="en" id="rudabi">
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
        <link href="<?php echo base_url('assets/css/gayaku.css'); ?>" rel="stylesheet" type="text/css" />
        <?php
        if ($this->uri->segment(1) != "Dashboard") {
            echo '';
        } else {
            echo '<meta http-equiv="refresh" content="30">';
        }
        ?>
        <title>{title}</title>
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading<?php
    if ($this->uri->segment(1) != "Dashboard") {
        echo '';
    } else {
        echo ' aside-minimize';
    }
    ?>">
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed"><a href="index.html"><img alt="Logo" src="https://simas.kemenag.go.id/assets/img/rudabilogo.png" style="width:35%;"/></a>
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
                <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle"><span></span></button>
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
                                    <a href="<?php echo base_url('Dashboard/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">Sekertariat</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        <span class="menu-text">e-SBSN</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">e-SBSN</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Satker/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">SATKER</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Usulan/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Usulan Triwulan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Input/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Input Triwulan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Approved Usulan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-chart-line"></i>
                                        </span>
                                        <span class="menu-text">SICAKEP</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">SICAKEP</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Sicakep/Pegawai/index'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Pegawai</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Sekertariat/Pensiun/index'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Pensiun</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">urais & binsyar</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-toolbox"></i>
                                        </span>
                                        <span class="menu-text">SIHAT</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">SIHAT</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Sihat/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Alat Hisab Rukyat</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Tenaga Ahli</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Pengukuran/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Hisab Pengukuran</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Lokasi/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Hisab Lokasi</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Laporan/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Hisab Laporan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Lintang/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Lintang Kota</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-mosque"></i>
                                        </span>
                                        <span class="menu-text">Simas</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">Simas</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Simas/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Masjid</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Mushalla/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Mushalla</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Tipologi/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Masjid Tipologi</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Binsyar/Tipologi/Mushalla/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Mushalla Tipologi</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">Bina KUA & Keluarga Sakinah</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-ring"></i>
                                        </span>
                                        <span class="menu-text">BIMWIN</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">BIMWIN</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('KUA/Bimwin/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Target Catin</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('BKKS/Catin/index'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Catin</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('BKKS/Fasilitator/index/' . date("Y") . ''); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Fasilitator Bimwin</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </span>
                                        <span class="menu-text">e-Monev</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">e-Monev</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Rekap Data KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Tipologi/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Tipologi KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Tanah/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Status Tanah KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Penilaian/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Rekapitulasi Penilaian KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Rekap/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Rekapitulasi Data KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Isian/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Rekap Isian KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Bangunan/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Status Bangunan KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Simkah/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Penggunaan SIMKAH</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Emonev/Registrasi/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Rekapitulasi Registrasi</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-handshake"></i>
                                        </span>
                                        <span class="menu-text">Simpenghulu</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">Simpenghulu</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Simpenghulu/KUA/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data KUA</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Simpenghulu/Penghulu/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Penghulu</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Simpenghulu/Peristiwa/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Peristiwa Nikah</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('Simpenghulu/Nikah_Rujuk/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Data Nikah &AMP; Rujuk</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">Penerangan Agama Islam</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="far fa-lightbulb"></i>
                                        </span>
                                        <span class="menu-text">Simpenais</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">Simpenais</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Pns/index'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Penyuluh PNS</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/N_pns/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Penyuluh non-PNS</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Majelis/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Majelis Taklim</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Seni_Islam/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Seni Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Dakwah/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Lembaga Dakwah</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Ormas/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Ormas Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Dewan/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Dewan Hakim</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Guru_ngaji/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Guru Ngaji</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/LPTQ/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">L P T Q</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Hafiz/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Hafidz</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Qari/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Qari</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Mufassir/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Mufassir</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Kaligrafer/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Kaligrafer</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Seniman/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Seniman</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Budayawan/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Budayawan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Radio_Islam/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Radio Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?php echo base_url('PAI/Penulis/index/'); ?>" class="menu-link menu-toggle">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">Penulis Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('PAI/Epai/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </span>
                                        <span class="menu-text">E-PAI</span>
                                    </a>
                                </li>
                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">Pemberdayaan Zakat & Wakaf</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Siwak/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-hand-holding-heart"></i>
                                        </span>
                                        <span class="menu-text">Siwak</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-white user-select-none">SYSTEM</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Auth/Management/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-users-cog"></i>
                                        </span>
                                        <span class="menu-text">User Management</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Auth/Subdit/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-code-branch"></i>
                                        </span>
                                        <span class="menu-text">Sub Direktorat</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="<?php echo base_url('Auth/Security/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </span>
                                        <span class="menu-text">Security</span>
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
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                    <ul class="menu-nav">
                                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="javascript:" class="menu-link menu-toggle">
                                                <span class="menu-text">
                                                    Sekretariat
                                                </span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="" data-hor-direction="menu-submenu-left" kt-hidden-height="160">
                                                <div class="menu-subnav">
                                                    <ul class="menu-content">
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    e-SBSN
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Satker/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Satker</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Usulan/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Usulan Triwulan</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Input/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Input Triwulan</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Approved Usulan</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    SICAKEP
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Sicakep/Pegawai/index'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Pegawai</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Sekertariat/Pensiun/index'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Pensiun</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="javascript:" class="menu-link menu-toggle">
                                                <span class="menu-text">
                                                    URAIS &amp; BINSYAR
                                                </span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="" data-hor-direction="menu-submenu-left" kt-hidden-height="160">
                                                <div class="menu-subnav">
                                                    <ul class="menu-content">
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    SIHAT
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Sihat/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Alat Hisab Rukyat</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Tenaga Ahli</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Pengukuran/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Hisab Pengukuran</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Lokasi/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Hisab Lokasi</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Laporan/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Hisab Laporan</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Lintang/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Lintang Kota</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    SIMAS
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Simas/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Masjid</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Mushalla/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Mushalla</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Tipologi/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Masjid Tipologi</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Binsyar/Tipologi/Mushalla/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Mushalla Tipologi</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="javascript:" class="menu-link menu-toggle">
                                                <span class="menu-text">
                                                    Bina KUA &amp; Keluarga Sakinah
                                                </span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="" data-hor-direction="menu-submenu-left" kt-hidden-height="160">
                                                <div class="menu-subnav">
                                                    <ul class="menu-content">
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    BIMWIN
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('KUA/Bimwin/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Target Catin</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('BKKS/Catin/index'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Catin</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('BKKS/Fasilitator/index/' . date("Y") . ''); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Fasilitator BIMWIN</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    e-Monev
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Rekap Data KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Tipologi/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Tipologi KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Tanah/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Status Tanah KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Penilaian/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Rekapitulasi Penilaian KUA</span>
                                                                    </a>
                                                                </li>

                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Rekap/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Rekapitulasi Data KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Isian/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Rekap Isian KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Bangunan/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Status Bangunan KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Simkah/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Penggunaan SIMKAH</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Emonev/Registrasi/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Rekapitulasi Registrasi</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    Simpenghulu
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Simpenghulu/KUA/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data KUA</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Simpenghulu/Penghulu/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Penghulu</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Simpenghulu/Peristiwa/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Peristiwa Nikah</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('Simpenghulu/Nikah_Rujuk/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Data Nikah &amp; Rujuk</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="javascript:" class="menu-link menu-toggle">
                                                <span class="menu-text">
                                                    PENAIS
                                                </span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="" data-hor-direction="menu-submenu-left" kt-hidden-height="160">
                                                <div class="menu-subnav">
                                                    <ul class="menu-content">
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    Simpenais
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Pns/index'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Penyuluh PNS</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/N_pns/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Penyuluh Non-PNS</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Majelis/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Majelis Taklim</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Seni_Islam/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Seni Islam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Dakwah/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Lembaga Dakwah</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Ormas/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Ormas Islam</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Budayawan/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Budayawan</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Radio_Islam/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Radio Islam</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">

                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Dewan/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Dewan Hakim</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Guru_ngaji/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Guru Ngaji</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/LPTQ/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">L P T Q</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Hafiz/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Hafidz</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Qari/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Qari</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Mufassir/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Mufassir</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Kaligrafer/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Kaligrafer</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Seniman/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Seniman</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Penulis/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Penulis Islam</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu-item">
                                                            <h3 class="menu-heading menu-toggle">
                                                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                <span class="menu-text">
                                                                    e-PAI
                                                                </span>
                                                                <i class="menu-arrow"></i>
                                                            </h3>
                                                            <ul class="menu-inner">
                                                                <li class="menu-item" aria-haspopup="true">
                                                                    <a href="<?php echo base_url('PAI/Epai/index/'); ?>" class="menu-link">
                                                                        <i class="menu-bullet menu-bullet-line"><span></span></i>
                                                                        <span class="menu-text">Penyuluh Agama Islam</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo base_url('Siwak/index/'); ?>" class="menu-link">
                                                <span class="menu-text">
                                                    Wakaf
                                                </span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="topbar">
                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" title="Full Screen" onclick="openFullscreen()">
                                        <i class="fas fa-expand"></i>
                                    </div>
                                </div>

                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">
                                            Hi,
                                        </span>
                                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                                            {username}
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
                            Super User
                        </div>
                        <div class="navi mt-2">
                            <span class="navi-text text-muted text-hover-primary">
                                Bimas Islam
                            </span>
                            <div class="clearfix"></div>
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
                    <a href="<?php echo base_url('Auth/Management/'); ?>" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-success">
                                        <i class="fas fa-users-cog"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Users Management
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->

                    <!--begin::Item-->
                    <a href="<?php echo base_url('Auth/Subdit/'); ?>"  class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-warning">
                                        <i class="fas fa-code-branch"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Role User
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->

                    <!--begin::Item-->
                    <a href="<?php echo base_url('Auth/Security/index/'); ?>"  class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-md svg-icon-danger">
                                        <i class="fas fa-shield-alt text-success"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Security
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
        <!--        <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
                    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close"><i class="ki ki-close icon-xs text-muted"></i></a>
                    </div>
                    <div class="offcanvas-content pr-5 mr-n5">
                        <div class="d-flex align-items-center mt-5">
                            <div class="symbol symbol-100 mr-5">
                                <i class="fas fa-user" style="font-size: 5.25rem;"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{username}</a>
                                <div class="text-muted mt-1"></div>
                                <div class="navi mt-2">
                                    <a href="#" class="navi-item"></a>
                                    <a href="<?php echo base_url('Auth/Logout/'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                                        Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed mt-8 mb-5"></div>
                    </div>
                </div>-->
        <div id="kt_scrolltop" class="scrolltop"><span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" /><path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></div>
        <script>
                                        var elem = document.getElementById("rudabi");
                                        function openFullscreen() {
                                            if (elem.requestFullscreen) {
                                                elem.requestFullscreen();
                                            } else if (elem.webkitRequestFullscreen) { /* Safari */
                                                elem.webkitRequestFullscreen();
                                            } else if (elem.msRequestFullscreen) { /* IE11 */
                                                elem.msRequestFullscreen();
                                            } else {
                                                elem.exitFullscreen();
                                            }
                                        }
                                        var pageUrl = window.location.origin + window.location.pathname;
                                        var menu = $('.aside-menu .menu-nav li a[href="' + pageUrl + '"]').parent('li');
                                        menu.addClass('menu-item-active');
                                        var treeLi = menu.parent().parent().parent();
                                        treeLi.addClass('menu-item-open');
                                        var KTAppSettings = {breakpoints: {sm: 576, md: 768, lg: 992, xl: 1200, xxl: 1200}, colors: {theme: {base: {white: "#ffffff", primary: "#6993FF", secondary: "#E5EAEE", success: "#1BC5BD", info: "#8950FC", warning: "#FFA800", danger: "#F64E60", light: "#F3F6F9", dark: "#212121"}, light: {white: "#ffffff", primary: "#E1E9FF", secondary: "#ECF0F3", success: "#C9F7F5", info: "#EEE5FF", warning: "#FFF4DE", danger: "#FFE2E5", light: "#F3F6F9", dark: "#D6D6E0"}, inverse: {white: "#ffffff", primary: "#ffffff", secondary: "#212121", success: "#ffffff", info: "#ffffff", warning: "#ffffff", danger: "#ffffff", light: "#464E5F", dark: "#ffffff"}}, gray: {"gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121"}}, "font-family": "Poppins"};
        </script>
    </body>

</html>
