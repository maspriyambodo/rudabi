<?php
$a = json_decode($data);
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Seni_Islam/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <thead class="text-uppercase text-center">
                    <tr>
                        <th colspan="4">
                            lembaga seni islam
                        </th>
                        <th rowspan="2">
                            topography
                        </th>
                        <th rowspan="2">
                            geography
                        </th>
                        <th colspan="5">
                            status
                        </th>
                        <th colspan="6">
                            sarana &amp; prasarana
                        </th>
                        <th rowspan="2">
                            visi
                        </th>
                        <th rowspan="2">
                            misi
                        </th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            tmt
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            transportasi
                        </th>
                        <th>
                            izin
                        </th>
                        <th>
                            no akte
                        </th>
                        <th>
                            tanah
                        </th>
                        <th>
                            lt
                        </th>
                        <th>
                            lb
                        </th>
                        <th>
                            papan
                        </th>
                        <th>
                            lemari
                        </th>
                        <th>
                            meja
                        </th>
                        <th>
                            alas
                        </th>
                        <th>
                            komputer
                        </th>
                        <th>
                            plang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->lembaga_seni_nama; ?></td>
                            <td><?php echo $b->lembaga_seni_thn_berdiri; ?></td>
                            <td><?php echo $b->lembaga_seni_alamat; ?></td>
                            <td><?php echo $b->lembaga_seni_transportasi; ?></td>
                            <td><?php echo $b->lembaga_seni_topography; ?></td>
                            <td><?php echo $b->lembaga_seni_geography; ?></td>
                            <td><?php echo $b->lembaga_seni_izin_opr; ?></td>
                            <td><?php echo $b->lembaga_seni_no_akte; ?></td>
                            <td><?php echo $b->lembaga_seni_status_tanah; ?></td>
                            <td><?php echo $b->lembaga_seni_luas_tanah; ?></td>
                            <td><?php echo $b->lembaga_seni_luas_bangunan; ?></td>
                            <td><?php echo $b->lembaga_seni_papan; ?></td>
                            <td><?php echo $b->lembaga_seni_lemari; ?></td>
                            <td><?php echo $b->lembaga_seni_meja; ?></td>
                            <td><?php echo $b->lembaga_seni_alas; ?></td>
                            <td><?php echo $b->lembaga_seni_komputer; ?></td>
                            <td><?php echo $b->lembaga_seni_plang; ?></td>
                            <td><?php echo $b->lembaga_seni_visi; ?></td>
                            <td><?php echo $b->lembaga_seni_misi; ?></td>
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