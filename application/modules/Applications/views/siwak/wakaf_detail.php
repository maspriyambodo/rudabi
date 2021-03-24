<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Siwak/Wakaf/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th rowspan="2">Kelurahan</th>
                        <th rowspan="2">luas</th>
                        <th rowspan="2">penggunaan</th>
                        <th rowspan="2">wakif</th>
                        <th rowspan="2">nadzir</th>
                        <th colspan="2">sertifikat</th>
                        <th colspan="2">Akta Ikrar Wakaf</th>
                    </tr>
                    <tr>
                        <th>nomor</th>
                        <th>tanggal</th>
                        <th>nomor</th>
                        <th>tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo $b->Lokasi_Kel; ?></td>
                            <td><?php echo $b->Luas; ?></td><!-- m&sup2; -->
                            <td><?php echo $b->Penggunaan; ?></td>
                            <td style="text-align:left !important;"><?php echo $b->Wakif; ?></td>
                            <td style="text-align:left !important;"><?php echo $b->Nadzir; ?></td>
                            <td><?php echo $b->S_No; ?></td>
                            <td><?php echo $b->S_Tgl; ?></td>
                            <td><?php echo $b->AIW_No; ?></td>
                            <td><?php echo $b->AIW_Tgl; ?></td>
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