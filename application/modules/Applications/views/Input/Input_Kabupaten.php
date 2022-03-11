<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Sekretariat/Input/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[1] . '&b=' . $param[2] . '&c=' . $param[4]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th>
                            kua
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            jenis
                        </th>
                        <th>
                            status
                        </th>
                        <th>
                            dipa
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $input = json_decode($data);
                    $totdipa = 0;
                    foreach ($input as $input) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $input->usul_nama_kua; ?>
                            </td>
                            <td>
                                <?php echo $input->usul_alamat_kua; ?>
                            </td>
                            <td>
                                <?php echo $input->usul_status_tanah; ?>
                            </td>
                            <td>
                                <?php echo $input->STATUS; ?>
                            </td>
                            <td>
                                <?php
                                $usul_nilai_dipa = str_replace(',', '', $input->usul_nilai_dipa);
                                $totdipa += $usul_nilai_dipa;
                                echo $input->usul_nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total dipa</th>
                        <th colspan="4">Rp. <?php echo number_format($totdipa); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://e-sbsn.kemenag.go.id/" target="new">e-sbsn</a>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
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