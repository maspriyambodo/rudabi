<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Data Budayawan Islam <?php echo $param[3]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Users/PAI/Budayawan/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th rowspan="2">nama</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">ayah</th>
                        <th rowspan="2">ibu</th>
                        <th rowspan="2">pasangan</th>
                        <th rowspan="2">jenis kelamin</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">status</th>
                        <th rowspan="2">etnis</th>
                        <th rowspan="2">pekerjaan</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>usia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->budayawan_muslim_nama; ?></td>
                            <td><?php echo $b->budayawan_muslim_tempat_lahir; ?></td>
                            <td><?php echo $b->budayawan_muslim_tgl_lahir; ?></td>
                            <td class="text-center">
                                <?php
                                $date = new DateTime($b->budayawan_muslim_tgl_lahir);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                echo $interval->y;
                                ?>
                            </td>
                            <td><?php echo $b->budayawan_muslim_nama_ayah; ?></td>
                            <td><?php echo $b->budayawan_muslim_nama_ibu; ?></td>
                            <td><?php echo $b->budayawan_muslim_nama_istri_suami; ?></td>
                            <td><?php echo $b->budayawan_muslim_jenis_kelamin; ?></td>
                            <td><?php echo $b->budayawan_muslim_alamat; ?></td>
                            <td><?php echo $b->budayawan_muslim_status_kawin; ?></td>
                            <td><?php echo $b->budayawan_muslim_etnis; ?></td>
                            <td><?php echo $b->budayawan_muslim_pekerjaan; ?></td>
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