<?php
$totnilai_dipa = 0;
$approved = json_decode($data);
?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Sekretariat/Approved/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>kua</th>
                        <th>alamat</th>
                        <th>usulan</th>
                        <th>dipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($approved as $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value->usul_nama_kua; ?>
                            </td>
                            <td class="text-center text-wrap">
                                <?php echo $value->usul_alamat_kua; ?>
                            </td>
                            <td class="text-center"><?php echo $value->usul_status_tanah; ?></td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace(',', '', $value->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo $value->nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">Total Nilai Dipa Rp. <?php echo number_format($totnilai_dipa); ?></th>
                    </tr>
                </tfoot>
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