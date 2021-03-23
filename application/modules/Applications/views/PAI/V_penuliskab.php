<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Penulis/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th rowspan="2">usia</th>
                        <th rowspan="2">pendidikan</th>
                        <th colspan="2">lahir</th>
                        <th rowspan="2">jenis<br>kelamin</th>
                        <th rowspan="2">etnis</th>
                        <th colspan="4">keluarga</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">gol<br>darah</th>
                        <th colspan="5">ciri-ciri</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>ayah</th>
                        <th>ibu</th>
                        <th>status</th>
                        <th>pasangan</th>
                        <th>tinggi</th>
                        <th>berat</th>
                        <th>rambut</th>
                        <th>muka</th>
                        <th>kulit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->penulis_nama; ?></td>
                            <td>
                                <?php
                                $date = new DateTime($b->penulis_tgl_lahir);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                echo $interval->y;
                                ?>
                            </td>
                            <td><?php echo $b->penulis_pendidikan; ?></td>
                            <td><?php echo $b->penulis_tempat_lahir; ?></td>
                            <td><?php echo $b->penulis_tgl_lahir; ?></td>
                            <td><?php echo $b->penulis_jenis_kelamin; ?></td>
                            <td><?php echo $b->penulis_etnis; ?></td>
                            <td><?php echo $b->penulis_nama_ayah; ?></td>
                            <td><?php echo $b->penulis_nama_ibu; ?></td>
                            <td><?php echo $b->penulis_status_kawin; ?></td>
                            <td><?php echo $b->penulis_nama_istri_suami; ?></td>
                            <td><?php echo $b->penulis_alamat; ?></td>
                            <td><?php echo $b->penulis_gol_darah; ?></td>
                            <td><?php echo $b->penulis_tinggi; ?></td>
                            <td><?php echo $b->penulis_berat; ?></td>
                            <td><?php echo $b->penulis_rambut; ?></td>
                            <td><?php echo $b->penulis_muka; ?></td>
                            <td><?php echo $b->penulis_kulit; ?></td>
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
            "paging": false,
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