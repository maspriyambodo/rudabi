<?php
$penilai = json_decode($data);
?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Emonev/Penilaian/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">kode kua</th>
                        <th rowspan="2">nama kua</th>
                        <th rowspan="2">kepala kua</th>
                        <th rowspan="2">tanggal<br>input</th>
                        <th colspan="6">Data KUA</th>
                        <th colspan="4">performa</th>
                        <th rowspan="2">status</th>
                    </tr>
                    <tr>
                        <th>penghulu</th>
                        <th>pegawai</th>
                        <th>penduduk</th>
                        <th>muslim</th>
                        <th>nikah</th>
                        <th>luas tanah</th>
                        <th>performa 1</th>
                        <th>performa 2</th>
                        <th>performa 3</th>
                        <th>performa 4</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($penilai as $value) {
                        if ($value->status == "Novalidasi pusat") {
                            $stat = 'text-danger';
                        } else {
                            $stat = 'text-info';
                        }
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->kodekua; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->kua; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->kepala; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->tgl; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_penghulu; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_pegawai; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_penduduk; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_muslim; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_nikah; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_luastanah; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_performa1; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_performa2; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_performa3; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->dt_performa4; ?>
                            </td>
                            <td class="text-center <?php echo $stat; ?>">
                                <?php echo $value->status; ?>
                            </td>
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
            "processing": true,
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