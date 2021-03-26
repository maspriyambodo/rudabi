<div class="card" style="margin-top: -4%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>DIREKTORAT JENDERAL</b><br>Bimbingan Masyarakat Islam<br>
            <small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo date('d-m-Y'); ?></small>
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Sekertariat/Satker/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                        <div class="card-body rounded-circle dataangka">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-sitemap" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka">
                                    <?php echo number_format($total['satker'][0]->satker); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px;font-size: 20px;color:black;">
                                <b style="color: black;">Data Satker</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Sekertariat/Usulan/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y")))); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                        <div class="card-body rounded-circle dataangka">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-chart-line" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka">
                                    <?php echo number_format($total['satker'][1]->usulan_triwulan); ?>
                                </b>
                                <center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color:black;">
                                <b style="color: black;">Usulan Triwulan</b>
                            </div>
                            <center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Sekertariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y")))); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                        <div class="card-body rounded-circle dataangka">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="far fa-thumbs-up" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka">
                                    <?php echo number_format($total['satker'][3]->approved_usulan); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Approved Usulan</b>
                            </div>
                            <center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Sekertariat/Sicakep/Pegawai/index'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                        <div class="card-body rounded-circle dataangka">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-users" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka">
                                    <?php echo number_format($total['sicakep'][0]->data_pegawai); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Data Pegawai</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Sekertariat/Sicakep/Pensiun/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                        <div class="card-body rounded-circle dataangka">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-house-user" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka">
                                    <?php echo number_format($total['sicakep'][1]->data_pensiun); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Data Pensiun</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Binsyar/Sihat/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b rounded-circle rounded-circleya">
                        <div class="card-body rounded-circle rounded-circleya dataangka2">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-tools" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka2">
                                    <?php echo number_format($total['sihat'][0]->alat_hisab_rukyat); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Alat Hisab Rukyat</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b rounded-circle rounded-circleya">
                        <div class="card-body rounded-circle rounded-circleya dataangka2">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-user-tie" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka2">
                                    <?php echo number_format($total['sihat'][1]->tenaga_ahli); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Tenaga Ahli</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Binsyar/Pengukuran/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b rounded-circle rounded-circleya">
                        <div class="card-body rounded-circle rounded-circleya dataangka2">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-ruler-combined" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka2">
                                    <?php echo number_format($total['sihat'][2]->hisab_pengukuran); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Hisab Pengukuran</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Binsyar/Simas/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b rounded-circle rounded-circleya">
                        <div class="card-body rounded-circle rounded-circleya dataangka2">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-mosque" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka2">
                                    <?php echo number_format($total['simas'][0]->data_masjid); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Data Masjid</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Binsyar/Mushalla/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b rounded-circle rounded-circleya">
                        <div class="card-body rounded-circle rounded-circleya dataangka2">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka2">
                                    <?php echo number_format($total['simas'][1]->data_mushalla); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Data Mushalla</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('KUA/Bimwin/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b rounded-circle rounded-circlepaket">
                        <div class="card-body rounded-circle rounded-circlepaket dataangka3">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="far fa-list-alt" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka3">
                                    <?php echo number_format($total['bimwin'][1]->jumlah_peserta); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                               <b style="color: black;">Target Catin</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('BKKS/Catin/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b rounded-circle rounded-circlepaket">
                        <div class="card-body rounded-circle rounded-circlepaket dataangka3">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-home" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka3">
                                    <?php echo number_format($total['bimwin'][0]->realisasi_wilayah); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Data Realisasi Catin</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Emonev/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b rounded-circle rounded-circlepaket">
                        <div class="card-body rounded-circle rounded-circlepaket dataangka3">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="far fa-chart-bar" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka3">
                                    <?php echo number_format($total['monev'][0]->rekap_data_kua); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Jumlah Data KUA</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Simpenghulu/Penghulu/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b rounded-circle rounded-circlepaket">
                        <div class="card-body rounded-circle rounded-circlepaket dataangka3">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-user-tie" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka3">
                                    <?php echo number_format($total['simpenghulu'][1]->data_penghulu); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color:black;">
                                <b style="color: black;">Data Penghulu</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Simpenghulu/Peristiwa/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b rounded-circle rounded-circlepaket">
                        <div class="card-body rounded-circle rounded-circlepaket dataangka3">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-restroom" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka3">
                                    <?php echo number_format($total['simpenghulu'][2]->data_peristiwa_nikah); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Peristiwa Nikah</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo site_url('PAI/Epai/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b rounded-circle rounded-circlesiap">
                        <div class="card-body rounded-circle rounded-circlesiap dataangka4">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-user-tie" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka4">
                                    <?php echo number_format($total['penyuluh'][0]->penyuluh); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Penyuluh Agama Islam</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('PAI/Ormas/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b rounded-circle rounded-circlesiap">
                        <div class="card-body rounded-circle rounded-circlesiap dataangka4">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="far fa-flag" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka4">
                                    <?php echo number_format($total['simpenais'][5]->ormas_islam); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Ormas Islam</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('PAI/LPTQ/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b rounded-circle rounded-circlesiap">
                        <div class="card-body rounded-circle rounded-circlesiap dataangka4">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-quran" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka4">
                                    <?php echo number_format($total['simpenais'][8]->lptq); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">L P T Q</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b rounded-circle rounded-circlesiap">
                        <div class="card-body rounded-circle rounded-circlesiap dataangka4">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-book-reader" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka4">
                                    <?php echo number_format($total['pustaka'][3]->total); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black">
                                <b style="color: black;">Pustaka Digital</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Siwak/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b rounded-circle rounded-circlesiap">
                        <div class="card-body rounded-circle rounded-circlesiap dataangka4">
                            <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center>
                                <i class="fas fa-hand-holding-heart" style="font-size: 48px;color: black;"></i>
                                </center>
                                <center>
                                <b style="font-size: 30px;color: black;margin-left: 10px;" class="dataangka4">
                                    <?php echo number_format($total['siwak'][0]->tanah_wakaf); ?>
                                </b>
                                </center>
                            </span>
                            </center>
                            <center>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;color: black;">
                                <b style="color: black;">Total Data Wakaf</b>
                            </div>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    <!--begin::Item-->
    <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="" data-placement="right" data-original-title="Dashboard Sekretariat">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="<?php echo base_url('Users/Sekretariat/Dashboard/index/'); ?>" target="_blank">
            <i class="fas fa-sitemap"></i>
        </a>
    </li>
    <!--end::Item-->

    <!--begin::Item-->
    <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Dashboard URAIS & BINSYAR">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" href="<?php echo base_url('Users/Binsyar/Dashboard/index/'); ?>" target="_blank">
            <i class="fas fa-mosque"></i>
        </a>
    </li>
    <!--end::Item-->

    <!--begin::Item-->
    <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Bina KUA & Keluarga Sakinah">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="<?php echo base_url('Users/BKKS/Dashboard/index/'); ?>" target="_blank">
            <i class="fas fa-restroom"></i>
        </a>
    </li>
    <!--end::Item-->

    <!--begin::Item-->
    <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="left" data-original-title="Dashboard PENAIS">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="<?php echo base_url('Users/PAI/Dashboard/index/'); ?>" target="_blank">
            <i class=" far fa-lightbulb "></i>
        </a>
    </li>

    <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="left" data-original-title="Dashboard Wakaf">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="<?php echo base_url('Users/Siwak/Dashboard/index/'); ?>" target="_blank">
            <i class="fas fa-hand-holding-heart"></i>
        </a>
    </li>
    <!--end::Item-->
</ul>
