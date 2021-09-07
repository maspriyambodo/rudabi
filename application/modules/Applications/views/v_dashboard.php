<div class="card">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10 animate__animated animate__fadeIn">
            <b>DIREKTORAT JENDERAL</b>
            <br>Bimbingan Masyarakat Islam
            <br>
            <small class="text-muted" style="font-size: 16px;">
                Data Rudabi Terkini, <span id="file_date"></span>
            </small>
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
                        <input type="hidden" name="old_ahr" readonly=""/>
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
                <a href="<?php echo base_url('Applications/Simzat/Baznas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
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
                <a href="<?php echo base_url('Applications/Simzat/Laznas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
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
                <a href="<?php echo base_url('Applications/Binsyar/Pustaka/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
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
                <a href="<?php echo base_url('Applications/Mtq/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b rounded-circle">
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
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    $(document).ready(function () {
        data_dir();

        function data_dir() {
            $.ajax({
                url: "<?php echo base_url('Dashboard_cron.json'); ?>",
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    var data1 = JSON.stringify(data.simkah);
                    var obj = jQuery.parseJSON(data1);
                    var i, arr, tot;
                    tot = 0;
                    for (i = 0; i < obj.length; i++) {
                        arr = parseFloat(obj[i].jumlah);
                        tot += arr;
                    }
                    $('#alat_sihat').attr('data-value', data.sihat.alat_hisab_rukyat);
                    $('#tenaga_ahli').attr('data-value', data.sihat.tenaga_ahli);
                    $('#hisab_pengukuran').attr('data-value', data.sihat.hisab_pengukuran);
                    $('#data_masjid').attr('data-value', data.masjid.data_masjid);
                    $('#data_mushalla').attr('data-value', data.mushalla.data_mushalla);
                    $('#jumlah_peserta').attr('data-value', data.targetcatin.realisasi_wilayah);
                    $('#realisasi_wilayah').attr('data-value', data.data_catin.jumlah_peserta);
                    $('#data_kua').attr('data-value', data.simpenghulu.data_kua);
                    $('#data_penghulu').attr('data-value', data.simpenghulu.data_penghulu);
                    $('#data_peristiwa_nikah').attr('data-value', data.simpenghulu.data_peristiwa_nikah);
                    $('#penyuluh').attr('data-value', data.penyuluh.penyuluh);
                    $('#ormas_islam').attr('data-value', data.ormasislam.ormas_islam);
                    $('#lptq').attr('data-value', data.lptq.lptq);
                    $('#pustaka_digital').attr('data-value', data.pustakadigital.pustakadigital);
                    $('#data_wakaf').attr('data-value', data.siwak.tanah_wakaf);
                    $('#data_simkah').attr('data-value', tot);
                    $('#data_baznas').attr('data-value', data.baznas.databaznas);
                    $('#data_laznas').attr('data-value', data.laznas.datalaznas);
                    $('#data_puslim').attr('data-value', data.pustakaslim.jumlah_buku);
                    $('#data_mtq').attr('data-value', data.mtq.tot_mtq);
                    document.getElementById('file_date').innerText = moment(data.file_date).format('D MMMM YYYY, H:mm:ss');
                    animate_counter();
                }
            });
        }

        function animate_counter() {
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

        var pusher = new Pusher('4587e4cb86b14bb98e69', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function () {
            data_dir();
        });
    });
</script>
