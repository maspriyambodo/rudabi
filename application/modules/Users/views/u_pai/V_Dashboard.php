<div class="card" style="margin-top: -5%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>DIREKTORAT</b><br>Penerangan Agama Islam<br>
                <small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo $inpo;?></small>
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Budayawan/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][14]->budayawan); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Budayawan Islam</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Dewan/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-user-tie" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][6]->dewan_hakim); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Dewan Hakim</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Guru_ngaji/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][7]->guru_ngaji); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Guru Ngaji</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Kaligrafer/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][12]->kaligrafer); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Kaligrafer</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Hafiz/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][9]->hafidz); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Hafidz</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Dakwah/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][4]->lembaga_dakwah); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Lembaga Dakwah</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Majelis/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][2]->majelis_taklim); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Majelis Taklim</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/LPTQ/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-quran" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][8]->lptq); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">L P T Q</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Mufassir/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-user" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][11]->mufassir); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Mufassir</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Ormas/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-flag" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][5]->ormas_islam); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Ormas Islam</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Penulis/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-book" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][16]->penulis_islam); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Lembaga Dakwah</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/N_pns/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosquefas fa-bullhorn" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][1]->penyuluh_nonpns); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Penyuluh Non-PNS</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Pns/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-bullhorn" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][0]->penyuluh_pns); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Penyuluh PNS</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Qari/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-music" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][10]->qari); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Qari</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Radio_Islam/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-broadcast-tower" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][15]->radio_islam); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Radio Islam</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Seni_Islam/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][3]->seni_islam); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Lembaga Seni Islam</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/PAI/Seniman/index/'); ?>" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-palette" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simpenais'][13]->seniman); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Seniman Islam</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>
    </div>
</div>
