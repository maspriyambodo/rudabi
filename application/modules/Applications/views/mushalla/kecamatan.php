<?php
$a = json_decode($data);
$c = 0; //mushalla_num_jamaah
$d = 0; //mushalla_num_imam
$e = 0; //mushalla_num_khatib
$f = 0; //mushalla_num_muazin
$g = 0; //mushalla_num_remaja
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Mushalla Kecamatan <?php echo $param[5]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Binsyar/Mushalla/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th>long</th>
                        <th>lat</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->mushalla_num_jamaah; //mushalla_num_jamaah
                        $d += $b->mushalla_num_imam; //mushalla_num_imam
                        $e += $b->mushalla_num_khatib; //mushalla_num_khatib
                        $f += $b->mushalla_num_muazin; //mushalla_num_muazin
                        $g += $b->mushalla_num_remaja; //mushalla_num_remaja
                        ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo $b->mushalla_name; ?></td>
                            <td><?php echo $b->tahun; ?></td>
                            <td style="text-align:left !important;"><?php echo $b->mushalla_address; ?></td>
                            <td><?php echo $b->mushalla_phone; ?></td>
                            <td><?php echo $b->mushalla_email; ?></td>
                            <td><?php echo $b->mushalla_tanah; ?></td>
                            <td><?php echo $b->mushalla_bangunan; ?></td>
                            <td><?php echo $b->mushalla_num_jamaah; ?></td>
                            <td><?php echo $b->mushalla_num_imam; ?></td>
                            <td><?php echo $b->mushalla_num_khatib; ?></td>
                            <td><?php echo $b->mushalla_num_muazin; ?></td>
                            <td><?php echo $b->mushalla_num_remaja; ?></td>
                            <td><?php echo $b->mushalla_long; ?></td>
                            <td><?php echo $b->mushalla_lat; ?></td>
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