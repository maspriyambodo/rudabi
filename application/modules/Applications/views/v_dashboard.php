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
    </div>
</div>
<script>
    $(document).ready(function () {
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
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>