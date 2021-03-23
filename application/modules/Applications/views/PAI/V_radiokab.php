<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Radio_Islam/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">radio</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">izin</th>
                        <th colspan="3">status</th>
                        <th rowspan="2">sertifikat</th>
                        <th rowspan="2">topography</th>
                        <th rowspan="2">geografi</th>
                        <th colspan="2">pengurus</th>
                        <th rowspan="2">jangkauan</th>
                        <th rowspan="2">waktu</th>
                        <th rowspan="2">sejarah</th>
                        <th rowspan="2">penyiar</th>
                        <th rowspan="2">siaran</th>
                        <th rowspan="2">pukul</th>
                        <th rowspan="2">favorite</th>
                        <th rowspan="2">jam</th>
                        <th rowspan="2">afiliasi</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>ketua</th>
                        <th>berdiri</th>
                        <th>tanah</th>
                        <th>lt</th>
                        <th>lb</th>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->radio_nama; ?></td>
                            <td><?php echo $b->radio_ketua; ?></td>
                            <td><?php echo $b->radio_thn_berdiri; ?></td>
                            <td><?php echo $b->radio_alamat; ?></td>
                            <td><?php echo $b->radio_izin_opr; ?></td>
                            <td><?php echo $b->radio_status_tanah; ?></td>
                            <td><?php echo $b->radio_luas_tanah; ?></td>
                            <td><?php echo $b->radio_luas_bangunan; ?></td>
                            <td><?php echo $b->radio_no_sertifikat; ?></td>
                            <td><?php echo $b->radio_topography; ?></td>
                            <td><?php echo $b->radio_geography; ?></td>
                            <td><?php echo $b->radio_pengurus_laki; ?></td>
                            <td><?php echo $b->radio_pengurus_perempuan; ?></td>
                            <td><?php echo $b->radio_jangkauan; ?></td>
                            <td><?php echo $b->radio_waktu; ?></td>
                            <td><?php echo $b->radio_sejarah; ?></td>
                            <td><?php echo $b->radio_penyiar1; ?></td>
                            <td><?php echo $b->radio_siaran1; ?></td>
                            <td><?php echo $b->radio_pukul1; ?></td>
                            <td><?php echo $b->radio_favorit1; ?></td>
                            <td><?php echo $b->radio_jam1; ?></td>
                            <td><?php echo $b->radio_afiliasi; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $("table").dataTable({
            ServerSide: true,
            order: [[0, "asc"]],
            paging: true,
            ordering: true,
            info: true,
            processing: false,
            deferRender: true,
            scrollCollapse: true,
            scrollX: true,
            scrollY: "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: "print", footer: true},
                {extend: "copyHtml5", footer: true},
                {extend: "excelHtml5", footer: true},
                {extend: "csvHtml5", footer: true},
                {extend: "pdfHtml5", footer: true}
            ]
        });
    };
</script>