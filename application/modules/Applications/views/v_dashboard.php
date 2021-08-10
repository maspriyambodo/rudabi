<div class="card">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10 animate__animated animate__fadeIn">
            <b>DIREKTORAT JENDERAL</b>
            <br>Bimbingan Masyarakat Islam
            <br><small class="text-muted" style="font-size: 16px;">Data Rudabi Terkini, <?php echo date('d-m-Y'); ?></small>
        </div>
    </div>
    <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
        <div class="row animate__animated animate__fadeIn">
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Binsyar/Sihat/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-tools" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="alat_sihat">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Alat Hisab Rukyat</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Binsyar/Ahli/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-user-tie" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="tenaga_ahli">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Tenaga Ahli</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Binsyar/Pengukuran/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-ruler-combined" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="hisab_pengukuran">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Hisab Pengukuran</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Binsyar/Simas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-mosque" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_masjid">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Data Masjid</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Binsyar/Mushalla/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-place-of-worship" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_mushalla">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Data Mushalla</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row animate__animated animate__fadeIn">
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Bimwin/Target/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="far fa-list-alt" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="jumlah_peserta">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Target Catin</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Bimwin/Catin/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-home" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="realisasi_wilayah">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Realisasi Catin</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Simpenghulu/KUA/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="far fa-chart-bar" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_kua">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Jumlah KUA</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Simpenghulu/Penghulu/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-user-tie" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_penghulu">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Jumlah Penghulu</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Simpenghulu/Peristiwa/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-restroom" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_peristiwa_nikah">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Peristiwa Nikah</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row animate__animated animate__fadeIn">
            <div class="col-md">
                <a href="<?php echo base_url('Applications/PAI/Pns/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-user-tie" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="penyuluh">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Penyuluh Agama Islam</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/PAI/Ormas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="far fa-flag" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="ormas_islam">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Ormas Islam</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/PAI/LPTQ/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-quran" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="lptq">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">L P T Q</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="javascript:void();" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-book-reader" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="pustaka_digital">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Pustaka Digital</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Siwak/Wakaf/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_wakaf">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Total Data Wakaf</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
        <div class="row animate__animated animate__fadeIn">
            <div class="col-md">
                <a href="<?php echo base_url('Applications/Simkah/index/?year=0'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_simkah">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Data SIMKAH</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url(''); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_baznas">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Data BAZNAS</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url(''); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count"  id="data_laznas">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">Data LAZNAS</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url(''); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_puslim">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">e-pustaka slims</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
            <div class="col-md">
                <a href="<?php echo base_url(''); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                <center>
                                    <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_mtq">0</b>
                                </center>
                            </span>
                        </center>
                        <center>
                            <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                <b style="color: black;">M T Q</b>
                            </div>
                        </center>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
        $.ajax({
            url: "<?php echo base_url('Applications/Simkah/Get_nikah?year=0'); ?>",
            async: false,
            type: 'GET',
            cache: true,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                var data1 = JSON.stringify(result.data);
                var obj = jQuery.parseJSON(data1);
                var i, arr, tot;
                tot = 0;
                for (i = 0; i < obj.length; i++) {
                    arr = parseFloat(obj[i].value);
                    tot += arr;

                }
                $('#data_simkah').attr('data-value', tot);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_masjid/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_masjid').attr('data-value', data[0].data_masjid);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });

        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_musholla/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_mushalla').attr('data-value', data[0].data_mushalla);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_sihat/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                $('#alat_sihat').attr('data-value', data[0].alat_hisab_rukyat);
                $('#tenaga_ahli').attr('data-value', data[1].tenaga_ahli);
                $('#hisab_pengukuran').attr('data-value', data[2].hisab_pengukuran);

                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });

        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_datacatin/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#jumlah_peserta').attr('data-value', data[0].jumlah_peserta);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_targetcatin/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#realisasi_wilayah').attr('data-value', data[0].realisasi_wilayah);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_penyuluh/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#penyuluh').attr('data-value', data[0].penyuluh);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_simpenghulu/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_kua').attr('data-value', data[0].data_kua);
                $('#data_penghulu').attr('data-value', data[1].data_penghulu);
                $('#data_peristiwa_nikah').attr('data-value', data[2].data_peristiwa_nikah);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_ormasislam/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#ormas_islam').attr('data-value', data[0].ormas_islam);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_lptq/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#lptq').attr('data-value', data[0].lptq);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_pustakadigital/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#pustaka_digital').attr('data-value', data[0].total);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });

        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_siwak/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_wakaf').attr('data-value', data[0].tanah_wakaf);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });

        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_baznas/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_baznas').attr('data-value', data[0].databaznas);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_laznas/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_laznas').attr('data-value', data[0].datalaznas);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_pustakaslim/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_puslim').attr('data-value', data[0].jumlah_buku);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });
        
        $.ajax({
            url: "<?php echo base_url('Applications/Dashboard/Get_mtq/'); ?>",
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#data_mtq').attr('data-value', data[0].total);
                $('.count').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).data('value')
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(numeral(now).format('0,0'));
                        }
                    });
                });
            }
        });

    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>