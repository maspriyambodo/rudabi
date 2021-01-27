<div class="card" style="margin-top: -4%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>DIREKTORAT</b><br>Urusan Agama Islam &amp; Pembinaan Syariah<br>
            <small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo $inpo;?></small>
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Users/Binsyar/Simas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][0]->data_masjid); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Total Masjid</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_masjid'][2]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Masjid Jami</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_masjid'][1]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Masjid di Tempat Publik</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_masjid'][3]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Masjid Besar</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_masjid'][0]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Masjid Agung</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][1]->data_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Total Mushalla</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_mushalla'][0]->dt_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Mushalla Perumahan</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_mushalla'][1]->dt_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Mushalla di Tempat Publik</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_mushalla'][3]->dt_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Mushalla Pendidikan</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['tipo_mushalla'][2]->dt_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Mushalla Perkantoran</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <a href="<?php echo base_url('Users/Binsyar/Sihat/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['sihat'][0]->alat_hisab_rukyat); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Alat Hisab Rukyat</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['alat'][0]->gps); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Jumlah GPS</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['alat'][0]->theodolit); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Jumlah Theodolit</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['alat'][0]->teropong); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Jumlah Teropong</div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;"><?php echo number_format($total['alat'][0]->binoculer); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">Jumlah Binoculer</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-book-reader" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['pustaka'][3]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Pustaka Digital
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['pustaka'][2]->jumlah_publisher); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Jumlah Publisher
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['pustaka'][1]->jumlah_author); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Jumlah Author
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['pustaka'][0]->jumlah_buku); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Jumlah Buku
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md">
                    <a href="javascript:void(0)" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['pustaka'][4]->jumlah_topic); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Jumlah Topic Buku
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
