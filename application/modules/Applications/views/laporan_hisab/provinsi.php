<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Hisab Provinsi <?php echo $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Binsyar/Laporan/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">nama</th>
                        <th rowspan="2">alamat</th>
                        <th colspan="3">pengukuran azimut</th>
                        <th rowspan="2">tanggal<br>pengukuran</th>
                        <th rowspan="2">jam<br>pengukuran</th>
                        <th rowspan="2">status</th>
                    </tr>
                    <tr>
                        <th>azimut I</th>
                        <th>azimut II</th>
                        <th>azimut III</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->city_title; ?></td>
                            <td><?php echo $b->ukur_nama; ?></td>
                            <td><?php echo $b->ukur_alamat; ?></td>
                            <td class="text-center"><?php echo $b->ukur_azimut_1; ?></td>
                            <td class="text-center"><?php echo $b->ukur_azimut_2; ?></td>
                            <td class="text-center"><?php echo $b->ukur_azimut_3; ?></td>
                            <td class="text-center"><?php echo $b->ukur_tgl_pengukuran; ?></td>
                            <td class="text-center"><?php echo $b->ukur_jam_pengukuran; ?></td>
                            <td class="text-center"><?php echo $b->ukur_terlihat; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": false,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>