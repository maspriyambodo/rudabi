<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Binsyar/Simas/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th>nama</th>
                        <th>tahun</th>
                        <th>alamat</th>
                        <th>tlp</th>
                        <th>email</th>
                        <th>lt</th>
                        <th>lb</th>
                        <th>jamaah</th>
                        <th>imam</th>
                        <th>khatib</th>
                        <th>muazin</th>
                        <th>remaja</th>
                        <th>longtitude</th>
                        <th>latitude</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->masjid_name; ?></td>
                            <td class="text-center"><?php echo $b->tahun; ?></td>
                            <td><?php echo $b->masjid_address; ?></td>
                            <td class="text-center"><?php echo $b->masjid_phone; ?></td>
                            <td class="text-center"><?php echo $b->masjid_email; ?></td>
                            <td class="text-center"><?php echo $b->masjid_tanah; ?></td>
                            <td class="text-center"><?php echo $b->masjid_bangunan; ?></td>
                            <td class="text-center"><?php echo $b->jamaah; ?></td>
                            <td class="text-center"><?php echo $b->imam; ?></td>
                            <td class="text-center"><?php echo $b->khatib; ?></td>
                            <td class="text-center"><?php echo $b->muazin; ?></td>
                            <td class="text-center"><?php echo $b->remaja; ?></td>
                            <td class="text-center"><?php echo $b->masjid_lat; ?></td>
                            <td class="text-center"><?php echo $b->masjid_long; ?></td>
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