<div class="card" style="margin-top: -5%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>SEKRETARIAT</b><br>Direktorat Jendral Bimas Islam<br>
                <small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo $inpo;?></small>
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <!-- <div class="col">
                    <a href="<?php //echo base_url('Users/Sekretariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . '');  ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-thumbs-up" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php //echo number_format($data['satker'][3]->approved_usulan);  ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Approved Usulan</div>
                        </div>
                    </a>
                </div> -->
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pegawai/index'); ?>" class="card card-custom bg-success bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-users" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][0]->data_pegawai); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Pegawai</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pegawai/index'); ?>" class="card card-custom bg-success bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-male" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][2]->laki_laki); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Pegawai Laki</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pegawai/index'); ?>" class="card card-custom bg-success bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-female" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][3]->wanita); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Pegawai Wanita</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Satker/index/'); ?>" class="card card-custom bg-info bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="flaticon-map" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['satker'][0]->satker); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Satker</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Usulan/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y"))) . ''); ?>" class="card card-custom bg-info bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-chart-line" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['satker'][1]->usulan_triwulan); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Usulan Triwulan</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Input/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="card card-custom bg-info bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-pencil-alt" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['satker'][2]->input_triwulan); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Input Triwulan</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="card card-custom bg-info bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-thumbs-up" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['satker'][3]->approved_usulan); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Approved Usulan</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="card card-custom bg-warning bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-house-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][1]->data_pensiun); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Pensiun</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="card card-custom bg-warning bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-address-card" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][5]->I); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Pensiun Golongan I</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="card card-custom bg-warning bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-address-card" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][6]->III); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Pensiun Golongan III</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="card card-custom bg-warning bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-address-card" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($data['sicakep'][7]->IV); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Pensiun Golongan IV</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
