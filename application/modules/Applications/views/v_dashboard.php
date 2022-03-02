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
                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Sihat/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-tools" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="alat_sihat">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Sihat/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Alat Hisab Rukyat</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="http://sihat.kemenag.go.id/" target="new">sihat</a>
                        </div>
                        <input type="hidden" name="old_ahr" readonly=""/>
                    </div>
                </div>

            </div>
            <div class="col-md">
                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Ahli/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-user-tie" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="tenaga_ahli">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Ahli/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Tenaga Ahli</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="http://sihat.kemenag.go.id/" target="new">sihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Pengukuran/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-ruler-combined" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="hisab_pengukuran">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Pengukuran/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Hisab Pengukuran</b>
                                </div>
                            </a>
                        </center>                        
                        <div class="clearfix">
                            <small>sumber data: </small><a href="http://sihat.kemenag.go.id/" target="new">sihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Simas/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-mosque" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_masjid">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Simas/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Data Masjid</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://simas.kemenag.go.id/" target="new">simas</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row animate__animated animate__fadeIn">

            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Mushalla/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-place-of-worship" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_mushalla">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Binsyar/Mushalla/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Data Mushalla</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://simas.kemenag.go.id/" target="new">simas</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Simpenghulu/KUA/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="far fa-chart-bar" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_kua">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Simpenghulu/KUA/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Jumlah KUA</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://simbi.kemenag.go.id/simpenghulu" target="new">simpenghulu</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('epa/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="far fa-chart-bar" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_kua">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('epa/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Penyuluh Agama</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://epa.kemenag.go.id/" target="new">e-pa</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Simpenghulu/Penghulu/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-user-tie" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_penghulu">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Simpenghulu/Penghulu/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Jumlah Penghulu</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://simbi.kemenag.go.id/simpenghulu" target="new">simpenghulu</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row animate__animated animate__fadeIn">

            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Siwak/Wakaf/index/'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-hand-holding-heart" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_wakaf">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Siwak/Wakaf/index/'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Data Wakaf</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="http://siwak.kemenag.go.id/simpenghulu" target="new">siwak</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md">

                <div class="card card-custom bg-danger card-stretch gutter-b rounded-circle">
                    <div class="card-body rounded-circle dataangka">
                        <center>
                            <a href="<?php echo base_url('Applications/Simkah/index/?year=0'); ?>">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <center><i class="fas fa-ring fa-fw" style="font-size: 48px; color: black;"></i></center>
                                    <center>
                                        <b style="font-size: 30px; color: black; margin-left: 10px;" class="dataangka count" id="data_simkah">0</b>
                                    </center>
                                </span>
                            </a>
                        </center>
                        <center>
                            <a href="<?php echo base_url('Applications/Simkah/index/?year=0'); ?>">
                                <div class="font-weight-bold text-inverse-danger tulisan" style="margin: 5px 0px; font-size: 20px; color: black;">
                                    <b style="color: black;">Data SIMKAH</b>
                                </div>
                            </a>
                        </center>
                        <div class="clearfix">
                            <small>sumber data: </small><a href="https://simkah.kemenag.go.id/simpenghulu" target="new">simkah</a>
                        </div>
                    </div>
                </div>

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
                url: "Dashboard_cron.json",
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

                    $('#data_kua').attr('data-value', data.simpenghulu.data_kua);
                    $('#data_penghulu').attr('data-value', data.simpenghulu.data_penghulu);

                    $('#penyuluh').attr('data-value', data.penyuluh.penyuluh);

                    $('#data_wakaf').attr('data-value', data.siwak.tanah_wakaf);
                    $('#data_simkah').attr('data-value', tot);


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
        var channel = pusher.subscribe('rudabi_dashboard-channel');
        channel.bind('rudabi_dashboard-event', function () {
            data_dir();
        });
    });
</script>
