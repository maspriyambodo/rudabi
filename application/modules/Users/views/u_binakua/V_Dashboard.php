<div class="card" style="margin-top: -5%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>DIREKTORAT</b><br>Bina KUA &amp; Keluarga Sakinah<br>
            <small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo $inpo; ?></small>
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Bimwin/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-poll" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['bimwin'][1]->jumlah_peserta); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Target Catin</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Catin/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-restroom" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['bimwin'][0]->realisasi_wilayah); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Catin</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Fasilitator/index/' . date("Y")); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-shapes" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['bimwin'][2]->fasilitator_bimwin); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Fasilitator Bimwin</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Emonev/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-archive" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][0]->rekap_data_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Rekap Data KUA</div>
                        </div>
                    </a>
                </div>   
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Simkah/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-chart-pie" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][7]->penggunaan_simkah); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Penggunaan SIMKAH</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Penilaian/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-archive" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][3]->rekapitulasi_penilaian_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Rekapitulasi Penilaian KUA</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/KUA/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-poll" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenghulu'][0]->data_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data KUA</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Penghulu/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-user-tie" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenghulu'][1]->data_penghulu); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Penghulu</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Tipologi/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-building" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][1]->tipologi_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Tipologi KUA</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Tanah/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-file-alt" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][2]->status_tanah_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Status Tanah KUA</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Bangunan/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-building" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][6]->status_bangunan_kua); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Status Bangunan KUA</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="<?php echo base_url('Users/BKKS/Registrasi/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-archive" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['monev'][8]->rekapitulasi_registrasi); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Rekapitulasi Registrasi</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
